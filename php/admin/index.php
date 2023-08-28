<?php 
  session_start();
  include_once "../config.php";
  if($_SESSION['access_id'] !== "Admin"){
    header("location: ../../login.php");
  }
  include_once "header.php";
?>
<body>
<div class="container">
<?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
?>
    <p class="text-right"> Xin chào, <b><?php echo $row['name']?> (ID: <?php echo $row['unique_id']?>)</b></p>
</div>
<?php
include_once "view_user.php";
?>
</div>
</html>