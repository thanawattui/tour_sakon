
<?php 
require_once('./connectdb.php');

if (isset($_POST['submit'])) {
	$id =  $_POST['id'];
	$place = mysqli_real_escape_string($conn, $_POST['place']);
	$price = $_POST['price'];
	$count_people = $_POST['count_people'];
	$image = mysqli_real_escape_string($conn, $_POST['image']);
	$detail = mysqli_real_escape_string($conn, $_POST['detail']);

	$sql = "UPDATE tb_package SET place='".$place."',
	price = '".$price."',
	count_people = '".$count_people."',
	image = '".$image."',
	detail = '".$detail."'
	WHERE package_id = '".$id."' ";
	
	$result = mysqli_query($conn, $sql);
	

	if ($result) {
		echo $result.'<script> alert("ยืนยันข้อมูลเสร็จเรียบร้อย")</script>';
		header('Refresh:0; url= ../admin-order.php');
	} else {
		echo '<script> alert("ยืนยันหข้อมูลไม่สำเร็จ")</script>';
		header('Refresh:0; url= ../admin-order.php');
	}
}
mysqli_close($conn);

?>
