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
            <CPRRCRCVX1>
                <BUSNBR>20R5009400689</BUSNBR><CCYNBR>10</CCYNBR><ISTNBR>9190007047528</ISTNBR><ISUDAT>20201202</ISUDAT>
                <NARTX1>20R5009400689</NARTX1><NARTXT>8月乐麦直播费用</NARTXT><RCVEAA>浙江省杭州市</RCVEAA>
                <RCVEAB>招商银行杭州分行钱塘支行</RCVEAB><RCVEAC>571906667110919</RCVEAC><RCVEAN>乐麦信息技术（杭州）有限公司</RCVEAN>
                <REGEAC>571906667110919</REGEAC><RRCTYP>CPRRCCR1</RRCTYP><SNDEAA>广东省广州市</SNDEAA><SNDEAB>招商银行广州分行天府路支行</SNDEAB>
                <SNDEAC>120910405610801</SNDEAC><SNDEAN>广州淘通科技股份有限公司</SNDEAN><SPLC80>G27854UC02ADUKJ</SPLC80>
                <TLRNBR>G27854</TLRNBR><TRSAMT>149006.00</TRSAMT><TRSNBR>20R5009400689</TRSNBR><TSKNBR>G278540009219</TSKNBR>
            </CPRRCRCVX1>
            <CPRRCRTNX1>
                <BUSNBR>20S9015986460</BUSNBR><CCYNBR>10</CCYNBR><ISTNBR>9190007047656</ISTNBR><ISUDAT>20201202</ISUDAT>
                <NARTX1>N020312020120254561001</NARTX1><NARTXT>收款人名称有误</NARTXT><RCVEAA>杭州市西湖区</RCVEAA>
                <RCVEAB>中国建设银行股份有限公司杭州宝石支行</RCVEAB><RCVEAC>33001616183053000191</RCVEAC><RCVEAN>浙江商业职业技术学院（杭州商业技工学校）</RCVEAN>
                <REGEAC>571906667110919</REGEAC><RRCTYP>CPRRCRC2</RRCTYP><RTNDAT>20201202</RTNDAT><RTNEAA>浙江省杭州市</RTNEAA>
                <RTNEAB>招商银行杭州分行钱塘支行</RTNEAB><RTNEAC>571906667110919</RTNEAC><RTNEAN>乐麦信息技术（杭州）有限公司</RTNEAN>
                <SNDEAA>浙江省杭州市</SNDEAA><SNDEAB>招商银行杭州分行钱塘支行</SNDEAB><SNDEAC>571906667110919</SNDEAC>
                <SNDEAN>乐麦信息技术（杭州）有限公司</SNDEAN><SPLC80>C01534UC02AARFJ</SPLC80><TLRNBR>C01534</TLRNBR>
                <TRSAMT>1676021.00</TRSAMT><TRSNBR>C01534UC02AARFJ</TRSNBR><TSKNBR>C015340012695</TSKNBR>
            </CPRRCRTNX1>
            <CPRRCSNDX1>
                <BUSNBR>20S6016102454</BUSNBR><CCYNBR>10</CCYNBR><ISTNBR>9190007045235</ISTNBR><ISUDAT>20201201</ISUDAT>
                <NARTX1>N020312020120198995510</NARTX1><NARTXT>20111880957 — 其他</NARTXT><RCVEAA>上海自由贸易试验区</RCVEAA>
                <RCVEAB>新韩银行（中国）有限公司上海分行</RCVEAB><RCVEAC>700002653551</RCVEAC><RCVEAN>纪伊珂贸易（上海）有限公司</RCVEAN>
                <REFTCD>N02031</REFTCD><REGEAC>571906667110919</REGEAC><RRCTYP>CPRRCSN2</RRCTYP><SNDEAA>浙江省杭州市</SNDEAA>
                <SNDEAB>招商银行杭州分行钱塘支行</SNDEAB><SNDEAC>571906667110919</SNDEAC><SNDEAN>乐麦信息技术（杭州）有限公司</SNDEAN>
                <SPLC80>G02661UC01AFYWJ</SPLC80><TLRNBR>G02661</TLRNBR><TRSAMT>500000.00</TRSAMT><TRSNBR>G02661UC01AFYWJ</TRSNBR>
                <TSKNBR>G026610025538</TSKNBR>
            </CPRRCSNDX1>
            <CSRRCFDFZ1>
                <CHKCOD>9D1E0C5B957B4605</CHKCOD><ISTNBR>1130000002348</ISTNBR> 
            </CSRRCFDFZ1>
            <CSRRCFDFZ1> 
                <CHKCOD>57EC0A4ACF99D9DB</CHKCOD> <ISTNBR>5470000002239</ISTNBR>
            </CSRRCFDFZ1>
            <CSRRCFDFZ1>
                <CHKCOD>40B775834E3866B9</CHKCOD><ISTNBR>9190007045235</ISTNBR><ITMCOD>HD002013</ITMCOD><TRSSEQ>G0266100021630C</TRSSEQ>
            </CSRRCFDFZ1>
            <CSRRCFDFZ1>
                <CHKCOD>D0554C7322D36B6E</CHKCOD><ISTNBR>9190007047656</ISTNBR><ITMCOD>HD002016</ITMCOD><TRSSEQ>C0153400019128C</TRSSEQ>
            </CSRRCFDFZ1>
            <CSRRCFDFZ1>
                <CHKCOD>47503EB2EA737747</CHKCOD><ISTNBR>9190007047528</ISTNBR><ITMCOD>HD002037</ITMCOD><TRSSEQ>G2785400016652C</TRSSEQ>
            </CSRRCFDFZ1>
        </CMBSDKPGK>';
        $response = (new GetElectronicReceiptResponse($responseXML));
        $this->assertEquals('SDKCSFDFBRT', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $totalReceipts = $response->getTotalReceiptList();
        $deductionReceipts = $response->getDeductionReceiptList();
        $publicPaymentReceipts = $response->getPublicPaymentReceiptList();
        $publicChargeReceipts = $response->getPublicChargeReceiptList();
        $publicRefundReceipts = $response->getPublicRefundReceiptList();

        $receiptMapping = [];
        foreach (['deductionReceipts' => $deductionReceipts,
                     'publicPaymentReceipts' => $publicPaymentReceipts,
                     'publicChargeReceipts' => $publicChargeReceipts,
                     'publicRefundReceipts' => $publicRefundReceipts] as $type => $receiptList){
            foreach ($receiptList as $key => $item){
                $receiptMapping[$item->ISTNBR] = [
                    'type' => $type,
                    'index' => $key,
                    'info' => $item
                ];
            }
        }
        foreach ($totalReceipts as $receipt) {
            $this->assertNotEmpty($receiptMapping[$receipt->ISTNBR]);
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
            $this->assertTrue($receipt->ISTNBR && $receipt->TRSSEQ);
        }
    }
}