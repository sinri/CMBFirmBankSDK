<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Account;


use leqee\CMBFirmBankSDK\api\Account\GetAccountInfoRequest;
use leqee\CMBFirmBankSDK\api\Account\GetAccountInfoResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetAccountInfo extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $request = new GetAccountInfoRequest('NN-1');
        $request->addQueryAccount('69', '769900003510702');
        $request->addQueryAccount('69', '769900003510901');

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO><FUNNAM>GetAccInfo</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>NN-1</LGNNAM></INFO>
            <SDKACINFX>
                <BBKNBR>69</BBKNBR><ACCNBR>769900003510702</ACCNBR> 
            </SDKACINFX>
            <SDKACINFX>
                <BBKNBR>69</BBKNBR><ACCNBR>769900003510901</ACCNBR>
            </SDKACINFX>
            </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO><DATTYP>2</DATTYP> <ERRMSG></ERRMSG> <FUNNAM>GetAccInfo</FUNNAM> <LGNNAM>NN-1</LGNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <NTQACINFZ>
                <ACCBLV>10885.60</ACCBLV> <ACCITM>20122</ACCITM> <ACCNAM>东莞烟厂-测试</ACCNAM> <ACCNBR>769900003510702</ACCNBR> 
                <AVLBLV>895810211.34</AVLBLV> <BBKNBR>69</BBKNBR> <CCYNBR>10</CCYNBR> <C_CCYNBR>人民币</C_CCYNBR> 
                <C_INTRAT>1.0100000%</C_INTRAT> <DPSTXT>在岸挂牌对</DPSTXT> <HLDBLV>0.00</HLDBLV> <INTCOD>S</INTCOD> 
                <LMTOVR>0.00</LMTOVR> <MUTDAT>20091221</MUTDAT> <ONLBLV>999997244.20</ONLBLV> <OPNDAT>20010101</OPNDAT><STSCOD>A</STSCOD>
            </NTQACINFZ>
            <NTQACINFZ>
                <ACCBLV>99109.39</ACCBLV><ACCITM>20122</ACCITM> <ACCNAM>世纪天骄集团</ACCNAM> <ACCNBR>769900003510901</ACCNBR>
                <AVLBLV>9995964542.25</AVLBLV> <BBKNBR>69</BBKNBR> <CCYNBR>10</CCYNBR> <C_CCYNBR>人民币</C_CCYNBR> 
                <C_INTRAT>1.0100000%</C_INTRAT> <DPSTXT>在岸挂牌对</DPSTXT> <HLDBLV>0.00</HLDBLV> <INTCOD>S</INTCOD> 
                <LMTOVR>0.00</LMTOVR> <ONLBLV>9996017036.45</ONLBLV> <OPNDAT>20010101</OPNDAT> <STSCOD>A</STSCOD>
            </NTQACINFZ>
        </CMBSDKPGK>
        ';
        $response = (new GetAccountInfoResponse($responseXML));
        $this->assertEquals('GetAccInfo', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $accountInfos = $response->getAccountInfoList();
        foreach ($accountInfos as $accountInfo) {
            $this->assertSame('69', $accountInfo->BBKNBR);
            $this->assertTrue(in_array($accountInfo->ACCNBR,['769900003510702','769900003510901']));
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
        $request = new GetAccountInfoRequest('银企直连网银互联1');
        $request->addQueryAccount('bankBranch', 'account');

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetAccountInfoResponse($xml));
        $accountInfos = $response->getAccountInfoList();
        $this->assertIsArray($accountInfos);
        foreach ($accountInfos as $accountInfo) {
            $this->assertEquals('NTQACINFZ', $accountInfo->getTagName());
            $this->assertTrue($accountInfo->BBKNBR && $accountInfo->ACCNBR && $accountInfo->ACCBLV && $accountInfo->ONLBLV);
        }
    }
}