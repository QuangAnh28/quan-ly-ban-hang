<?php
include "menu.php";
include "config/db.php";
?>

<h2>Nhà cung cấp</h2>

<form method="post">
Tên NCC: <input name="ten"><br><br>
Địa chỉ: <input name="dc"><br><br>
Điện thoại: <input name="dt"><br><br>

<button name="them">Thêm</button>
</form>

<?php
if(isset($_POST['them'])){
$ten=$_POST['ten'];
$dc=$_POST['dc'];
$dt=$_POST['dt'];

mysqli_query($conn,"INSERT INTO nha_cung_cap VALUES(NULL,'$ten','$dc','$dt')");
}
?>

<hr>

<table border="1">
<tr>
<th>ID</th>
<th>Tên</th>
<th>Địa chỉ</th>
<th>Điện thoại</th>
</tr>

<?php
$rs=mysqli_query($conn,"SELECT * FROM nha_cung_cap");

while($r=mysqli_fetch_assoc($rs)){
echo "
<tr>
<td>{$r['id']}</td>
<td>{$r['ten_ncc']}</td>
<td>{$r['dia_chi']}</td>
<td>{$r['dien_thoai']}</td>
</tr>
";
}
?>

</table>