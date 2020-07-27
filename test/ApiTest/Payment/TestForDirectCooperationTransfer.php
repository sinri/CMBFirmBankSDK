<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Payment;


use leqee\CMBFirmBankSDK\api\Payment\component\DCOPRTRFXComponent;
use leqee\CMBFirmBankSDK\api\Payment\DirectCooperationTransferRequest;
use leqee\CMBFirmBankSDK\api\Payment\DirectPaymentResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForDirectCooperationTransfer extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $request = new DirectCooperationTransferRequest(
            'ZL01',
            '00001'
        );
        $payDetail = new DCOPRTRFXComponent('APP060928001258','1280022310002', '75',
            '1.01', '10', '测试', '1280022310601');
        $request->addPayDetail($payDetail);

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>DCOPRTRF</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>ZL01</LGNNAM>
            </INFO>
            <SDKPAYRQX>
                <BUSMOD>00001</BUSMOD>
            </SDKPAYRQX>
            <DCOPRTRFX>
                <YURREF>APP060928001258</YURREF> <DBTACC>1280022310002</DBTACC> <DBTBBK>75</DBTBBK> <TRSAMT>1.01</TRSAMT> 
                <CCYNBR>10</CCYNBR> <NUSAGE>测试</NUSAGE> <CRTACC>1280022310601</CRTACC>
            </DCOPRTRFX>
        </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
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
        $request = new DirectCooperationTransferRequest(
            '银企直连网银互联1',
            'businessMode'
        );
        $payDetail = new DCOPRTRFXComponent('referenceNo','billToAccount',
            'billToBranchBank', 'TransactionAmount', 'currencyCode',
            'usage', 'recipientAccount');
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