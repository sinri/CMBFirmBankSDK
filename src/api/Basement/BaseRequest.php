<?php


namespace leqee\CMBFirmBankSDK\api\Basement;


use Exception;
use leqee\CMBFirmBankSDK\XmlBuilder\DocumentWorker;
use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

abstract class BaseRequest
{
    /**
     * @var string 函数名 C(1, 20)
     */
    protected $infoFunctionName;
    /**
     * @var string 登陆用户名 Z(1,20) 前置机模式必填
     */
    protected $infoLoginName;
    /**
     * @var int 数据格式 N(1) 2:xml 格式三
     */
    protected $infoDataType=2;
    /**
     * @var array
     */
    protected $infoExtraData=[];
    /**
     * @var RequestComponent[]
     */
    protected $components;

    /**
     * @return array
     */
    public function getInfoExtraData(): array
    {
        return $this->infoExtraData;
    }

    /**
     * @return RequestComponent[]
     */
    public function getComponents(): array
    {
        return $this->components;
    }

    public function __construct($loginName,$functionName,$extraData=[]){
        $this->infoLoginName=$loginName;
        $this->infoFunctionName=$functionName;
        $this->infoExtraData=$extraData;
    }

    /**
     * @return string
     */
    public function getInfoFunctionName(): string
    {
        return $this->infoFunctionName;
    }

    /**
     * @param string $infoFunctionName
     * @return BaseRequest
     */
    public function setInfoFunctionName(string $infoFunctionName): BaseRequest
    {
        $this->infoFunctionName = $infoFunctionName;
        return $this;
    }

    /**
     * @return string
     */
    public function getInfoLoginName(): string
    {
        return $this->infoLoginName;
    }

    /**
     * @param string $infoLoginName
     * @return BaseRequest
     */
    public function setInfoLoginName(string $infoLoginName): BaseRequest
    {
        $this->infoLoginName = $infoLoginName;
        return $this;
    }

    /**
     * @return int
     */
    public function getInfoDataType(): int
    {
        return $this->infoDataType;
    }

    /**
     * @param int $infoDataType
     * @return BaseRequest
     */
    public function setInfoDataType(int $infoDataType): BaseRequest
    {
        $this->infoDataType = $infoDataType;
        return $this;
    }

    /**
     * @param RequestComponent $component
     * @return $this
     */
    public function appendComponent(RequestComponent $component)
    {
        $this->components[] = $component;
        return $this;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function generateXML(){
        $worker = new DocumentWorker();
        $worker->setInfoComponent($this->infoLoginName,$this->infoFunctionName,$this->infoDataType,$this->infoExtraData);
        foreach ($this->components as $component) {
            $worker->appendComponent($component);
        }
        return $worker->getDocument()->toXML();
        //return (new ArkXMLWriter())->composeDocumentAndFlush($worker->getDocument());
    }

    public function send(ApiCaller $apiCaller){
        return $apiCaller->callForXML($this);
    }
}