# wbiztool-php

## Send message

```php
require_once("vendor/autoload.php");

$tool = new WBizTool($api_key, $client_id, $whatsapp_client);
$resp=$tool->sendText($country_code,$phone,$msg);
```

