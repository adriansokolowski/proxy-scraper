<?php
$curl = curl_init();

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0');
// curl_setopt($curl, CURLOPT_URL, https://www.my-proxy.com/free-proxy-list-1.html');

$proxies = array();
$start_count = 1;
$end_count = 10;

for ($i = $start_count; $i <= $end_count; $i++){
  curl_setopt($curl, CURLOPT_URL, https://www.my-proxy.com/free-proxy-list-$i.html');

  $result = curl_exec($curl);
  
  preg_match_all("!\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3}:\d{2,4}!", $result, $matches);
  
  $proxies = array_merge($proxies, $matches[0]);
}
curl_close($curl);
print_r($proxies);

?>
