<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Payment;


use leqee\CMBFirmBankSDK\api\Payment\GetPaymentInfoRequest;
use leqee\CMBFirmBankSDK\api\Payment\GetPaymentInfoResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetPaymentInfo extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $request = new GetPaymentInfoRequest('PAY1');
        $request->addQueryComponent('0099956124');

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>NTSTLINF</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>PAY1</LGNNAM>
            </INFO>
            <NTSTLINFX>
                <REQNBR>0099956124</REQNBR> </NTSTLINFX>
            </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding="UTF-8"?> <CMBSDKPGK>
            <INFO>
                <DATTYP>2</DATTYP> <ERRMSG></ERRMSG> <FUNNAM>NTSTLINF</FUNNAM> <LGNNAM>PAY1</LGNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <NTQPAYQYZ>
                <ATHFLG>N</ATHFLG> <BNKFLG>Y</BNKFLG> <BUSCOD>N02031</BUSCOD> <BUSMOD>00002</BUSMOD> <BUSSTS>A</BUSSTS>
                <CCYNBR>10</CCYNBR> <CRTACC>755903229710299</CRTACC> <CRTADR>广东省深圳市</CRTADR> <CRTBBK>75</CRTBBK>
                <CRTBNK>招商银行</CRTBNK> <CRTNAM>委托贷款1</CRTNAM> <DBTACC>755900008010306</DBTACC> <DBTADR>广东省深圳市</DBTADR> 
                <DBTBBK>69</DBTBBK> <DBTBNK>招商银行东莞分行营业部</DBTBNK> <DBTNAM>世纪天骄集团</DBTNAM> <DBTREL>0000000006</DBTREL>
                <EPTDAT>20150122</EPTDAT> <EPTTIM>000000</EPTTIM> <FEETYP>N</FEETYP> <LGNNAM>PAY1</LGNNAM> <NUSAGE>测试</NUSAGE> 
                <OPRDAT>20150122</OPRDAT> <RCVTYP>A</RCVTYP> <REGFLG>N</REGFLG> <REQNBR>0099956124</REQNBR> <REQSTS>NTE</REQSTS> 
                <STLCHN>N</STLCHN> <TRSAMT>3.00</TRSAMT> <TRSBRN>769501</TRSBRN> <TRSTYP>100001</TRSTYP> <USRNAM>公共用户请勿修改</USRNAM> <YURREF>201501091430</YURREF>
            </NTQPAYQYZ>
        </CMBSDKPGK>
        ';
        $response = (new GetPaymentInfoResponse($responseXML));
        $this->assertEquals('NTSTLINF', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $paymentInfos = $response->getPaymentInfoList();
        foreach ($paymentInfos as $paymentInfo) {
            $this->assertEquals('NTQPAYQYZ', $paymentInfo->getTagName());
            $this->assertTrue($paymentInfo->DBTACC && $paymentInfo->CRTACC && $paymentInfo->TRSAMT && $paymentInfo->CCYNBR);
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
        $request = new GetPaymentInfoRequest('银企直连网银互联1');
        $request->addQueryComponent('requestNo');

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetPaymentInfoResponse($xml));
        $paymentInfos = $response->getPaymentInfoList();
        $this->assertIsArray($paymentInfos);
        foreach ($paymentInfos as $paymentInfo) {
            $this->assertEquals('NTQPAYQYZ', $paymentInfo->getTagName());
            $this->assertTrue($paymentInfo->DBTACC && $paymentInfo->CRTACC && $paymentInfo->TRSAMT && $paymentInfo->CCYNBR);
        }
    }
}