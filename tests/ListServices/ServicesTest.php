<?php

namespace Dexchange\Client\tests\Transactions;

use Mockery;
use Dexchange\Client\Options;
use Dexchange\Client\DexchangeSdk;

it('should get services', function() {
    $options = new Options('production');
    $apikey = '8fcdca23474b7d2612534df';
    $dexchangeSdk = new DexchangeSdk($apikey, $options);

    $dexchangeSdkMock = Mockery::mock('Transactions', ['dexchangeSdk' => $dexchangeSdk]);

    $dexchangeSdkMock->shouldReceive('getServices')
    ->with()
    ->andReturn(['data' => ['country', 'serviceId', 'serviceName', 'serviceType'], "message" => "get transaction", "statusCode" => "200"]);

    $result =  $dexchangeSdkMock->getServices();

    expect($result)->toBe(['data' => ['country', 'serviceId', 'serviceName', 'serviceType'], "message" => "get transaction", "statusCode" => "200"]);

}); 