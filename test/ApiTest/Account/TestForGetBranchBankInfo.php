<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Account;


use leqee\CMBFirmBankSDK\api\Account\GetBranchBankInfoRequest;
use leqee\CMBFirmBankSDK\api\Account\GetBranchBankInfoResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetBranchBankInfo extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $request = new GetBranchBankInfoRequest(
            'MB03',
            '769900017910904'
        );

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>GetBbkInfo</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>MB03</LGNNAM>
            </INFO>
            <NTACCBBKY>
                <ACCNBR>769900017910904</ACCNBR> </NTACCBBKY>
            </CMBSDKPGK>';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO>
                <DATTYP>2</DATTYP> <ERRMSG></ERRMSG> <FUNNAM>GetBbkInfo</FUNNAM> <LGNNAM>MB03</LGNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <NTACCBBKZ>
                <ACCNBR>769900017910904</ACCNBR> <BBKNBR>69</BBKNBR> <C_BBKNBR>东莞</C_BBKNBR>
            </NTACCBBKZ>
            </CMBSDKPGK>';
        $response = (new GetBranchBankInfoResponse($responseXML));
        $this->assertEquals('GetBbkInfo', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $branchBanks = $response->getBranchBankList();
        foreach ($branchBanks as $branchBank) {
            $this->assertSame('769900017910904', $branchBank->ACCNBR);
            $this->assertSame('69', $branchBank->BBKNBR);
            $this->assertSame('东莞', $branchBank->C_BBKNBR);
        }
    }

    /**
     * @throws Exception
     */
    public function testOnline()
    {
        if (MockedTestEnv::ignoreOnlineTests()) {
            $this->assertTrue(MockedTestEnv::ignoreOnlineTests());
            return;
        }
        $request = new GetBranchBankInfoRequest(
            '银企直连网银互联1',
            'account'
        );

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetBranchBankInfoResponse($xml));
        $branchBanks = $response->getBranchBankList();
        $this->assertIsArray($branchBanks);
        foreach ($branchBanks as $branchBank) {
            $this->assertEquals('NTACCBBKZ', $branchBank->getTagName());
            $this->assertTrue($branchBank->BBKNBR && $branchBank->C_BBKNBR && $branchBank->ACCNBR);
        }
    }

}