<?php

namespace RaditzFarhan\Innov8tifEkyc;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7;
use RaditzFarhan\Innov8tifEkyc\Exceptions\ApiException;
use RaditzFarhan\Innov8tifEkyc\Exceptions\ApiError;

class RestClient
{
    public array $payload = [];

    public string $method;

    public string $end_point;


    public function execute()
    {
        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->request($this->method, $this->end_point, ['json' => $this->payload]);
            // dd($response->getStatusCode(), json_decode($response->getBody()->getContents(), true));

            if ($response->getStatusCode() === 200) {
                $content = json_decode($response->getBody()->getContents(), true);

                if (isset($content['status']) && $content['status'] === 'error') {
                    throw new ApiError($content);
                }

                return $content;
            } else {
                throw new ApiException($response->getBody()->getContents());
            }
        } catch (ClientException $e) {
            // echo Psr7\Message::toString($e->getRequest());
            // echo Psr7\Message::toString($e->getResponse());
            throw new ApiException(Psr7\Message::toString($e->getResponse()));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function endPoint(string $end_point): self
    {
        $this->end_point = $end_point;

        return $this;
    }

    public function payload(array $payload): self
    {
        $this->payload = $payload;

        return $this;
    }

    public function method(string $method): self
    {
        $this->method = $method;

        return $this;
    }
}
