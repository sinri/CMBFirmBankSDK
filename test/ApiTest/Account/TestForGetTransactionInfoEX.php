<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Account;


use leqee\CMBFirmBankSDK\api\Account\component\SDKRBPTRSXComponent;
use leqee\CMBFirmBankSDK\api\Account\GetTransactionInfoEXRequest;
use leqee\CMBFirmBankSDK\api\Account\GetTransactionInfoEXResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetTransactionInfoEX extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $queryComponent = new SDKRBPTRSXComponent('70', '769900076110902',
            '20170320');
        $request = new GetTransactionInfoEXRequest(
            'QGZ01',
            $queryComponent
        );

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>GetTransInfoEX</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>QGZ01</LGNNAM>
            </INFO>
            <SDKRBPTRSX>
                <BBKNBR>70</BBKNBR> <ACCNBR>769900076110902</ACCNBR> <TRSDAT>20170320</TRSDAT> <TRSSEQ></TRSSEQ>
            </SDKRBPTRSX>
        </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO>
                <DATTYP>2</DATTYP> <ERRMSG></ERRMSG> <FUNNAM>GetTransInfoEX</FUNNAM> <LGNNAM>QGZ01</LGNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <NTQTSINFZ>
                <AMTCDR>C</AMTCDR> <APDFLG>Y</APDFLG><ATHFLG></ATHFLG> <BBKNBR>69</BBKNBR> <CHKNBR></CHKNBR>
                <C_ATHFLG>无</C_ATHFLG> <C_BBKNBR>东莞</C_BBKNBR> <C_ETYDAT>2017年03月20日</C_ETYDAT> 
                <C_GSBBBK></C_GSBBBK> <C_RPYBBK></C_RPYBBK> <C_TRSAMT>10.19</C_TRSAMT> <C_TRSAMTC>10.19</C_TRSAMTC> 
                <C_TRSBLV>8,100,566,936.82</C_TRSBLV> <C_VLTDAT>2017年02月17日</C_VLTDAT> <ETYDAT>20170320</ETYDAT> 
                <ETYTIM>100957</ETYTIM> <GSBBBK></GSBBBK> <NARYUR>2016010110940004</NARYUR> <REFNBR>K6237050000004C</REFNBR>
                <REFSUB></REFSUB> <RPYBBK></RPYBBK> <RSV30Z>**</RSV30Z> <RSV50Z></RSV50Z> <TRSAMT>10.19</TRSAMT> 
                <TRSAMTC>10.19</TRSAMTC> <TRSANL>GATR</TRSANL> <TRSBLV>8100566936.82</TRSBLV> <TRSCOD>FP09</TRSCOD>
                <VLTDAT>20170217</VLTDAT> <YURREF></YURREF>
            </NTQTSINFZ>
            <NTRBPTRSZ1>
                <COTFLG>N</COTFLG> <CRTAMT>10.19</CRTAMT> <CRTNBR>1</CRTNBR> <DBTAMT>0.00</DBTAMT> <DBTNBR>0</DBTNBR><TRSSEQ>1</TRSSEQ>
            </NTRBPTRSZ1>
        </CMBSDKPGK>';
        $response = (new GetTransactionInfoEXResponse($responseXML));
        $this->assertEquals('GetTransInfoEX', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $transactionDigest = $response->getTransactionDigest();
        $transactions= $response->getTransactionList();
        foreach ($transactions as $transaction) {
            $this->assertEquals('NTQTSINFZ', $transaction->getTagName());
            $this->assertTrue($transaction->ETYDAT && $transaction->TRSAMT && $transaction->REFNBR);
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
        $queryComponent = new SDKRBPTRSXComponent('bankBranch', 'account',
            'transactionDate');
        $request = new GetTransactionInfoEXRequest(
            '银企直连网银互联1',
            $queryComponent
        );

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetTransactionInfoEXResponse($xml));
        $transactions = $response->getTransactionList();
        $this->assertIsArray($transactions);
        foreach ($transactions as $transaction) {
            $this->assertEquals('NTQTSINFZ', $transaction->getTagName());
            $this->assertTrue($transaction->ETYDAT && $transaction->TRSAMT && $transaction->REFNBR);
        }
    }
}