<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Account;


use \Exception;
use leqee\CMBFirmBankSDK\api\Account\component\SDKTSINFXComponent;
use leqee\CMBFirmBankSDK\api\Account\GetTransactionInfoRequest;
use leqee\CMBFirmBankSDK\api\Account\GetTransactionInfoResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;

class TestForGetTransactionInfo extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $queryComponent = new SDKTSINFXComponent('91', '1280078810001', '20060915', '20060915');
        $queryComponent->C_BBKNBR = '乌鲁木齐';
        $queryComponent->HGHAMT = $queryComponent->LOWAMT = '';
        $queryComponent->AMTCDR = '';
        $request = new GetTransactionInfoRequest(
            'ZL01',
            $queryComponent
        );

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> 
        <CMBSDKPGK>
            <INFO><FUNNAM>GetTransInfo</FUNNAM><DATTYP>2</DATTYP><LGNNAM>ZL01</LGNNAM>
            </INFO>
            <SDKTSINFX>
                <BBKNBR>91</BBKNBR><ACCNBR>1280078810001</ACCNBR><BGNDAT>20060915</BGNDAT>
                <ENDDAT>20060915</ENDDAT><C_BBKNBR>乌鲁木齐</C_BBKNBR><LOWAMT></LOWAMT> <HGHAMT></HGHAMT> <AMTCDR></AMTCDR>
            </SDKTSINFX>
        </CMBSDKPGK>';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO>
                <DATTYP>2</DATTYP> <ERRMSG></ERRMSG> <FUNNAM>GetTransInfo</FUNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <NTQTSINFZ>
                <ETYDAT>20060915</ETYDAT> <ETYTIM>150858</ETYTIM> <VLTDAT></VLTDAT> <TRSCOD>GATR</TRSCOD> 
                <NARYUR>1700016092000032</NARYUR> <TRSAMTD>450.00</TRSAMTD> <TRSAMTC></TRSAMTC><AMTCDR>D</AMTCDR>
                <TRSBLV>968715563.18</TRSBLV><REFNBR>AP090003</REFNBR><REQNBR>0012341529</REQNBR><BUSNAM>企业银行直接支付</BUSNAM>
                <NUSAGE></NUSAGE> <YURREF>6092000032</YURREF><BUSNAR></BUSNAR> <OTRNAR></OTRNAR><C_RPYBBK></C_RPYBBK>
                <RPYNAM>北京集团公司收方帐号</RPYNAM><RPYACC>1280078810099</RPYACC><RPYBBN></RPYBBN><RPYBNK>招商银行乌鲁木齐分行</RPYBNK>
                <RPYADR>新疆维吾尔自治区乌鲁木齐市</RPYADR> <C_GSBBBK></C_GSBBBK><GSBACC></GSBACC><GSBNAM></GSBNAM><INFFLG>1</INFFLG> 
                <ATHFLG>N</ATHFLG> <CHKNBR></CHKNBR> <RSVFLG></RSVFLG> <NAREXT>1750054987</NAREXT> <TRSANL>APGATR</TRSANL>
            </NTQTSINFZ>            
        </CMBSDKPGK>';
        $response = (new GetTransactionInfoResponse($responseXML));
        $this->assertEquals('GetTransInfo', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $transactions= $response->getTransactionList();
        foreach ($transactions as $transaction) {
            $this->assertEquals('NTQTSINFZ', $transaction->getTagName());
            $this->assertTrue($transaction->ETYDAT && $transaction->ETYTIM && $transaction->AMTCDR);
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
        $queryComponent = new SDKTSINFXComponent('bankBranch', 'account', 'beginDate', 'endDate');
        $request = new GetTransactionInfoRequest(
            '银企直连网银互联1',
            $queryComponent
        );

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetTransactionInfoResponse($xml));
        $transactions = $response->getTransactionList();
        $this->assertIsArray($transactions);
        foreach ($transactions as $transaction) {
            $this->assertEquals('NTQTSINFZ', $transaction->getTagName());
            $this->assertTrue($transaction->ETYDAT && $transaction->ETYTIM && $transaction->AMTCDR);
        }
    }
}