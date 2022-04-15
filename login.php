<!-- *** Update the HTML with the final front end product *** 

The below HTML is for testing the PHP interface.   -->
<html>
<body>

<html>
   <body>
      <form action = "<?php $_PHP_SELF ?>" method = "GET">
         Username: <input type = "text" name = "username" />
         Password: <input type = "text" name = "password" />
         <input type = "submit" />
      </form>    
   </body>
</html>

</body>
</html>

<?php
// Change these two the local database settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_service";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection Failed: ");
}
$sql = "SELECT f_name FROM `user` WHERE ssn =? and user_password =?";
$stmt = $conn->prepare($sql);
$stmt -> bind_param("ss", $username, $password);

// Change the variables to the element names on the front end
if ($_GET["username"] && $_GET["password"]) {
    $username = $_GET['username'];
    $password = $_GET['password'];

}

$stmt->execute();
$result = $stmt->get_result();
if($result) {
    while($row = $result->fetch_assoc()) {
        printf("Logged in as: %s\n", $row["f_name"] );
    }
}

$stmt->close();
$conn->close();
?>