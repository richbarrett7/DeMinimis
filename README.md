# De Minimis

"De Minimis" is the threshold for a product’s value below which no duty or tariff is charged.

Furthermore, products below the De Minimis undergo minimal clearance procedures, such as customs and paperwork requirements. 

Similarly, the value of the exported products must exceed the VAT amount before it is subject to VAT.


## API Key

Get your API key by signing up here: https://api.trade.gov/users/sign_up


## Usage

```php

include_once('vendor/autoload.php');

$key = 'YOUR_API_KEY';

$dm = new \richbarrett\deminimis\deminimis($key);

$r = $dm->query('GB');

print_r($r);

```

Will output something like this:

```


Array
(
    [0] => stdClass Object
        (
            [id] => d9400e164ba6e83a59dd175445facffc073725dc
            [country_name] => United Kingdom
            [country] => GB
            [de_minimis_value] => 150
            [de_minimis_currency] => EUR
            [vat_amount] => 15
            [vat_currency] => GBP
            [notes] => 
        )

)

```