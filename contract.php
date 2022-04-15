<?php
// Change these two the local database settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_service";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection Failed: ");//, $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO `agency` (contract_id, total_price, start_date, end_date, agent_id, c_id) VALUES (?, ?, ?, ?, ?, ?)");
$stmt -> bind_param("isss", $contract_id, $total_price, $start_date, $end_date, $agent_id, $c_id);

// Change the variables to the element names on the front end
if ($_GET["contract_id"] && $_GET["total_price"] && $_GET["start_date"] && $_GET["end_date"]
	&& $_GET["agent_id"] && $_GET["c_id"]) {
    $contract_id = $_GET['contract_id'];
    $total_price = $_GET['total_price'];
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];
    $agent_id= $_GET['agent_id'];
    $c_id = $_GET['c_id'];
}


$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>