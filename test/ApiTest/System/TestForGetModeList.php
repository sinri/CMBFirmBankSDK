<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\System;


use leqee\CMBFirmBankSDK\api\Basement\definition\BusinessCodeDefinition;
use leqee\CMBFirmBankSDK\api\System\GetModeListRequest;
use leqee\CMBFirmBankSDK\api\System\GetModeListResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetModeList extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $request = new GetModeListRequest(
            'ZL01',
            'N03010'
        );

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?><CMBSDKPGK>
            <INFO> <FUNNAM>ListMode</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>ZL01</LGNNAM>
            </INFO>
            <SDKMDLSTX>
                <BUSCOD>N03010</BUSCOD>
            </SDKMDLSTX>
        </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>ListMode</FUNNAM> <DATTYP>2</DATTYP> <RETCOD>0</RETCOD> <ERRMSG></ERRMSG>
            </INFO>
            <NTQMDLSTZ>
                <BUSMOD>00001</BUSMOD> <MODALS>直接代发工资</MODALS> </NTQMDLSTZ>
            <NTQMDLSTZ>
                <BUSMOD>00002</BUSMOD> <MODALS>客户端代发工资</MODALS>
            </NTQMDLSTZ>
        </CMBSDKPGK>
        ';
        $response = (new GetModeListResponse($responseXML));
        $this->assertEquals('ListMode', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $businessModes = $response->getBusinessModeList();
        foreach ($businessModes as $businessMode) {
            $this->assertEquals('NTQMDLSTZ', $businessMode->getTagName());
            $this->assertTrue($businessMode->BUSMOD && $businessMode->MODALS);
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
        $request = (new GetModeListRequest(
            '银企直连网银互联1',
            BusinessCodeDefinition::CODE_OF_WAGES_DISTRIBUTION
        ));

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetModeListResponse($xml));
        $businessModes = $response->getBusinessModeList();
        $this->assertIsArray($businessModes);
        foreach ($businessModes as $businessMode) {
            $this->assertEquals('NTQMDLSTZ', $businessMode->getTagName());
            $this->assertTrue($businessMode->BUSMOD && $businessMode->MODALS);
        }
    }
}