<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Account;


use Exception;
use leqee\CMBFirmBankSDK\api\Account\GetAccountListRequest;
use leqee\CMBFirmBankSDK\api\Account\GetAccountListResponse;
use leqee\CMBFirmBankSDK\api\Basement\definition\BusinessCodeDefinition;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;

class TestForGetAccountList extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $request = new GetAccountListRequest(
            'ZL01',
            'N03010',//\leqee\CMBFirmBankSDK\api\Basement\BusinessCodeDefinition::CODE_OF_QUERY_ACCOUNT,
            '00001'
        );

        $sampleXML = '<?xml version="1.0" encoding = "GBK"?> <CMBSDKPGK>
            <INFO> <FUNNAM>ListAccount</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>ZL01</LGNNAM>
                </INFO>
                <SDKACLSTX>
                    <BUSCOD>N03010</BUSCOD>
                    <BUSMOD>00001</BUSMOD>
                </SDKACLSTX>
            </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>ListAccount</FUNNAM> <DATTYP>2</DATTYP> <RETCOD>0</RETCOD> <ERRMSG></ERRMSG>
                </INFO>
                <NTQACLSTZ>
            <CCYNBR>10</CCYNBR> <BBKNBR>91</BBKNBR> <ACCNBR>1280099610001</ACCNBR> <ACCNAM>金蝶软件集团公司</ACCNAM> <C_RELNBR>测试(母公司)</C_RELNBR> <RELNBR>0000000072</RELNBR>
                </NTQACLSTZ>
                <NTQACLSTZ>
            <ACCNAM>金蝶软件集团公司收方账号</ACCNAM> <ACCNBR>1280099610099</ACCNBR> <BBKNBR>91</BBKNBR>
            <CCYNBR>10</CCYNBR> <C_RELNBR>测试(母公司)</C_RELNBR> <RELNBR>0000000072</RELNBR>
                </NTQACLSTZ>
            </CMBSDKPGK>
        ';
        $response = (new GetAccountListResponse($responseXML));
        $this->assertEquals('ListAccount', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $accounts = $response->getAccountList();
        foreach ($accounts as $account) {
            if ($account->ACCNBR === '1280099610001') {
                $this->assertSame('金蝶软件集团公司', $account->ACCNAM);
            } elseif ($account->ACCNBR === '1280099610099') {
                $this->assertSame('金蝶软件集团公司收方账号', $account->ACCNAM);
            }
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
        $request = (new GetAccountListRequest(
            '银企直连网银互联1',
            BusinessCodeDefinition::CODE_OF_QUERY_ACCOUNT,
            '0'
        ));

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetAccountListResponse($xml));
        $accounts = $response->getAccountList();
        $this->assertIsArray($accounts);
        foreach ($accounts as $account) {
            $this->assertEquals('NTQACLSTZ', $account->getTagName());
            $this->assertNotEmpty($account->ACCNBR);
        }
    }
}