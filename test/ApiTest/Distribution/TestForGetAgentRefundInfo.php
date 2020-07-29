<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Distribution;


use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGDRFDY1Component;
use leqee\CMBFirmBankSDK\api\Distribution\GetAgentRefundInfoRequest;
use leqee\CMBFirmBankSDK\api\Distribution\GetAgentRefundInfoResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetAgentRefundInfo extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $queryComponent = new NTAGDRFDY1Component('75','755915678310502', 'BYTF',
            '20200601', '20200602');
        $queryComponent->REQNBR='';
        $request = new GetAgentRefundInfoRequest(
            '银企直连测试用户104',
            $queryComponent
        );

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO><FUNNAM>NTAGDRFD</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>银企直连测试用户104</LGNNAM>
            </INFO>
            <NTAGDRFDY1>
                <BBKNBR>75</BBKNBR> <ACCNBR>755915678310502</ACCNBR> <TRSTYP>BYTF</TRSTYP> <BGNDAT>20200601</BGNDAT> 
                <ENDDAT>20200602</ENDDAT> <REQNBR></REQNBR>
            </NTAGDRFDY1>
        </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO><DATTYP>2</DATTYP> <ERRMSG></ERRMSG> <FUNNAM>NTAGDRFD</FUNNAM> <LGNNAM>银企直连测试用户104</LGNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <NTAGDRFDZ1>
                <BTHDTL>00000001</BTHDTL> <CPRACT></CPRACT> <CPRCNV>A01039</CPRCNV> <EACNAM>Judy Zeng</EACNAM> 
                <EACNBR>6225885910000108</EACNBR> <REQNBR>0030899420</REQNBR> <RTNCOD>002</RTNCOD> <RTNTXT>账号、户名不符</RTNTXT>
                <STSCOD>E</STSCOD> <TRSAMT>0.03</TRSAMT> <TRSDAT>20200601</TRSDAT> <TXTCLT>工资</TXTCLT> <YURREF>TEST201501290925</YURREF>
            </NTAGDRFDZ1>
        </CMBSDKPGK>
        ';
        $response = (new GetAgentRefundInfoResponse($responseXML));
        $this->assertEquals('NTAGDRFD', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $refunds = $response->getRefundInfoList();
        foreach ($refunds as $refund) {
            $this->assertEquals('NTAGDRFDZ1', $refund->getTagName());
            $this->assertNotEmpty($refund->REQNBR && $refund->YURREF && $refund->EACNBR && $refund->TRSAMT);
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
        $queryComponent = new NTAGDRFDY1Component('branchBank','account',
            'transactionType', 'beginDate', 'endDate');
        $request = new GetAgentRefundInfoRequest(
            '银企直连网银互联1',
            $queryComponent
        );

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetAgentRefundInfoResponse($xml));
        $refunds = $response->getRefundInfoList();
        $this->assertIsArray($refunds);
        foreach ($refunds as $refund) {
            $this->assertEquals('NTAGDRFDZ1', $refund->getTagName());
            $this->assertNotEmpty($refund->REQNBR && $refund->YURREF && $refund->EACNBR && $refund->TRSAMT);
        }
    }
}