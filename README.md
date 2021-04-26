# wbiztool-php

## Send message

```php
require_once("vendor/autoload.php");

$tool = new WBizTool($api_key, $client_id, $whatsapp_client);
$resp=$tool->sendText($country_code,$phone,$msg);
```

## Get history

```php
require_once("vendor/autoload.php");

$tool = new WBizTool($api_key, $client_id, $whatsapp_client);
$resp=$tool->getHistory(CarbonPeriod::between("2021-04-26", "2021-05-26"));

```

