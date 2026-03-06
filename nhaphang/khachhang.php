<?php
include "menu.php";
include "config/db.php";
?>

<h2>Khách hàng</h2>

<form method="post">

Tên KH
<input name="ten"><br><br>

Điện thoại
<input name="dt"><br><br>

Địa chỉ
<input name="dc"><br><br>

<button name="them">Thêm</button>

</form>

<?php

if(isset($_POST['them'])){

$ten=$_POST['ten'];
$dt=$_POST['dt'];
$dc=$_POST['dc'];

mysqli_query($conn,"INSERT INTO khach_hang VALUES(NULL,'$ten','$dt','$dc')");

}

?>

<hr>

<table border="1">

<tr>
<th>ID</th>
<th>Tên</th>
<th>Điện thoại</th>
<th>Địa chỉ</th>
</tr>

<?php

$rs=mysqli_query($conn,"SELECT * FROM khach_hang");

while($r=mysqli_fetch_assoc($rs)){

echo "
<tr>
<td>{$r['id']}</td>
<td>{$r['ten_kh']}</td>
<td>{$r['dien_thoai']}</td>
<td>{$r['dia_chi']}</td>
</tr>
";

}

?>

</table>