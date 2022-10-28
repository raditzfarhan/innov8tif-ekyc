<?php

namespace RaditzFarhan\Innov8tifEkyc\OkeyDoc\PH;

use RaditzFarhan\Innov8tifEkyc\Config;
use RaditzFarhan\Innov8tifEkyc\Helper;
use RaditzFarhan\Innov8tifEkyc\RestClient;

class V2 extends RestClient
{
    private string $version = 'v2';

    private string $apiKey;

    private Config $config;

    private Helper $helper;

    private string $base_uri;

    public function __construct(string $apiKey)
    {
        $this->config = new Config([]);

        $this->apiKey = $apiKey;

        $this->helper = new Helper;

        $this->base_uri = $this->config->get('okeydoc.base_uri');
    }

    public function drivingLicense(string $idImageBase64Image, mixed $caseNo = null)
    {
        extract(get_object_vars($this));

        return $this->method('POST')
            ->endPoint($this->getUrl(__FUNCTION__))
            ->payload(compact('apiKey', 'idImageBase64Image', 'caseNo'))
            ->execute();
    }

    public function sss(string $idImageBase64Image, mixed $caseNo = null)
    {
        extract(get_object_vars($this));

        return $this->method('POST')
            ->endPoint($this->getUrl(__FUNCTION__))
            ->payload(compact('apiKey', 'idImageBase64Image', 'caseNo'))
            ->execute();
    }

    public function umid(string $idImageBase64Image, mixed $caseNo = null)
    {
        extract(get_object_vars($this));

        return $this->method('POST')
            ->endPoint($this->getUrl(__FUNCTION__))
            ->payload(compact('apiKey', 'idImageBase64Image', 'caseNo'))
            ->execute();
    }

    public function postalId(string $idImageBase64Image, mixed $caseNo = null)
    {
        extract(get_object_vars($this));

        return $this->method('POST')
            ->endPoint($this->getUrl(__FUNCTION__))
            ->payload(compact('apiKey', 'idImageBase64Image', 'caseNo'))
            ->execute();
    }

    public function prcProfessionalIdCard(string $idImageBase64Image, mixed $caseNo = null)
    {
        extract(get_object_vars($this));

        return $this->method('POST')
            ->endPoint($this->getUrl(__FUNCTION__))
            ->payload(compact('apiKey', 'idImageBase64Image', 'caseNo'))
            ->execute();
    }

    public function nationalId(string $idImageBase64Image)
    {
        extract(get_object_vars($this));

        return $this->method('POST')
            ->endPoint($this->getUrl(__FUNCTION__))
            ->payload(compact('apiKey', 'idImageBase64Image'))
            ->execute();
    }

    private function getUrl($name)
    {
        $config = $this->config->get('okeydoc.ph.' . $this->helper->snakeCase($name));

        return $this->base_uri . '/' . $this->version . $config['route'];
    }
}
