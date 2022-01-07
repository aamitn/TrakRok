<?php
//print_r($_SERVER);echo "<br>";
//print_r($_POST);echo "<br>";
print_r($_GET);echo "<br>";
echo "ID: "; echo $_GET['id']; echo "<br>";// output: 'value1'
echo "LATTITUDE: "; echo $_GET['lat']; echo "<br>";// output: 'value1'
echo "LONGITUDE: "; echo $_GET['lon']; echo "<br>";// output: 'value2'
echo "TIMESTAMP: "; echo $_GET['timestamp']; echo "<br>";// output: 'value1'
echo "HDOP: "; echo $_GET['hdop']; echo "<br>";// output: 'value1'
echo "SPEED: "; echo $_GET['speed']; echo "<br>";// output: 'value1'
echo "BEARING: "; echo $_GET['bearing']; echo "<br>";// output: 'value1'
echo "ALTITUDE: "; echo $_GET['altitude']; echo "<br>";// output: 'value1'
echo "ACCURACY: "; echo $_GET['accuracy']; echo "<br>";// output: 'value1'
echo "BATTERY: "; echo $_GET['batt']; echo "<br>";// output: 'value1'

$url = 'http://trak.rocks';
//$data = array('id' => 'WB01AT1956', 'lat' => $_GET['lat'], 'lon' => '8', 'timestamp' => '1234','hdop' => '1', 'speed' => '0', 'bearing' => '0', 'altitude' => '32', 'accuracy' => '2', 'batt' => '32');
$data = array('id' => 'WB01AT1956', 'lat' => $_GET['lat'], 'lon' => $_GET['lon'],'hdop' => '1', 'timestamp' => time(),'speed' => $_GET['speed'], 'bearing' => $_GET['bearing'], 'altitude' => $_GET['altitude'], 'accuracy' => $_GET['accuracy'], 'batt' => $_GET['batt']);


// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

var_dump($result);


//print_r($_FILES);echo "<br>";
?>