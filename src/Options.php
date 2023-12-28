<?php

declare(strict_types=1);

namespace Dexchange\Client;

use Psr\Http\Message\UriInterface;
use Dexchange\Client\ClientBuilder;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Message\UriFactoryInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class Options
{
    private array $options;
    public string $env;

    public function __construct(string $env = 'production', array $options = [])
    {
        $this->env = $env;
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($options);
    }

    private function configureOptions(OptionsResolver $resolver): void
    {
        $uris = [
            'production' => 'https://api-m.dexchange.sn/api/v1',
        ];
        $resolver->setDefaults(
            [
                'client_builder' => new ClientBuilder(),
                'uri_factory' => Psr17FactoryDiscovery::findUriFactory(),
                'uri' => $uris[$this->env],
            ]
        );
        
        $resolver->setAllowedTypes('uri', 'string');
        $resolver->setAllowedTypes('client_builder', ClientBuilder::class);
        $resolver->setAllowedTypes('uri_factory', UriFactoryInterface::class);
    }

    public function getClientBuilder(): ClientBuilder
    {
        return $this->options['client_builder'];
    }

    public function getUriFactory(): UriFactoryInterface
    {
        return $this->options['uri_factory'];
    }

    public function getUri(): UriInterface
    {
        return $this->getUriFactory()->createUri($this->options['uri']);
    }
}