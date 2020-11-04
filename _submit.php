<?php

include("config.php");

header("Content-Type: text/json");

$results = json_decode(file_get_contents("resources/json/results.json"));

$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


if (!$db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

if(isset($_GET['vote'])) {
    $result = intval($_GET['vote']);

    if($result >= 0 && $result <= 3) {
        $time - time();
        $db -> query("INSERT INTO `poll` SET `value`='{$result}', `timestamp`='{$time}'");
    }

}

$query = $db -> query("SELECT COUNT(*) as total, SUM(`value`='0') as diesel, SUM(`value`='1') as petrol, SUM(`value`='2') as hybrid, SUM(`value`='3') as electric FROM `poll` WHERE 1");
$row = $query -> fetch_object();

if($row -> total == 0) {
    $row -> total = 4;
    $row -> diesel = $row -> petrol = $row -> hybrid = $row -> electric = 1;
}

$results -> all -> diesel = $row -> diesel / $row -> total;
$results -> all -> petrol = $row -> petrol / $row -> total;
$results -> all -> hybrid = $row -> hybrid / $row -> total;
$results -> all -> electric = $row -> electric / $row -> total;

$json = json_encode($results);
echo $json;

exit();

?>
