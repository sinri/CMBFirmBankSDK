<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Payment;


use leqee\CMBFirmBankSDK\api\Payment\component\NTQRYSTNY1Component;
use leqee\CMBFirmBankSDK\api\Payment\GetPaymentResultListRequest;
use leqee\CMBFirmBankSDK\api\Payment\GetPaymentResultListResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetPaymentResultList extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $queryComponent = new NTQRYSTNY1Component('N02030','00001','20170417','20170418');
        $request = new GetPaymentResultListRequest(
            'QGZ01',
            $queryComponent
        );

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>NTQRYSTN</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>QGZ01</LGNNAM>
            </INFO>
            <NTQRYSTNY1>
                <BUSCOD>N02030</BUSCOD> <BUSMOD>00001</BUSMOD> <BGNDAT>20170417</BGNDAT> <ENDDAT>20170418</ENDDAT>
            </NTQRYSTNY1>
        </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO>
                <DATTYP>2</DATTYP> <ERRMSG></ERRMSG> <FUNNAM>NTQRYSTN</FUNNAM> <LGNNAM>QGZ01</LGNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <NTSTLLSTZ>
                <ATHFLG>N</ATHFLG> <BUSCOD>N02030</BUSCOD> <BUSMOD>00001</BUSMOD> <CCYNBR>10</CCYNBR> 
                <CRTACC>769900115910999</CRTACC> <CRTBBK>69</CRTBBK> <CRTNAM>深圳万科股份有限公司</CRTNAM> 
                <DBTACC>769900038110701</DBTACC> <DBTBBK>69</DBTBBK> <EPTDAT>20170418</EPTDAT> <EPTTIM>080000</EPTTIM>
                <OPRDAT>20170418</OPRDAT> <REQNBR>0001154105</REQNBR> <REQSTS>AUT</REQSTS> <TRSAMT>3.00</TRSAMT> <YURREF>201704181043590</YURREF>
            </NTSTLLSTZ>
            <NTSTLLSTZ>
                <ATHFLG>N</ATHFLG> <BUSCOD>N02030</BUSCOD> <BUSMOD>00001</BUSMOD> <CCYNBR>10</CCYNBR> 
                <CRTACC>769900115910999</CRTACC> <CRTBBK>69</CRTBBK> <CRTNAM>深圳万科股份有限公司</CRTNAM> 
                <DBTACC>769900038110701</DBTACC> <DBTBBK>69</DBTBBK> <EPTDAT>20170418</EPTDAT> <EPTTIM>080000</EPTTIM>
                <OPRDAT>20170418</OPRDAT> <REQNBR>0001154106</REQNBR> <REQSTS>AUT</REQSTS> <TRSAMT>3.00</TRSAMT> <YURREF>201704181043591</YURREF>
            </NTSTLLSTZ>
            <NTSTLLSTZ>
                <ATHFLG>N</ATHFLG> <BUSCOD>N02030</BUSCOD> <BUSMOD>00001</BUSMOD> <CCYNBR>10</CCYNBR> 
                <CRTACC>769900115910999</CRTACC> <CRTBBK>69</CRTBBK> <CRTNAM>深圳万科股份有限公司</CRTNAM> 
                <DBTACC>769900038110701</DBTACC> <DBTBBK>69</DBTBBK> <EPTDAT>20170418</EPTDAT> <EPTTIM>080000</EPTTIM> 
                <OPRDAT>20170418</OPRDAT> <REQNBR>0001154107</REQNBR> <REQSTS>AUT</REQSTS> <TRSAMT>3.00</TRSAMT> <YURREF>201704181043592</YURREF>
            </NTSTLLSTZ>
        </CMBSDKPGK>
        ';
        $response = (new GetPaymentResultListResponse($responseXML));
        $this->assertEquals('NTQRYSTN', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $results = $response->getResultList();
        foreach ($results as $result) {
            $this->assertEquals('NTSTLLSTZ', $result->getTagName());
            $this->assertTrue($result->DBTACC && $result->CRTACC && $result->TRSAMT && $result->CCYNBR);
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
        $queryComponent = new NTQRYSTNY1Component('businessCode','businessMode','beginDate','endDate');
        $request = new GetPaymentResultListRequest(
            '银企直连网银互联1',
            $queryComponent
        );

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetPaymentResultListResponse($xml));
        $results = $response->getResultList();
        $this->assertIsArray($results);
        foreach ($results as $result) {
            $this->assertEquals('NTSTLLSTZ', $result->getTagName());
            $this->assertTrue($result->DBTACC && $result->CRTACC && $result->TRSAMT && $result->CCYNBR);
        }
    }
}