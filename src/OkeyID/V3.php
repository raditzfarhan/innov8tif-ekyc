<?php

namespace RaditzFarhan\Innov8tifEkyc\OkeyID;

use RaditzFarhan\Innov8tifEkyc\Config;
use RaditzFarhan\Innov8tifEkyc\Helper;
use RaditzFarhan\Innov8tifEkyc\RestClient;

class V3 extends RestClient
{
    private string $version = 'v3';

    private string $apiKey;

    private Config $config;

    private Helper $helper;

    private string $base_uri;

    public function __construct(string $apiKey)
    {
        $this->config = new Config([]);

        $this->apiKey = $apiKey;

        $this->helper = new Helper;

        $this->base_uri = $this->config->get('okeyid.base_uri');
    }

    public function ocr(string $base64ImageString, $backImage = null, string $docTypeEnabled = 'true', string $faceImageEnabled = 'true', string $imageEnabled = 'true', string $imageFormat = 'true')
    {
        extract(get_object_vars($this));

        return $this->method('POST')
            ->endPoint($this->getUrl(__FUNCTION__))
            ->payload(compact('apiKey', 'docTypeEnabled', 'faceImageEnabled', 'imageEnabled', 'imageFormat', 'backImage', 'base64ImageString'))
            ->execute();
    }

    private function getUrl($name)
    {
        $config = $this->config->get('okeyid.' . $this->helper->snakeCase($name));

        return $this->base_uri . '/' . $this->version . $config['route'];
    }
}
