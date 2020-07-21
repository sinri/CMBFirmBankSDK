<?php


namespace leqee\CMBFirmBankSDK\client;


use Exception;
use leqee\CMBFirmBankSDK\api\Basement\ApiCaller;
use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use sinri\ark\core\ArkLogger;
use sinri\ark\io\curl\ArkCurl;

class HttpWebClient extends ApiCaller
{
    /**
     * @var ArkLogger
     */
    protected $logger;

    /**
     * @var string
     * URL for Http Web Protocol, by default `http://localhost:8080`
     */
    protected $apiUrl;

    public function __construct(string $apiUrl, ArkLogger $logger = null)
    {
        $this->apiUrl = $apiUrl;
        $this->logger = $logger;
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * @param string $apiUrl
     * @return HttpWebClient
     */
    public function setApiUrl(string $apiUrl): HttpWebClient
    {
        $this->apiUrl = $apiUrl;
        return $this;
    }

    /**
     * @return ArkLogger
     */
    public function getLogger(): ArkLogger
    {
        return $this->logger;
    }

    /**
     * @param ArkLogger $logger
     * @return HttpWebClient
     */
    public function setLogger(ArkLogger $logger): HttpWebClient
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * @param BaseRequest $request
     * @return bool|string Response XML, or FALSE
     * @throws Exception when XML cannot be generated, or cURL failed
     */
    public function callForXML(BaseRequest $request)
    {
        return $this->sendForXML($request->generateXML());
    }

    /**
     * @param string $requestXML
     * @return bool|string Response XML, or FALSE
     * @throws Exception when XML cannot be generated, or cURL failed
     */
    public function sendForXML(string $requestXML)
    {
        $curl = new ArkCurl($this->logger);
        $result = $curl->prepareToRequestURL('POST', $this->apiUrl)
            ->setPostFormField('REQDATA', $requestXML)
            ->execute();
        if ($result === false) {
            throw new Exception($curl->getErrorMessage(), $curl->getErrorNo());
        }
        return $result;
    }
}