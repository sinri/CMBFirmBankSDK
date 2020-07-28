<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Payment;


use leqee\CMBFirmBankSDK\api\Payment\component\DCOPDPAYXComponent;
use leqee\CMBFirmBankSDK\api\Payment\component\SDKPAYRQXComponent;
use leqee\CMBFirmBankSDK\api\Payment\DirectPaymentRequest;
use leqee\CMBFirmBankSDK\api\Payment\DirectPaymentResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForDirectPayment extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $request = new DirectPaymentRequest(
            'ZL01',
            'N02031'
        );
        $payDetail = new DCOPDPAYXComponent('APP060928001255','1280022310002', '75',
            '1.01', '10', 'N', '测试', 'Y', '1280022310601',
            '反洗钱测试二');
        $payDetail->CRTBNK = '招商银行';
        $request->addPayDetail($payDetail);

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>DCPAYMNT</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>ZL01</LGNNAM>
            </INFO>
            <SDKPAYRQX>
                <BUSMOD>00001</BUSMOD>
                <BUSCOD>N02031</BUSCOD>
            </SDKPAYRQX>
            <DCOPDPAYX> 
                <YURREF>APP060928001255</YURREF> <DBTACC>1280022310002</DBTACC> <DBTBBK>75</DBTBBK> <TRSAMT>1.01</TRSAMT> 
                <CCYNBR>10</CCYNBR> <STLCHN>N</STLCHN> <NUSAGE>测试</NUSAGE> <BNKFLG>Y</BNKFLG> <CRTACC>1280022310601</CRTACC> 
                <CRTNAM>反洗钱测试二</CRTNAM> <CRTBNK>招商银行</CRTBNK>
            </DCOPDPAYX>
        </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>Payment</FUNNAM> <DATTYP>2</DATTYP> <RETCOD>0</RETCOD> <ERRMSG></ERRMSG>
            </INFO>
            <NTQPAYRQZ>
                <ERRCOD>SUC0000</ERRCOD> <REQNBR>0012341664</REQNBR> <REQSTS>NTE</REQSTS> <SQRNBR>0000000002</SQRNBR> 
                <YURREF>APP060928000251</YURREF>
            </NTQPAYRQZ>
        </CMBSDKPGK>
        ';
        $response = (new DirectPaymentResponse($responseXML));
        $this->assertEquals('Payment', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $payResults = $response->getPaymentResultInfoList();
        foreach ($payResults as $payResult) {
            $this->assertSame('NTE', $payResult->REQSTS);
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
        $payRequest = new SDKPAYRQXComponent('businessCode');
        $request = new DirectPaymentRequest(
            '银企直连网银互联1',
            $payRequest
        );
        $payDetail = new DCOPDPAYXComponent('referenceNo','billToAccount',
            'billToBranchBank', 'TransactionAmount', 'currencyCode',
            'settlement', 'usage', 'bankFlag', 'recipientAccount',
            'recipientName');
        $request->addPayDetail($payDetail);

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new DirectPaymentResponse($xml));
        $payResults = $response->getPaymentResultInfoList();
        $this->assertIsArray($payResults);
        foreach ($payResults as $payResult) {
            $this->assertEquals('Payment', $payResult->getTagName());
            $this->assertNotEmpty($payResult->REQSTS);
        }
    }
}