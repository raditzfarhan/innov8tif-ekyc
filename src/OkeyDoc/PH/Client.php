<?php

namespace RaditzFarhan\Innov8tifEkyc\OkeyDoc\PH;

use RaditzFarhan\Innov8tifEkyc\Config;
use RaditzFarhan\Innov8tifEkyc\Helper;

class Client
{
    public string $apiKey;

    private Config $config;

    private Helper $helper;

    private string $version;

    private $client;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->config = new Config([]);
        $this->helper = new Helper;
    }

    public function __call($name, $arguments)
    {
        $config = $this->config->get('okeydoc.ph.' . $this->helper->snakeCase($name));
        $latestVersion =  $config['latest_version'];

        $class = "\RaditzFarhan\Innov8tifEkyc\OkeyDoc\PH\\" . strtoupper($latestVersion);

        $client = new $class($this->apiKey);

        return $client->$name(...$arguments);
    }
}
