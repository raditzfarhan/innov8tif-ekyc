<?php

namespace RaditzFarhan\Innov8tifEkyc\OkeyDoc\PH;

use RaditzFarhan\Innov8tifEkyc\Config;
use RaditzFarhan\Innov8tifEkyc\Helper;
use RaditzFarhan\Innov8tifEkyc\RestClient;

class V1 extends RestClient
{
    private string $version = 'v1';

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

    public function voterId(string $idImageBase64Image, mixed $caseNo = null)
    {
        extract(get_object_vars($this));

        return $this->method('POST')
            ->endPoint($this->getUrl(__FUNCTION__))
            ->payload(compact('apiKey', 'idImageBase64Image', 'caseNo'))
            ->execute();
    }

    private function getUrl($name)
    {
        $config = $this->config->get('okeydoc.ph.' . $this->helper->snakeCase($name));

        return $this->base_uri . '/' . $this->version . $config['route'];
    }
}
