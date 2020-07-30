<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Distribution;


use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGTLS2XComponent;
use leqee\CMBFirmBankSDK\api\Distribution\GetAgentTypeRequest;
use leqee\CMBFirmBankSDK\api\Distribution\GetAgentTypeResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetAgentType extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $queryComponent = new NTAGTLS2XComponent('N03020','769900038310611');
        $request = new GetAgentTypeRequest(
            'QGZ02',
            $queryComponent
        );

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>NTAGTLS2</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>QGZ02</LGNNAM>
            </INFO>
            <NTAGTLS2X>
                <BUSCOD>N03020</BUSCOD>
                <ACCNBR>769900038310611</ACCNBR> 
            </NTAGTLS2X>
        </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <DATTYP>2</DATTYP> <ERRMSG></ERRMSG> <FUNNAM>NTAGTLS2</FUNNAM> <LGNNAM>QGZ02</LGNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <NTAGTLS2Z>
                <ACCNBR>769900038310611</ACCNBR> <CCYNBR>10</CCYNBR> <CNVNBR>000950</CNVNBR> <C_TRSTYP>代发劳务收入</C_TRSTYP>
                <EFTDAT>20150301</EFTDAT> <EXPDAT>20160301</EXPDAT> <SGNDAT>20150301</SGNDAT> <STSCOD>C</STSCOD> <TRSTYP>BYBC</TRSTYP>
            </NTAGTLS2Z>
        </CMBSDKPGK>
        ';
        $response = (new GetAgentTypeResponse($responseXML));
        $this->assertEquals('NTAGTLS2', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $types = $response->getTypeList();
        foreach ($types as $type) {
            $this->assertEquals('NTAGTLS2Z', $type->getTagName());
            $this->assertNotEmpty($type->ACCNBR && $type->TRSTYP && $type->STSCOD);
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
        $queryComponent = new NTAGTLS2XComponent('businessCode','account');
        $request = new GetAgentTypeRequest(
            '银企直连网银互联1',
            $queryComponent
        );

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetAgentTypeResponse($xml));
        $types = $response->getTypeList();
        $this->assertIsArray($types);
        foreach ($types as $type) {
            $this->assertEquals('NTAGTLS2Z', $type->getTagName());
            $this->assertNotEmpty($type->ACCNBR && $type->TRSTYP && $type->STSCOD);
        }
    }
}