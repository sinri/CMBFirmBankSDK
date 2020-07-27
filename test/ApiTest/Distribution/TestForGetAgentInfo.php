<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Distribution;


use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCINNY1Component;
use leqee\CMBFirmBankSDK\api\Distribution\GetAgentInfoRequest;
use leqee\CMBFirmBankSDK\api\Distribution\GetAgentInfoResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetAgentInfo extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $queryComponent = new NTAGCINNY1Component('N03020','00001','20170410','20170415');
        $request = new GetAgentInfoRequest(
            'QGZ01',
            $queryComponent
        );

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>NTAGCINN</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>QGZ01</LGNNAM>
            </INFO>
            <NTAGCINNY1>
                <BUSCOD>N03020</BUSCOD> <BUSMOD>00001</BUSMOD> <BGNDAT>20170410</BGNDAT> <ENDDAT>20170415</ENDDAT>
            </NTAGCINNY1>
        </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <DATTYP>2</DATTYP> <ERRMSG></ERRMSG> <FUNNAM>NTAGCINN</FUNNAM> <LGNNAM>QGZ01</LGNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <NTAGCINQZ>
                <ACCNBR>769900038310611</ACCNBR> <ATHFLG>N</ATHFLG> <BBKNBR>69</BBKNBR> <BUSCOD>N03020</BUSCOD> 
                <BUSMOD>00001</BUSMOD> <CCYNBR>10</CCYNBR> <EPTDAT>20170413</EPTDAT> <EPTTIM>080000</EPTTIM> 
                <ERRDSP>无一笔成功入账</ERRDSP> <NUSAGE>1</NUSAGE> <OPRDAT>20170413</OPRDAT> <REQNBR>0001153882</REQNBR>
                <REQSTA>FIN</REQSTA> <RTNFLG>F</RTNFLG> <SEQCOD>T000000068</SEQCOD> <STSCOD>E</STSCOD> <SUCAMT>0.00</SUCAMT> 
                <SUCNUM>000000</SUCNUM> <TOTAMT>1.00</TOTAMT> <TRSNUM>000001</TRSNUM> <TRSTYP>BYBC</TRSTYP> <YURREF>20170413105326</YURREF>
            </NTAGCINQZ>
        </CMBSDKPGK>
        ';
        $response = (new GetAgentInfoResponse($responseXML));
        $this->assertEquals('NTAGCINN', $response->getInfoFunctionName());
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
        $queryComponent = new NTAGCINNY1Component('businessCode','businesMode',
            'beginDate','endDate');
        $request = new GetAgentInfoRequest(
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