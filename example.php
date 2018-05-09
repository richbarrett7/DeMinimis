<?PHP

include_once('vendor/autoload.php');

$key = '';

$dm = new \richbarrett\deminimis\deminimis($key);

$r = $dm->query('GB');

print_r($r);exit;

print_r($r);exit;


?>