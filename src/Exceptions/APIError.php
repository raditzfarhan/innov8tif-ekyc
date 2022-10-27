<?php

namespace RaditzFarhan\Innov8tifEkyc\Exceptions;

use \Exception;

class APIError extends Exception
{
    protected array $responseData;

    protected string $status;

    protected string $messageCode;

    protected $metaData = null;


    public function __construct(array $responseData = [], $message = null, int $code = 0, Exception $previous = null)
    {
        $this->responseData = $responseData;
        $this->status = $this->extractData($this->responseData, 'status') ?? 'failed';
        $this->messageCode = $this->extractData($this->responseData, 'messageCode');
        $message = $this->extractData($this->responseData, 'message') ?? $message;

        unset($responseData['status'], $responseData['messageCode'], $responseData['message']);

        if (is_array($responseData) && count($responseData) > 0) {
            $this->metaData = $responseData;
        }

        parent::__construct($message, $code, $previous);
    }

    public function getResponseData()
    {
        return $this->responseData;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getMessageCode()
    {
        return $this->messageCode;
    }

    public function getMetaData()
    {
        return $this->metaData;
    }

    private function extractData(array $responseData, string $name)
    {
        return isset($responseData[$name]) ? $responseData[$name] : null;
    }
}
