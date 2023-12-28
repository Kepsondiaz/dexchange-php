<?php

declare(strict_types=1);

namespace Dexchange\Client\Endpoint;

use Dexchange\Client\DexchangeSdk;
use Dexchange\Client\HttpClient\Message\ResponseMediator;

final class ListServices 
{
    private DexchangeSdk $sdk;
    private string $baseUri;

    public function __construct(DexchangeSdk $sdk)
    {
        $this->sdk = $sdk;
        $this->baseUri = '/api-services/services';
    }

    public function getServices():array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->get($this->baseUri));
    }
}