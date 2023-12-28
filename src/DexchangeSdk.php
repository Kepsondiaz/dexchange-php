<?php
declare(strict_types=1);

namespace Dexchange\Client;

use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;

class DexchangeSdk 
{
    private ClientBuilder $clientBuilder;

    public function __construct(string $apikey, Options $options = null)
    {
        $options = $options ?? new Options();

        $this->clientBuilder = $options->getClientBuilder();
        $this->clientBuilder->addPlugin(new BaseUriPlugin($options->getUri()));
        $this->clientBuilder->addPlugin(
            new HeaderDefaultsPlugin(
                [
                    'Authorization' => 'Bearer '.$apikey,
                    'Content-Type' => 'application/json'
                ]
            )
        );
    }
}