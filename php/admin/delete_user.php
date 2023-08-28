<?php
    $sql = "DELETE FROM users WHERE unique_id='".$_GET['id']."' ";
	$sql2 = "DELETE FROM messages WHERE incoming_msg_id='".$_GET['id']."' OR outgoing_msg_id='".$_GET['id']."' ";
	include"../config.php";
	$conn->query($sql2);
    if ($conn->query($sql) === TRUE) {
       header("Location: index.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
    $conn->close();
?>