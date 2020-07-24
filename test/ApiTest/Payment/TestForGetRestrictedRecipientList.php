<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest\Payment;


use leqee\CMBFirmBankSDK\api\Payment\GetRestrictedRecipientListRequest;
use leqee\CMBFirmBankSDK\api\Payment\GetRestrictedRecipientListResponse;
use leqee\CMBFirmBankSDK\test\ApiTest\MockedTestEnv;
use PHPUnit\Framework\TestCase;
use Exception;

class TestForGetRestrictedRecipientList extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGenerateRequestXML()
    {
        $request = new GetRestrictedRecipientListRequest(
            'PAY1'
        );

        $sampleXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO>
                <FUNNAM>NTQRYRVL</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>PAY1</LGNNAM>
            </INFO>
        </CMBSDKPGK>
        ';

        $this->assertXmlStringEqualsXmlString($request->generateXML(), $sampleXML);
    }

    public function testParseResponseXML()
    {
        $responseXML = '<?xml version="1.0" encoding = "UTF-8"?> <CMBSDKPGK>
            <INFO> <FUNNAM>NTQRYRVL</FUNNAM> <DATTYP>2</DATTYP> <LGNNAM>PAY1</LGNNAM> <RETCOD>0</RETCOD> <ERRMSG></ERRMSG>
            </INFO>
            <NTRVLINFY>
                <CRTACC>101280075505120</CRTACC> <CRTBNK>招商银行</CRTBNK> <CRTCTY>东城区</CRTCTY> <CRTNAM>drgdfgd</CRTNAM> 
                <CRTPVC>北京市</CRTPVC> <CRTSQN>CMB0000018</CRTSQN> <LMTAMT>0.00</LMTAMT> <NTFCH1>23423@qq.com</NTFCH1> <NTFCH2>1233345435</NTFCH2>
            </NTRVLINFY>
            <NTRVLINFY>
                <CRTACC>751280001510001</CRTACC> <CRTBNK>招商银行</CRTBNK> <CRTCTY>深圳市</CRTCTY> <CRTNAM>集团公司乙深圳分公司 1</CRTNAM>
                <CRTPVC>广东省</CRTPVC> <CRTSQN>1</CRTSQN> <LMTAMT>0.00</LMTAMT>
            </NTRVLINFY>
            <NTQRYRVLZ> 
                <CHKSUM>00056EC9</CHKSUM> <OPRDAT>20081015</OPRDAT> <OPRLGN>N900000206</OPRLGN>
            </NTQRYRVLZ>
        </CMBSDKPGK>
        ';
        $response = (new GetRestrictedRecipientListResponse($responseXML));
        $this->assertEquals('NTQRYRVL', $response->getInfoFunctionName());
        $this->assertEquals('2', $response->getInfoDataType());
        $this->assertEquals('0', $response->getInfoReturnCode());
        $this->assertEquals('', $response->getInfoErrorMessage());
        $recipients = $response->getRecipientList();
        $operationInfo = $response->getOperationInfo();
        foreach ($recipients as $recipient) {
            $this->assertEquals('NTRVLINFY', $recipient->getTagName());
            $this->assertTrue($recipient->CRTSQN && $recipient->CRTACC && $recipient->CRTNAM && $recipient->CRTBNK);
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
        $request = new GetRestrictedRecipientListRequest(
            '银企直连网银互联1'
        );

        $client = MockedTestEnv::getHttpWebClient();
        $xml = $client->callForXML($request);
        $this->assertNotFalse($xml);

        $response = (new GetRestrictedRecipientListResponse($xml));
        $recipients = $response->getRecipientList();
        $this->assertIsArray($recipients);
        foreach ($recipients as $recipient) {
            $this->assertEquals('NTRVLINFY', $recipient->getTagName());
            $this->assertTrue($recipient->CRTSQN && $recipient->CRTACC && $recipient->CRTNAM && $recipient->CRTBNK);
        }
    }
}