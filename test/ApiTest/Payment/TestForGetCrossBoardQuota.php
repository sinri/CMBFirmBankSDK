<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Payment;


use leqee\CMBFirmBankSDK\api\Payment\component\NTBUSMODYComponent;
use leqee\CMBFirmBankSDK\api\Payment\GetCrossBoardQuotaRequest;
use leqee\CMBFirmBankSDK\api\Payment\GetCrossBoardQuotaResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetCrossBoardQuota extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $request = new GetCrossBoardQuotaRequest('OL03', new NTBUSMODYComponent());

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>NTCRBINQ</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>OL03</LGNNAM>
            </INFO>
            <NTBUSMODY/>
        </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding="UTF-8"?> <CMBSDKPGK>
            <INFO>
                <DATTYP>2</DATTYP> <ERRMSG></ERRMSG> <FUNNAM>NTCRBINQ</FUNNAM> <LGNNAM>OL03</LGNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <NTCRBINQZ>
                <CCYNBR>32</CCYNBR> <NATACC>571900491132203</NATACC> <NATBAL>200.00</NATBAL> <NATLMT>200.00</NATLMT>
                <NATNAM>恒生电子(美元结算户)</NATNAM> <NATUSE>0.00</NATUSE> <NGTACC>571900491132905</NGTACC>
                <NGTBAL>200.00</NGTBAL> <NGTLMT>200.00</NGTLMT> <NGTNAM>恒生电子(美元待核查户)</NGTNAM> <NGTUSE>0.00</NGTUSE><NTBNBR>N0001999</NTBNBR>
            </NTCRBINQZ>
            <NTCRBINQZ>
                <CCYNBR>32</CCYNBR> <NATACC>755903332132301</NATACC> <NATBAL>1000.00</NATBAL> <NATLMT>1000.00</NATLMT>
                <NATNAM>欧弟专属测试户 06</NATNAM> <NATUSE>0.00</NATUSE> <NGTACC>755903332132102</NGTACC> <NGTBAL>2000.00</NGTBAL>
                <NGTLMT>2000.00</NGTLMT> <NGTNAM>欧弟专属测试户 07</NGTNAM> <NGTUSE>0.00</NGTUSE> <NTBNBR>N0001999</NTBNBR>
            </NTCRBINQZ>
            <NTCRBINQZ2>
                <CCYNBR>32</CCYNBR> <NATACC>571900491132203</NATACC> <NATASB>755903332132102</NATASB> <NATNAM>欧弟专属测试户 07</NATNAM>
                <NGTACC>571900491132905</NGTACC> <NGTASB>OSA755903122932609</NGTASB> <NGTNAM>离岸美元测试账户</NGTNAM>
            </NTCRBINQZ2>
        </CMBSDKPGK>
        ';
        $response = (new GetCrossBoardQuotaResponse($responseXML));
        $this->assertEquals('NTCRBINQ', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $crossBoardBanks = $response->getCrossBoardBankInfoList();
        //var_dump($crossBoardBanks);
        foreach ($crossBoardBanks as $crossBoardBank) {
            $this->assertEquals('NTCRBINQZ', $crossBoardBank->getTagName());
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
        $request = new GetCrossBoardQuotaRequest('银企直连网银互联1', new NTBUSMODYComponent());

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetCrossBoardQuotaResponse($xml));
        $crossBoardBanks = $response->getCrossBoardBankInfoList();
        $this->assertIsArray($crossBoardBanks);
        //var_dump($crossBoardBanks);
        //var_dump($response->getCrossBoardBankInfo());
        foreach ($crossBoardBanks as $crossBoardBank) {
            $this->assertEquals('NTCRBINQZ', $crossBoardBank->getTagName());
        }
    }
}