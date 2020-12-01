<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Account;


use leqee\CMBFirmBankSDK\api\Account\component\CSRRCFDFY0Component;
use leqee\CMBFirmBankSDK\api\Account\GetElectronicReceiptImgRequest;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetElectronicReceiptImg extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $queryComponent = new CSRRCFDFY0Component('216082647110001', '20170426','20170526','1');
        $queryComponent->RRCCOD = 'HD002016';
        $request = new GetElectronicReceiptImgRequest(
            '总行会计',
            $queryComponent
        );

        $sampleXML = '<?xml version="1.0" encoding ="UTF-8"?><CMBSDKPGK>
            <INFO> 
                <FUNNAM>SDKCSFDFBRTIMG</FUNNAM> <DATTYP>2</DATTYP><LGNNAM>总行会计</LGNNAM> 
            </INFO>
            <CSRRCFDFY0> 
                <EACNBR>216082647110001</EACNBR><BEGDAT>20170426</BEGDAT><ENDDAT>20170526</ENDDAT><RRCFLG>1</RRCFLG><RRCCOD>HD002016</RRCCOD>
            </CSRRCFDFY0>
            </CMBSDKPGK>';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
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
        $queryComponent = new CSRRCFDFY0Component('account', 'beginDate','endDate','flag');
        $request = new GetElectronicReceiptImgRequest(
            '银企直连网银互联1',
            $queryComponent
        );

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);
    }
}