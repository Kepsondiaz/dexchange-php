# Dexchange PHP SDK
A PHP sdk to interact with Dexchange's API

## Installation  

### With Composer

`not define yet`

## REQUIREMENTS
- PHP 8.0+

## Usage
### Authentication
Generate an API KEY from the <a href="https://docs-api.dexchange.sn/introduction" target="_blank">Dexchange Api</a>  

### Setup

```php
<?php
include "vendor/autoload.php";

use Dexchange\Client\Options;
use Dexchange\Client\DexchangeSdk;

$env = 'production';
$apikey = 'sk.8fcdc.a23474b7d2612534df';

$options = new Options($env);
$DexchangeSdk = new DexchangeSdk($apikey, $options);
```

### Example

```php
    $initTransaction = $DexchangeSdk->Transactions()->intiTransaction(123, 'callBackUrl', 'externalTransactionId', 'failureUrl', 'number', 'serviceCode', 'successUrl');
``` 

## Contributing

Bug reports and pull requests are welcome on GitHub at [https://github.com/Kepsondiaz/dexchange-php](https://github.com/Kepsondiaz/dexchange-php). This project is intended to be a safe, welcoming space for collaboration, and contributors are expected to adhere to the code of conduct. Simply create a new branch and raise a Pull Request, we would review and merge.

## License