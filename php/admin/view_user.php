<style>
	th{
		text-align:center!important;
	}
</style>
<div>
	<h3 class="text-center">Danh sách người dùng</h3>
</div>
<table class="table table-bordered text-center">
<tr class="text-center">
	<th>ID</th>
	<th>Tên người dùng</th>
	<th>Email</th>
	<th>Số điện thoại</th>
	<th>Mật khẩu</th>
	<th>Trạng thái</th>
	<th>Quyền</th>
	<th colspan="2">Thao tác</th>
</tr>
<?php
    include_once "../config.php";

    $outgoing_id = $_SESSION['unique_id'];

    $sql = "SELECT * FROM `users`";
    $query = mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($query)){
?>
<tr>
	<td><?php echo $row['unique_id']; ?></td>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo $row['email']; ?></td>
	<td><?php echo $row['phone']; ?></td>
	<td><a href="md5.php?id=<?php echo $row['password']; ?>"><?php echo $row['password']; ?></a></td>
	<td><?php echo $row['status']; ?></td>
	<td><?php echo $row['access']; ?></td>
<td>
	<a href="edit_user.php?id=<?php echo $row['unique_id']; ?>">
		<i class="fa fa-edit" style="color:green"></i>
	</a></td>
<td>
	<a href="delete_user.php?id=<?php echo $row['unique_id']; ?>">
		<i class="fa fa-trash" style="color:red"></i>
	</a>
</td>
</tr>
<?php
}
?>
</table>