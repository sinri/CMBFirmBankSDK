<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Distribution;


use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCINYX1Component;
use leqee\CMBFirmBankSDK\api\Distribution\GetAgentInfoByReferenceNoRequest;
use leqee\CMBFirmBankSDK\api\Distribution\GetAgentInfoResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetAgentInfoByReferenceNo extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $queryComponent = new NTAGCINYX1Component('N03010','20151029170606',
            '20170501','20170505');
        $queryComponent->RSV50Z='';
        $request = new GetAgentInfoByReferenceNoRequest(
            'QGZ01',
            $queryComponent
        );

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>NTAGCINY</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>QGZ01</LGNNAM>
            </INFO>
            <NTAGCINYX1>
                <BUSCOD>N03010</BUSCOD> <YURREF>20151029170606</YURREF> <BGNDAT>20170501</BGNDAT> 
                <ENDDAT>20170505</ENDDAT> <RSV50Z></RSV50Z>
            </NTAGCINYX1>
        </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <DATTYP>2</DATTYP> <ERRMSG></ERRMSG> <FUNNAM>NTAGCINY</FUNNAM> <LGNNAM>QGZ01</LGNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <NTAGCINQZ>
                <ACCNBR>769900038110701</ACCNBR> <ATHFLG>N</ATHFLG> <BBKNBR>69</BBKNBR> <BUSCOD>N03010</BUSCOD>
                <BUSMOD>00001</BUSMOD> <CCYNBR>10</CCYNBR> <EPTDAT>20151029</EPTDAT> <EPTTIM>080000</EPTTIM> 
                <ERRDSP>无一笔成功入账</ERRDSP> <NUSAGE>7788</NUSAGE> <OPRDAT>20151029</OPRDAT> <REQNBR>0000978052</REQNBR>
                <REQSTA>FIN</REQSTA> <RTNFLG>F</RTNFLG> <SEQCOD>S000000159</SEQCOD> <STSCOD>E</STSCOD> <SUCAMT>0.00</SUCAMT> 
                <SUCNUM>000000</SUCNUM> <TOTAMT>22.00</TOTAMT> <TRSNUM>000001</TRSNUM> <TRSTYP>BYSA</TRSTYP> <YURREF>20151029170606</YURREF>
            </NTAGCINQZ>
        </CMBSDKPGK>
        ';
        $response = (new GetAgentInfoResponse($responseXML));
        $this->assertEquals('NTAGCINY', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $agentInfos = $response->getAgentInfoList();
        foreach ($agentInfos as $agentInfo) {
            $this->assertEquals('NTAGCINQZ', $agentInfo->getTagName());
            $this->assertNotEmpty($agentInfo->REQNBR && $agentInfo->BUSCOD && $agentInfo->BUSMOD && $agentInfo->TOTAMT);
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
        $queryComponent = new NTAGCINYX1Component('businessCode','referenceNo',
            'beginDate','endDate');
        $request = new GetAgentInfoByReferenceNoRequest(
            '银企直连网银互联1',
            $queryComponent
        );

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetAgentInfoResponse($xml));
        $agentInfos = $response->getAgentInfoList();
        $this->assertIsArray($agentInfos);
        foreach ($agentInfos as $agentInfo) {
            $this->assertEquals('NTAGCINQZ', $agentInfo->getTagName());
            $this->assertNotEmpty($agentInfo->REQNBR && $agentInfo->BUSCOD && $agentInfo->BUSMOD && $agentInfo->TOTAMT);
        }
    }
}