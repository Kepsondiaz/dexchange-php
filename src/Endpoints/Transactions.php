<?php

declare(strict_types=1);

namespace Dexchange\Client\Endpoint;

use Dexchange\Client\DexchangeSdk;
use Dexchange\Client\HttpClient\Message\ResponseMediator;

final class Transactions
{
    private DexchangeSdk $sdk;
    private string $baseUri;

    public function __construct(DexchangeSdk $sdk)
    {
        $this->sdk = $sdk;
        $this->baseUri = '/transaction';
    }

    public function initTransaction(int $amount, string $callBackUrl, string $externalTransactionId, string $failureUrl, string $number, string $serviceCode, string $successUrl): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/init", [], json_encode('amount', 'callBackUrl', 'externalTransactionId', 'failureUrl', 'number', 'serviceCode', 'successUrl')));
    }

    public function getTransaction(string $transactionId): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->get("$this->baseUri?transactionId=$transactionId"));
    }

    public function getBalance(): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->get("https://api-m.dexchange.sn/api/v1/api-services/balance"));
    }

    public function wizallWithdraw(string $otp, string $transactionId): array
    {
        return ResponseMediator::getContent($this->sdk->getHttpClient()->post("$this->baseUri/confirm/wizall ", [], json_encode('otp', 'transactionId')));
    }

    
}