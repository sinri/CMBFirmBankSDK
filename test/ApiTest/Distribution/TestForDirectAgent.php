<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Distribution;


use leqee\CMBFirmBankSDK\api\Distribution\component\SDKATDRQXComponent;
use leqee\CMBFirmBankSDK\api\Distribution\component\SDKATSRQXComponent;
use leqee\CMBFirmBankSDK\api\Distribution\DirectAgentRequest;
use leqee\CMBFirmBankSDK\api\Distribution\DirectAgentResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForDirectAgent extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $agentRequest = new SDKATSRQXComponent('N03020','00001','BYBC',
            '755900008010306', '69','2.03', '1', 'TEST201501290922', '代发工资测试');
        $agentRequest->EPTDAT = '20150129';
        $agentRequest->CCYNBR = '10';
        $agentRequest->DMANBR = '000001';
        $agentRequest->GRTFLG = 'Y';

        $request = new DirectAgentRequest(
            'PAY1',
            $agentRequest
        );
        $agentDetail = new SDKATDRQXComponent('075512000038', '测试', '2.03');
        $agentDetail->TRSDSP='工资';
        $request->addAgentItem($agentDetail);

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>AgentRequest</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>PAY1</LGNNAM>
            </INFO>
            <SDKATSRQX>
                <BUSCOD>N03020</BUSCOD> <BUSMOD>00001</BUSMOD> <TRSTYP>BYBC</TRSTYP>
                <DBTACC>755900008010306</DBTACC> <BBKNBR>69</BBKNBR> <SUM>2.03</SUM><TOTAL>1</TOTAL> 
                 <YURREF>TEST201501290922</YURREF> <MEMO>代发工资测试</MEMO> <EPTDAT>20150129</EPTDAT> <CCYNBR>10</CCYNBR> <DMANBR>000001</DMANBR> <GRTFLG>Y</GRTFLG>
            </SDKATSRQX>
            <SDKATDRQX>
                <ACCNBR>075512000038</ACCNBR> <CLTNAM>测试</CLTNAM> <TRSAMT>2.03</TRSAMT> <TRSDSP>工资</TRSDSP>
            </SDKATDRQX>
        </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <DATTYP>2</DATTYP> <ERRMSG></ERRMSG> <FUNNAM>AgentRequest</FUNNAM> <LGNNAM>PAY1</LGNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <NTREQNBRY>
                <REQNBR>0099956249</REQNBR>
                <RSV50Z>OPR</RSV50Z>
            </NTREQNBRY>
        </CMBSDKPGK>
        ';
        $response = (new DirectAgentResponse($responseXML));
        $this->assertEquals('AgentRequest', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $result = $response->getAgentResult();
        $this->assertEquals('NTREQNBRY', $result->getTagName());
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
        $agentRequest = new SDKATSRQXComponent('businessCode','businessMode',
            'transactionType', 'account', 'branchBank','sum', 'total',
            'referenceNo', 'memo');
        $request = new DirectAgentRequest(
            '银企直连网银互联1',
            $agentRequest
        );
        $agentItem = new SDKATDRQXComponent('account', 'depositor', 'amount');
        $request->addAgentItem($agentItem);

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new DirectAgentResponse($xml));
        $result = $response->getAgentResult();
        $this->assertEquals('AgentRequest', $result->getTagName());
    }
}