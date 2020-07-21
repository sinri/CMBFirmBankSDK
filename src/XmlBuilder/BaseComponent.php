<?php


namespace leqee\CMBFirmBankSDK\XmlBuilder;


use sinri\ark\xml\entity\ArkXMLElement;

abstract class BaseComponent
{
    /**
     * @var string
     * It should be initialized in __construct method
     */
//    protected $tagName;
    /**
     * @var array
     */
    protected $properties;

    public function __isset($name)
    {
        return isset($this->properties[$name]);
    }

    public function __get($name)
    {
        return $this->properties[$name];
    }

    public function __set($name, $value)
    {
        $this->properties[$name]=$value;
    }

    public function toXMLElement(){
        $element = new ArkXMLElement($this->getTagName());
        foreach ($this->properties as $k => $v) {
//            var_dump($k);
//            var_dump($v);
            $element->appendSubElement(
                (new ArkXMLElement($k))->appendText($v)
            );
        }
        return $element;
    }

    abstract public function getTagName(): string;

//    /**
//     * @return string
//     */
//    public function getTagName()
//    {
//        return $this->tagName;
//    }
//
//    /**
//     * @param string $tagName
//     * @return BaseComponent
//     */
//    public function setTagName(string $tagName)
//    {
//        $this->tagName = $tagName;
//        return $this;
//    }

}