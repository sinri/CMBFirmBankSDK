<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Account;


use leqee\CMBFirmBankSDK\api\Account\component\NTQABINFYComponent;
use leqee\CMBFirmBankSDK\api\Account\GetHistoryBalanceInfoRequest;
use leqee\CMBFirmBankSDK\api\Account\GetHistoryBalanceInfoResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetHistoryBalanceInfo extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $queryComponent = new NTQABINFYComponent('69', '769900002210101','20080901','20080903');
        $request = new GetHistoryBalanceInfoRequest(
            'ZL01',
            $queryComponent
        );

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>SDKNTQABINF</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>ZL01</LGNNAM>
            </INFO>
            <NTQABINFY>
                <BBKNBR>69</BBKNBR> 
                <ACCNBR>769900002210101</ACCNBR> 
                <BGNDAT>20080901</BGNDAT> 
                <ENDDAT>20080903</ENDDAT>
            </NTQABINFY>
        </CMBSDKPGK>';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding="UTF-8"?> <CMBSDKPGK>
            <INFO>
            <DATTYP>2</DATTYP> <ERRMSG></ERRMSG> <FUNNAM>SDKNTQABINF</FUNNAM> <LGNNAM>ZL01</LGNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <NTQABINFZ>
                <ACCNBR>769900002210101</ACCNBR> <BALAMT>54999970887.96</BALAMT> <BBKNBR>69</BBKNBR> <C_BBKNBR>东莞</C_BBKNBR> <TRSDAT>20080901</TRSDAT>
            </NTQABINFZ>
            <NTQABINFZ> 
                <ACCNBR>769900002210101</ACCNBR> <BALAMT>54999970887.96</BALAMT> <BBKNBR>69</BBKNBR> <C_BBKNBR>东莞</C_BBKNBR> <TRSDAT>20080902</TRSDAT>
            </NTQABINFZ>
            <NTQABINFZ>
                <ACCNBR>769900002210101</ACCNBR> <BALAMT>54999970887.96</BALAMT> <BBKNBR>69</BBKNBR> <C_BBKNBR>东莞</C_BBKNBR> <TRSDAT>20080903</TRSDAT>
            </NTQABINFZ>
        </CMBSDKPGK>';
        $response = (new GetHistoryBalanceInfoResponse($responseXML));
        $this->assertEquals('SDKNTQABINF', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $balances = $response->getBalanceList();
        foreach ($balances as $balance) {
            $this->assertSame('769900002210101', $balance->ACCNBR);
            $this->assertSame('69', $balance->BBKNBR);
            $this->assertSame('54999970887.96', $balance->BALAMT);
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
        $queryComponent = new NTQABINFYComponent('bankBranch', 'account','beginDate','endDate');
        $request = new GetHistoryBalanceInfoRequest(
            '银企直连网银互联1',
            $queryComponent
        );

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetHistoryBalanceInfoResponse($xml));
        $balances = $response->getBalanceList();
        $this->assertIsArray($balances);
        foreach ($balances as $balance) {
            $this->assertEquals('NTQABINFZ', $balance->getTagName());
            $this->assertTrue($balance->ACCNBR && $balance->BBKNBR && $balance->TRSDAT && $balance->BALAMT);
        }
    }
}