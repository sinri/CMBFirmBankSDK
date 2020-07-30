<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Payment;


use leqee\CMBFirmBankSDK\api\Payment\component\NTQRYSTYX1Component;
use leqee\CMBFirmBankSDK\api\Payment\GetPaymentResultByReferenceNoRequest;
use leqee\CMBFirmBankSDK\api\Payment\GetPaymentResultListResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetPaymentResultByReferenceNo extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $queryComponent = new NTQRYSTYX1Component('N02031','SA201510271C20E25406554A87B581',
            '20170501','20170505');
        $queryComponent->RSV50Z='';
        $request = new GetPaymentResultByReferenceNoRequest(
            'QGZ01',
            $queryComponent
        );

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>NTQRYSTY</FUNNAM> <DATTYP>2</DATTYP><LGNNAM>QGZ01</LGNNAM>
            </INFO>
            <NTQRYSTYX1>
                <BUSCOD>N02031</BUSCOD> <YURREF>SA201510271C20E25406554A87B581</YURREF> <BGNDAT>20170501</BGNDAT> 
                <ENDDAT>20170505</ENDDAT> <RSV50Z></RSV50Z>
            </NTQRYSTYX1>
        </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <DATTYP>2</DATTYP> <ERRMSG></ERRMSG> <FUNNAM>NTQRYSTY</FUNNAM> <LGNNAM>QGZ01</LGNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <NTSTLLSTZ>
                <BUSCOD>N02031</BUSCOD> <BUSMOD>00001</BUSMOD> <CCYNBR>10</CCYNBR> <CRTACC>769900016610303</CRTACC> 
                <CRTNAM>中天世纪集团</CRTNAM> <DBTACC>769900038110701</DBTACC> <DBTBBK>69</DBTBBK><EPTDAT>20151027</EPTDAT> 
                <EPTTIM>000000</EPTTIM> <OPRDAT>20151027</OPRDAT> <REQNBR>0000977509</REQNBR> <REQSTS>FIN</REQSTS>
                <RTNFLG>S</RTNFLG> <TRSAMT>12.10</TRSAMT> <YURREF>SA201510271C20E25406554A87B581</YURREF>
            </NTSTLLSTZ>
        </CMBSDKPGK>
        ';
        $response = (new GetPaymentResultListResponse($responseXML));
        $this->assertEquals('NTQRYSTY', $response->getInfoFunctionName());
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
        $queryComponent = new NTQRYSTYX1Component('businessCode','referenceNo',
            'beginDate','endDate');
        $request = new GetPaymentResultByReferenceNoRequest(
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