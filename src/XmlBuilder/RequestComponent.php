<?php


namespace leqee\CMBFirmBankSDK\XmlBuilder;


abstract class RequestComponent extends BaseComponent
{
    abstract public function getTagName():string;
}