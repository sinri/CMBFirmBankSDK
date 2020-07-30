<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Distribution;


use leqee\CMBFirmBankSDK\api\Distribution\AgencyDeductionHandleRequest;
use leqee\CMBFirmBankSDK\api\Distribution\AgencyPaymentHandleResponse;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCAGCX1Component;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCDTLY1ComponentForRequest;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForAgencyDeductionHandle extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $handleRequest = new NTAGCAGCX1Component('Y','Y','168','1',
            '1', '168','1', '10', '69',
            '755900008010306','0','AYBK','代扣其他','DC201504010905');
        $handleRequest->GRTFLG = 'Y';

        $request = new AgencyDeductionHandleRequest(
            'PAY1',
            '00003', $handleRequest
        );
        $handleItem = new NTAGCDTLY1ComponentForRequest('00000001', '769900155110603', '同业代理清算户',
            '168', 'Y');
        $request->addHandleItem($handleItem);

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>NTAGCACL</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>PAY1</LGNNAM>
            </INFO>
            <NTBUSMODY>
                <BUSMOD>00003</BUSMOD>
            </NTBUSMODY>
            <NTAGCAGCX1>
                <BEGTAG>Y</BEGTAG> <ENDTAG>Y</ENDTAG> <TTLAMT>168</TTLAMT> <TTLCNT>1</TTLCNT> <TTLNUM>1</TTLNUM> <CURAMT>168</CURAMT> 
                <CURCNT>1</CURCNT> <CCYNBR>10</CCYNBR> <BBKNBR>69</BBKNBR> <ACCNBR>755900008010306</ACCNBR> <CCYMKT>0</CCYMKT>
                <TRSTYP>AYBK</TRSTYP> <NUSAGE>代扣其他</NUSAGE> <YURREF>DC201504010905</YURREF> <GRTFLG>Y</GRTFLG>
            </NTAGCAGCX1>
            <NTAGCDTLY1>
                <TRXSEQ>00000001</TRXSEQ> <ACCNBR>769900155110603</ACCNBR> <ACCNAM>同业代理清算户</ACCNAM> <TRSAMT>168</TRSAMT> <BNKFLG>Y</BNKFLG>
            </NTAGCDTLY1>
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

        $handleRequest = new NTAGCAGCX1Component('beginTag','endTag','totalAmount',
            'totalCount', 'totalNo', 'currentAmount','currentCount',
            'currencyCode', 'branchBank', 'account','currencyMarket',
            'transactionType','usage','referenceNo');
        $request = new AgencyDeductionHandleRequest(
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