<?php


namespace leqee\CMBFirmBankSDK\XmlBuilder;


use sinri\ark\xml\entity\ArkXMLDocument;
use sinri\ark\xml\entity\ArkXMLElement;

class DocumentWorker
{
    /**
     * @var ArkXMLDocument
     */
    protected ArkXMLDocument $document;
    /**
     * @var ArkXMLElement
     */
    protected ArkXMLElement $rootElement;

    public function __construct($encoding = ArkXMLDocument::ENCODING_GBK, $version = '1.0')
    {
        $this->document = new ArkXMLDocument();
        $this->document->setVersion($version)
            ->setEncoding($encoding);

        $this->rootElement = new ArkXMLElement("CMBSDKPGK");
        $this->document->setRootElement($this->rootElement);
    }

    /**
     * @return ArkXMLDocument
     */
    public function getDocument(): ArkXMLDocument
    {
        return $this->document;
    }

    /**
     * @return ArkXMLElement
     */
    public function getRootElement(): ArkXMLElement
    {
        return $this->rootElement;
    }

    public function setInfoComponent($loginName, $functionName, $dataType = 2, $extra = [])
    {
        $infoElement = (new ArkXMLElement("INFO"))
            ->appendSubElement(
                (new ArkXMLElement("FUNNAM"))->appendText($functionName)
            )
            ->appendSubElement(
                (new ArkXMLElement("DATTYP"))->appendText($dataType)
            )
            ->appendSubElement(
                (new ArkXMLElement("LGNNAM"))->appendText($loginName)
            );
        if (is_array($extra) && !empty($extra)) {
            foreach ($extra as $key => $value) {
                $infoElement->appendSubElement(
                    (new ArkXMLElement($key))->appendText($value)
                );
            }
        }
        $this->rootElement->appendSubElement($infoElement);
        return $this;
    }

    /**
     * @param RequestComponent $component
     */
    public function appendComponent(RequestComponent $component)
    {
        $this->rootElement->appendSubElement($component->toXMLElement());
    }


}