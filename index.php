<?php 

require 'vendor/autoload.php';
use Carbon\Carbon;

#date_default_timezone_set('Asia/jakarta');

# $date = Carbon::createFromDate(2020, 2, 29);
# $date = Carbon::now();
# $date = Carbon::createFromDate(1945, 8, 17);

# printf("Tanggal berapakah sekarang? %s\n", $date->diffForHumans());
# printf("Tanggal berapakah sekarang? %s\n", $date);
# printf("Tanggal berapakah indonesia merdeka? %s\n", $date->diffForHumans());


$api = new RestClient([
	'base_url' => "https://ibnux.github.io/BMKG-importer",
	'format' => "json"
]);
$result = $api->get("cuaca/501320");
# echo "<pre>";
# print_r($result->decode_response());
$data = $result->decode_response();
# printf("Cuaca kota singkawang tanggal %s, adalah %s dengan suhu %s derajat celcius", $data[0]->jamCuaca, $data[0]->cuaca, $data[0]->tempC );

foreach((array) $data as $item) {
    $date = Carbon::createFromFormat('Y-m-d H:i:s', @$item->jamCuaca);
	printf("Cuaca kota singkawang hari %s tanggal %s jam %s adalah %s dengan suhu %s derajat celcius. \n",
           @$date->format('1'), @$date->format ('d M Y'),
           @$date->format('H:i'), $item->cuaca, $item->tempC);
}

