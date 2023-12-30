<?php
declare(strict_types=1);

namespace Dexchange\Client;

use Dexchange\Client\Endpoint\ListServices;
use Dexchange\Client\Endpoint\Transactions;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\HttpMethodsClientInterface;
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

    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->clientBuilder->getHttpClient();
    }

    public function Transactions(): Transactions
    {
        return new Endpoint\Transactions($this);
    }

    public function ListServices(): ListServices
    {
        return new Endpoint\ListServices($this);
    }
}