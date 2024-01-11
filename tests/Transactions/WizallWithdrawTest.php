<?php

namespace Dexchange\Client\tests\Transactions;

use Mockery;
use Dexchange\Client\Options;
use Dexchange\Client\DexchangeSdk;

it('should initialise wizall withdrawal', function() {
    $options = new Options('production');
    $apikey = '8fcdca23474b7d2612534df';
    $dexchangeSdk = new DexchangeSdk($apikey, $options);

    $dexchangeSdkMock = Mockery::mock('Transactions', ['dexchangeSdk' => $dexchangeSdk]);

    $dexchangeSdkMock->shouldReceive('wizallWithdraw')
        ->with('123', 'transactionId')
        ->andReturn(['data' => [123, 'externalTransactionId', 'fee',  'status', true], "message" => "Wizall withdraw", "statusCode" => "200"]);

    $result =  $dexchangeSdkMock->wizallWithdraw('123', 'transactionId');

    expect($result)->toBe(['data' => [123, 'externalTransactionId', 'fee',  'status', true], "message" => "Wizall withdraw", "statusCode" => "200"]);


});