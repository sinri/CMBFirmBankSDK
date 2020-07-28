<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Distribution;


use leqee\CMBFirmBankSDK\api\Distribution\GetAgentDetailRequest;
use leqee\CMBFirmBankSDK\api\Distribution\GetAgentDetailResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetAgentDetail extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $request = new GetAgentDetailRequest(
            'ZL01',
            '0012337680'
        );

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>GetAgentDetail</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>ZL01</LGNNAM>
            </INFO>
            <SDKATDQYX> <REQNBR>0012337680</REQNBR>
            </SDKATDQYX>
        </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>GetAgentDetail</FUNNAM> <DATTYP>2</DATTYP> <RETCOD>0</RETCOD> <ERRMSG></ERRMSG>
            </INFO>
            <NTQATDQYZ>
                <ACCNBR>9555507559999028</ACCNBR> <CLTNAM>测试</CLTNAM> <TRSAMT>4500.00</TRSAMT> <STSCOD>F</STSCOD>
                <ERRDSP>CMB1003 客户名失配</ERRDSP> <TRSDSP></TRSDSP>
            </NTQATDQYZ>
        </CMBSDKPGK>
        ';
        $response = (new GetAgentDetailResponse($responseXML));
        $this->assertEquals('GetAgentDetail', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $agentDetails = $response->getAgentDetailList();
        foreach ($agentDetails as $agentDetail) {
            $this->assertEquals('NTQATDQYZ', $agentDetail->getTagName());
            $this->assertNotEmpty($agentDetail->ACCNBR && $agentDetail->CLTNAM && $agentDetail->TRSAMT && $agentDetail->STSCOD);
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
        $request = new GetAgentDetailRequest(
            '银企直连网银互联1',
            'requestNo'
        );

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetAgentDetailResponse($xml));
        $agentDetails = $response->getAgentDetailList();
        $this->assertIsArray($agentDetails);
        foreach ($agentDetails as $agentDetail) {
            $this->assertEquals('NTQATDQYZ', $agentDetail->getTagName());
            $this->assertNotEmpty($agentDetail->ACCNBR && $agentDetail->CLTNAM && $agentDetail->TRSAMT && $agentDetail->STSCOD);
        }
    }
}