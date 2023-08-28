 <?php
    include "../config.php";
    $ud_id = (int)$_POST["id"];
    $email = $_POST["email"];
    $name = $_POST["name"];
    $access = $_POST["access"];
	$status = $_POST["status"];
    $phone = $_POST["phone"];
	
    $query="UPDATE users
            SET email = '$email', name = '$name', phone = '$phone' , access = '$access', status = '$status'
            WHERE unique_id='$ud_id'";
if ($conn->query($query) === TRUE) {
       header("Location: index.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
    $conn->close();
?>