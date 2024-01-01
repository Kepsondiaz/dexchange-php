<?php

namespace Dexchange\Client\tests\Transactions;

use Mockery;
use Dexchange\Client\Options;
use Dexchange\Client\DexchangeSdk;

it('should initialise new transaction', function() {
    $options = new Options('production');
    $apikey = '8fcdca23474b7d2612534df';
    $dexchangeSdk = new DexchangeSdk($apikey, $options);

    $dexchangeSdkMock = Mockery::mock('Transactions', ['dexchangeSdk' => $dexchangeSdk]);

    $dexchangeSdkMock->shouldReceive('initTransaction')
    ->with(123, 'callBackURL', 'externalTransactionId', 'failureUrl', '20231228', 'serviceCode', 'successUrl')
    ->andReturn(['data' => [123, 'callBackURL', 'cashout_url', 'externalTransactionId', 'failureUrl', 'number', 'status', true, 'successUrl', 123, 'transactionId', 'transactionType', 'webhook'], "message" => "transaction initialise", "statusCode" => "200"]);

    $result =  $dexchangeSdkMock->initTransaction(123, 'callBackURL', 'externalTransactionId', 'failureUrl', '20231228', 'serviceCode', 'successUrl');

    expect($result)->toBe(['data' => [123, 'callBackURL', 'cashout_url', 'externalTransactionId', 'failureUrl', 'number', 'status', true, 'successUrl', 123, 'transactionId', 'transactionType', 'webhook'], "message" => "transaction initialise", "statusCode" => "200"]);


});