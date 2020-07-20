<?php


namespace leqee\CMBFirmBankSDK\XmlBuilder;


use sinri\ark\xml\entity\ArkXMLElement;

class ResponseComponent extends BaseComponent
{
    public function __construct(ArkXMLElement $element)
    {
        $this->loadByElementTypeA($element);
    }

    /**
     * Load by Element, Type A, i.e.
     * An element with i properties, `<ROOT><Pi>Vi</Pi></ROOT>`
     * Designed to be used in method `__construct`
     * @param ArkXMLElement $component
     */
    protected function loadByElementTypeA(ArkXMLElement $component)
    {
        $subElements=$component->getAllSubElements();
        foreach ($subElements as $element){
            $tag=$element->getElementTag();
            $this->properties[$tag]=$element->getTextContent();
        }
    }
}