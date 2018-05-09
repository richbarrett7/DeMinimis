<?PHP

namespace richbarrett\deminimis;

class deminimis {
  
  var $apikey;
  
  function __construct($apikey) {
    
    $this->apikey = $apikey;
    
  }
  
  function query($keyword) {
    
    $uri = 'https://api.trade.gov/v1/de_minimis/search?api_key='.$this->apikey.'&countries='.$keyword;
        
    $r =  $this->curl_get_data($uri);
    
    if($r['code'] != 200) {
      throw new \Exception('Trade.gov API did not return 200');
    }
    
    $r = json_decode($r['data']);
    return $r->results;
    
  }
  
  protected function curl_get_data($url) {

  	$ch = curl_init();
  	$timeout = 5;
  	curl_setopt($ch, CURLOPT_URL, $url);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    //curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
    
  	$data = curl_exec($ch);
  	$contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
  	$responseCode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

  	return [ 'data'=>$data,'type'=>$contentType,'code'=>$responseCode ];

  }
  
}

?>