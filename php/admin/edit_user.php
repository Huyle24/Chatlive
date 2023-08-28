<?php
include "../config.php";
include_once "header.php";
$id = (int)$_GET['id'];
$sql = "SELECT * FROM users WHERE unique_id = '".$_GET['id']."'";
$query = mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($query)) {
        $email = $row['email'];
        $name = $row['name'];
        $phone = $row['phone'];
		$status = $row['status'];
		$access = $row['access'];
?>
<div class="container">
<div>
	<h3 class="text-center">Cập nhật thông tin người dùng</h3>
</div>
<form class="form-horizontal" action="update_user.php" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="id" >ID:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="id" value="<?=$id;?>" name="id">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email" >Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" value="<?=$email;?>" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Tên người dùng:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="name" value="<?=$name;?>" name="name">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="phone">Số điện thoại:</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="phone" value="<?=$phone;?>" name="phone">
      </div>
    </div>
	<div class="form-group align-items-center">
      <label class="control-label col-sm-2" for="status">Trạng thái:</label>
      <div class="col-sm-10">          
        <select class="" id="status" name="status">
			<option value="<?=$status;?>">Giữ Nguyên (<?=$status;?>)</option>
			<option value="Ban">Ban - Chặn</option>
			<option value="Offline">Bình thường</option>
		</select>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="access">Quyền:</label>
      <div class="col-sm-10">          
        <select class="" id="access" name="access">
			<option value="<?=$access;?>">Giữ Nguyên (<?=$access;?>)</option>
			<option value="Admin">Admin</option>
			<option value="User">User</option>
		</select>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-6">
        <button type="submit" class="btn btn-success">Xác nhận</button>
    </div>
	</div>
</form>
	<div class="col-sm-offset-2 col-sm-6">
        <button class="btn btn-danger" onclick="back()">Trở lại</button>
    </div>
<script>
    function back(){
        window.open("index.php","_self");
    }
</script>
<?php
}
?>