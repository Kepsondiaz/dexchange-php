<?php

namespace Dexchange\Client\tests\Transactions;

use Mockery;
use Dexchange\Client\Options;
use Dexchange\Client\DexchangeSdk;

it('should get transaction', function() {
    $options = new Options('production');
    $apikey = '8fcdca23474b7d2612534df';
    $dexchangeSdk = new DexchangeSdk($apikey, $options);

    $dexchangeSdkMock = Mockery::mock('Transactions', ['dexchangeSdk' => $dexchangeSdk]);

    $dexchangeSdkMock->shouldReceive('getBalance')
    ->with()
    ->andReturn(['balance' => [123, 'currency', 'lastUpdate', 'success'], "message" => "get balance", "statusCode" => "200"]);

    $result =  $dexchangeSdkMock->getBalance();

    expect($result)->toBe(['balance' => [123, 'currency', 'lastUpdate', 'success'], "message" => "get balance", "statusCode" => "200"]);
}); 