<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Distribution;


use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCAGCX1Component;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCDTLY1ComponentForRequest;
use leqee\CMBFirmBankSDK\api\Distribution\AgencyPaymentHandleRequest;
use leqee\CMBFirmBankSDK\api\Distribution\AgencyPaymentHandleResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForAgencyPaymentHandle extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $handleRequest = new NTAGCAGCX1Component('Y','N','500','3',
            '2', '100','1', '10', '69',
            '755900008010306','0','BYBC','代发劳务收入','DF201504021051001');
        $handleRequest->GRTFLG = 'Y';

        $request = new AgencyPaymentHandleRequest(
            'PAY1',
            '00001', $handleRequest
        );
        $handleItem = new NTAGCDTLY1ComponentForRequest('00000001', '769900155110603', '同业代理清算户',
                '100', 'Y');
        $request->addHandleItem($handleItem);

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>NTAGCAPY</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>PAY1</LGNNAM>
            </INFO>
            <NTBUSMODY>
                <BUSMOD>00001</BUSMOD>
            </NTBUSMODY>
            <NTAGCAGCX1>
                <BEGTAG>Y</BEGTAG> <ENDTAG>N</ENDTAG> <TTLAMT>500</TTLAMT> <TTLCNT>3</TTLCNT> <TTLNUM>2</TTLNUM>
                <CURAMT>100</CURAMT> <CURCNT>1</CURCNT> <CCYNBR>10</CCYNBR> <BBKNBR>69</BBKNBR> <ACCNBR>755900008010306</ACCNBR> 
                <CCYMKT>0</CCYMKT> <TRSTYP>BYBC</TRSTYP> <NUSAGE>代发劳务收入</NUSAGE> <YURREF>DF201504021051001</YURREF> <GRTFLG>Y</GRTFLG>
            </NTAGCAGCX1>
            <NTAGCDTLY1>
                <TRXSEQ>00000001</TRXSEQ> <ACCNBR>769900155110603</ACCNBR> <ACCNAM>同业代理清算户</ACCNAM> <TRSAMT>100</TRSAMT> <BNKFLG>Y</BNKFLG>
            </NTAGCDTLY1>
        </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <DATTYP>2</DATTYP> <ERRMSG></ERRMSG> <FUNNAM>NTAGCAPY</FUNNAM> <LGNNAM>PAY1</LGNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <NTAGCAGCZ1>
                <REQNBR>0099960770</REQNBR><REQSTA>OPR</REQSTA>
            </NTAGCAGCZ1>
        </CMBSDKPGK>
        ';
        $response = (new AgencyPaymentHandleResponse($responseXML));
        $this->assertEquals('NTAGCAPY', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $result = $response->getHandleResult();
        $this->assertEquals('NTAGCAGCZ1', $result->getTagName());
        $this->assertNotEmpty($result->REQNBR && $result->REQSTA);
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

        $handleRequest = new NTAGCAGCX1Component('beginTag','endTag','totalAmount',
            'totalCount', 'totalNo', 'currentAmount','currentCount',
            'currencyCode', 'branchBank', 'account','currencyMarket',
            'transactionType','usage','referenceNo');
        $request = new AgencyPaymentHandleRequest(
            '银企直连网银互联1',
            'businessMode', $handleRequest
        );
        $handleItem = new NTAGCDTLY1ComponentForRequest('transactionNo', 'account', 'accountName',
            'amount', 'bankFlag');
        $request->addHandleItem($handleItem);

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new AgencyPaymentHandleResponse($xml));
        $result = $response->getHandleResult();
        $this->assertEquals('NTAGCAGCZ1', $result->getTagName());
        $this->assertNotEmpty($result->REQNBR && $result->REQSTA);
    }
}