<?php
    session_start();
    include_once "config.php";
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($name) && !empty($phone) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
			$sql1 = mysqli_query($conn, "SELECT * FROM users WHERE phone = '{$phone}'");
			if (strlen($phone) !=10) {
				echo "Số $phone không hợp lệ!";
			}
            if(mysqli_num_rows($sql) > 0 || mysqli_num_rows($sql1) > 0){
				if (mysqli_num_rows($sql) > 0){
					echo "Email dạng $email đã được đăng ký!";
				}
				else{
					echo "Số $phone đã được đăng ký!";
				}
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                $status = "Đang hoạt động";
                                $encrypt_pass = md5($password);
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, name, phone, email, password, img, status, access)
                                VALUES ({$ran_id}, '{$name}','{$phone}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}', 'Chưa xác minh')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "Tạo tài khoản thành công!";
                                    }else{
                                        echo "Địa chỉ email này không tồn tại!";
                                    }
                                }else{
                                    echo "Đã xảy ra lỗi. Vui lòng thử lại!";
                                }
                            }
                        }else{
                            echo "Vui lòng tải lên một tệp hình ảnh - jpeg, png, jpg";
                        }
                    }else{
                        echo "Vui lòng tải lên một tệp hình ảnh - jpeg, png, jpg";
                    }
                }
            }
        }else{
            echo "$email không phải là một email hợp lệ!";
        }
    }else{
        echo "Tất cả các trường đầu vào là bắt buộc!";
    }
?>