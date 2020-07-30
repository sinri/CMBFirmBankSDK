<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Distribution;


use leqee\CMBFirmBankSDK\api\Distribution\GetAgentDetailInfoRequest;
use leqee\CMBFirmBankSDK\api\Distribution\GetAgentDetailInfoResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetAgentDetailInfo extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $request = new GetAgentDetailInfoRequest(
            'PAY1',
            '0099960668'
        );

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>NTAGDINF</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>PAY1</LGNNAM>
            </INFO>
            <NTAGDINFY1>
                <REQNBR>0099960668</REQNBR> </NTAGDINFY1>
        </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO><DATTYP>2</DATTYP> <ERRMSG></ERRMSG> <FUNNAM>NTAGDINF</FUNNAM> <LGNNAM>PAY1</LGNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <NTAGCDTLY1>
                <ACCNAM>同业代理清算户</ACCNAM> <ACCNBR>769900155110603</ACCNBR> <TRSAMT>168.00</TRSAMT> <TRXSEQ>00000001</TRXSEQ>
            </NTAGCDTLY1>
        </CMBSDKPGK>    
        ';
        $response = (new GetAgentDetailInfoResponse($responseXML));
        $this->assertEquals('NTAGDINF', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $agentDetails = $response->getAgentDetailList();
        foreach ($agentDetails as $agentDetail){
            $this->assertEquals('NTAGCDTLY1', $agentDetail->getTagName());
            $this->assertNotEmpty($agentDetail->TRXSEQ && $agentDetail->ACCNBR && $agentDetail->TRSAMT);
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

        $request = new GetAgentDetailInfoRequest(
            '银企直连网银互联1',
            'requestNo'
        );

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetAgentDetailInfoResponse($xml));
        $agentDetails = $response->getAgentDetailList();
        $this->assertIsArray($agentDetails);
        foreach ($agentDetails as $agentDetail){
            $this->assertEquals('NTAGCDTLY1', $agentDetail->getTagName());
            $this->assertNotEmpty($agentDetail->TRXSEQ && $agentDetail->ACCNBR && $agentDetail->TRSAMT);
        }
    }
}