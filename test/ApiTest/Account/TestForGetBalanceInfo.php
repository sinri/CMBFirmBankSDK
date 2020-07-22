<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Account;


use leqee\CMBFirmBankSDK\api\Account\GetBalanceInfoRequest;
use leqee\CMBFirmBankSDK\api\Account\GetBalanceInfoResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetBalanceInfo extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $request = new GetBalanceInfoRequest('Y1');
        $request->addQueryAccount('69', '769900000010370');
        $request->addQueryAccount('69', '769900000010458');

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>NTQADINF</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>Y1</LGNNAM>
            </INFO>
            <NTQADINFX>
                <BBKNBR>69</BBKNBR> <ACCNBR>769900000010370</ACCNBR> 
            </NTQADINFX>
            <NTQADINFX>
                <BBKNBR>69</BBKNBR> <ACCNBR>769900000010458</ACCNBR> 
            </NTQADINFX>
        </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding="UTF-8"?> <CMBSDKPGK>
            <INFO> <DATTYP>2</DATTYP> <ERRMSG/> <FUNNAM>NTQADINF</FUNNAM> <LGNNAM>Y1</LGNNAM> <RETCOD>0</RETCOD>
            </INFO>
            <NTQADINFZ>
                <ACCBLV>99999999999.99</ACCBLV> <ACCITM>20102</ACCITM> <ACCNAM>东莞城建股份有限公司 21424</ACCNAM> 
                <ACCNBR>769900000010370</ACCNBR> <AVLBLV>99989980712.16</AVLBLV> <BBKNBR>69</BBKNBR>
                <CCYNBR>10</CCYNBR> <DPSTXT>在岸挂牌对</DPSTXT> <ERRCOD>SUC0000</ERRCOD> <HLDBLV>0.00</HLDBLV> 
                <INTRAT>0.3850000</INTRAT> <LMTOVR>0.00</LMTOVR> <ONLBLV>99989980712.16</ONLBLV> <OPNDAT>20100101</OPNDAT> <RELNBR>0000001256</RELNBR> <STSCOD>A</STSCOD>
            </NTQADINFZ>
            <NTQADINFZ>
                <ACCBLV>0.00</ACCBLV> <ACCITM>20102</ACCITM> <ACCNAM>东莞城建股份有限公司 21424</ACCNAM> 
                <ACCNBR>769900000010458</ACCNBR> <AVLBLV>0.00</AVLBLV> <BBKNBR>69</BBKNBR><CCYNBR>10</CCYNBR> <DPSTXT>在岸挂牌对</DPSTXT> <ERRCOD>SUC0000</ERRCOD> <HLDBLV>0.00</HLDBLV> 
                <INTRAT>0.3850000</INTRAT> <LMTOVR>0.00</LMTOVR> <ONLBLV>0.00</ONLBLV> <OPNDAT>20120301</OPNDAT> <RELNBR>0000001256</RELNBR> <STSCOD>A</STSCOD>
            </NTQADINFZ>
        </CMBSDKPGK>
        ';
        $response = (new GetBalanceInfoResponse($responseXML));
        $this->assertEquals('NTQADINF', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $balanceInfos = $response->getBalanceInfoList();
        foreach ($balanceInfos as $balanceInfo) {
            $this->assertSame('69', $balanceInfo->BBKNBR);
            $this->assertTrue(in_array($balanceInfo->ACCNBR,['769900000010370','769900000010458']));
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
        $request = new GetBalanceInfoRequest('银企直连网银互联1');
        $request->addQueryAccount('bankBranch', 'account');

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetBalanceInfoResponse($xml));
        $balanceInfos = $response->getBalanceInfoList();
        $this->assertIsArray($balanceInfos);
        foreach ($balanceInfos as $balanceInfo) {
            $this->assertEquals('NTQADINF', $balanceInfo->getTagName());
            $this->assertTrue($balanceInfo->BBKNBR && $balanceInfo->ACCNBR && $balanceInfo->ACCBLV && $balanceInfo->ONLBLV);
        }
    }
}