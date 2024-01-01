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

    $dexchangeSdkMock->shouldReceive('getTransaction')
    ->with('transactionId')
    ->andReturn(['data' => [123, '2023-11-07T05:31:56Z', '2023-11-07T05:31:56Z', 'Number', 'ServiceCode', 'ServiceName', 'status'], "message" => "get transaction", "statusCode" => "200"]);

    $result =  $dexchangeSdkMock->getTransaction('transactionId');

    expect($result)->toBe(['data' => [123, '2023-11-07T05:31:56Z', '2023-11-07T05:31:56Z', 'Number', 'ServiceCode', 'ServiceName', 'status'], "message" => "get transaction", "statusCode" => "200"]);

});