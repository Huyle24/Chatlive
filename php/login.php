<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($password);
            $enc_pass = $row['password'];
			$er_status=$row['status'];
            if($user_pass === $enc_pass && $er_status != "Ban"){
                $status = "Online";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id'];
					$_SESSION['access_id'] = $row['access'];
                    echo "success";
                }else{
                    echo "Đã xảy ra lỗi. Vui lòng thử lại!";
                }
            }else{
				if ($er_status == "Ban"){
					echo "Tài khoản bị khóa do vi phạm!";
				}
				else{
					echo "Email hoặc mật khẩu không đúng!";
				} 
            }
        }else{
            echo "$email - Email này không tồn tại!";
        }
    }else{
        echo "Tất cả các trường đầu vào là bắt buộc!";
    }
?>