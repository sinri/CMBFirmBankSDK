<?php


namespace leqee\CMBFirmBankSDK\api\Basement;


use Exception;
use leqee\CMBFirmBankSDK\api\Basement\definition\ReturnCodeDefinition;
use sinri\ark\xml\entity\ArkXMLElement;
use sinri\ark\xml\reader\ArkXMLReader;

abstract class BaseResponse
{
    /**
     * @var string C(1,20)
     */
    protected $infoFunctionName;
    /**
     * @var string N(1) 2 for XML Format III
     */
    protected $infoDataType;
    /**
     * @var int N `ReturnCodeDefinition::RETURN_CODE_*`
     */
    protected $infoReturnCode;
    /**
     * @var string Z(1,256)
     */
    protected $infoErrorMessage;
    /**
     * @var array
     */
    protected $infoExtraData = [];

    /**
     * BaseResponse constructor.
     * @param string $xml
     * @throws Exception when given XML is not available
     */
    public function __construct(string $xml)
    {
        $rootElement = ArkXMLReader::simplyParseXMLToElement($xml);
        if ($rootElement === false) {
            throw new Exception("Invalid XML received for response: " . $xml);
        }

        $components = $rootElement->getAllSubElements();
        foreach ($components as $component) {
            if ($component->getElementTag() === 'INFO') {
                $this->loadInfoComponent($component);
            } else {
                $this->loadOtherComponent($component);
            }
        }
    }

    /**
     * @param ArkXMLElement $component
     */
    protected function loadInfoComponent($component)
    {
        $elements = $component->getAllSubElements();
        foreach ($elements as $propertyNode) {
            switch ($propertyNode->getElementTag()) {
                case 'FUNNAM':
                    $this->infoFunctionName = $propertyNode->getTextContent();
                    break;
                case 'DATTYP':
                    $this->infoDataType = $propertyNode->getTextContent();
                    break;
                case 'RETCOD':
                    $this->infoReturnCode = $propertyNode->getTextContent();
                    break;
                case 'ERRMSG':
                    $this->infoErrorMessage = $propertyNode->getTextContent();
                    break;
                default:
                    $this->infoExtraData[$propertyNode->getElementTag()] = $propertyNode->getTextContent();
                    break;
            }
        }
    }

    /**
     * @param ArkXMLElement $component
     * @return void
     */
    abstract protected function loadOtherComponent(ArkXMLElement $component);

    /**
     * @return string
     */
    public function getInfoFunctionName(): string
    {
        return $this->infoFunctionName;
    }

    /**
     * @return string
     */
    public function getInfoDataType(): string
    {
        return $this->infoDataType;
    }

    /**
     * @return array
     */
    public function getInfoExtraData(): array
    {
        return $this->infoExtraData;
    }

    /**
     * @throws Exception
     */
    public function assertCorrectResponse()
    {
        if ($this->getInfoReturnCode() !== ReturnCodeDefinition::RETURN_CODE_SUCCESS) {
            throw new Exception($this->getInfoErrorMessage(), $this->getInfoReturnCode());
        }
    }

    /**
     * @return int
     */
    public function getInfoReturnCode(): int
    {
        return $this->infoReturnCode;
    }

    /**
     * @return string
     */
    public function getInfoErrorMessage(): string
    {
        return $this->infoErrorMessage;
    }
}