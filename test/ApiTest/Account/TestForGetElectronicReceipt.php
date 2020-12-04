<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Account;


use leqee\CMBFirmBankSDK\api\Account\component\CSRRCFDFY0Component;
use leqee\CMBFirmBankSDK\api\Account\GetElectronicReceiptRequest;
use leqee\CMBFirmBankSDK\api\Account\GetElectronicReceiptResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetElectronicReceipt extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $queryComponent = new CSRRCFDFY0Component('769900002210101', '20110824','20110824','1');
        $queryComponent->RRCCOD = 'HD000202';
        $request = new GetElectronicReceiptRequest(
            'YE',
            $queryComponent
        );

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO><FUNNAM>SDKCSFDFBRT</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>YE</LGNNAM></INFO>
            <CSRRCFDFY0>
                <EACNBR>769900002210101</EACNBR> <BEGDAT>20110824</BEGDAT> <ENDDAT>20110824</ENDDAT> 
                <RRCFLG>1</RRCFLG> <RRCCOD>HD000202</RRCCOD>
            </CSRRCFDFY0>
        </CMBSDKPGK>';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }


    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO><DATTYP>2</DATTYP> <ERRMSG></ERRMSG> <FUNNAM>SDKCSFDFBRT</FUNNAM> <LGNNAM>YE</LGNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <ABFEEPRTZ1>
                <ACCNBR>769900002210101</ACCNBR> <ACTCOD>10001</ACTCOD> <ACTSEQ>00001</ACTSEQ> <AMTCOD>D</AMTCOD> 
                <AMTTRS>1.20</AMTTRS> <BRNNAM>东莞分行营业部</BRNNAM> <BRNNBR>6901</BRNNBR> <BUSNBR>20110110-20191213</BUSNBR>
                <CCYNBR>10</CCYNBR> <CLTNBR>7699000022</CLTNBR><EACNAM>中港第一航务工程局第三工程公司</EACNAM> 
                <ISTNBR>1130000002348</ISTNBR> <NARSMT>手续费</NARSMT> <SEQNBR>7509562008</SEQNBR> <SYSDAT>20110809</SYSDAT> 
                <TRXSET>G88617000000493</TRXSET>
            </ABFEEPRTZ1>
            <ABFEEPRTZ1>
                <ACCNBR>769900002210101</ACCNBR> <ACTCOD>10001</ACTCOD><ACTSEQ>00001</ACTSEQ><AMTCOD>D</AMTCOD>
                <AMTTRS>10.00</AMTTRS> <BRNNAM>东莞分行营业部</BRNNAM> <BRNNBR>6901</BRNNBR> <BUSNBR>20110810-20110812</BUSNBR> 
                <CCYNBR>10</CCYNBR> <CLTNBR>7699000022</CLTNBR> <EACNAM>中港第一航务工程局第三工程公司</EACNAM> 
                <ISTNBR>5470000002239</ISTNBR> <NARSMT>手续费</NARSMT> <SEQNBR>7509562010</SEQNBR> <SYSDAT>20110809</SYSDAT> 
                <TRXSET>G88173000000599</TRXSET>
            </ABFEEPRTZ1>
            <CSRRCFDFZ1>
                <CHKCOD>9D1E0C5B957B4605</CHKCOD><ISTNBR>1130000002348</ISTNBR> 
            </CSRRCFDFZ1>
            <CSRRCFDFZ1> 
                <CHKCOD>57EC0A4ACF99D9DB</CHKCOD> <ISTNBR>5470000002239</ISTNBR>
            </CSRRCFDFZ1>
        </CMBSDKPGK>';
        $response = (new GetElectronicReceiptResponse($responseXML));
        $this->assertEquals('SDKCSFDFBRT', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $totalReceipts = $response->getTotalReceiptList();
        $deductionReceipts = $response->getDeductionReceiptList();
        foreach ($totalReceipts as $key => $receipt) {
            $this->assertNotEmpty($deductionReceipts[$key]);
            $this->assertSame($deductionReceipts[$key]->ISTNBR, $receipt->ISTNBR);
            $this->assertSame('769900002210101', $deductionReceipts[$key]->ACCNBR);
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
        $queryComponent = new CSRRCFDFY0Component('account', 'beginDate','endDate','flag');
        $request = new GetElectronicReceiptRequest(
            '银企直连网银互联1',
            $queryComponent
        );

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetElectronicReceiptResponse($xml));
        $totalReceipts = $response->getTotalReceiptList();
        $this->assertIsArray($totalReceipts);
        foreach ($totalReceipts as $receipt) {
            $this->assertEquals('CSRRCFDFZ1', $receipt->getTagName());
            $this->assertTrue($receipt->ISTNBR && $receipt->CHKCOD);
        }
    }
}