<?php
include "menu.php";
include "config/db.php";
?>

<h2>Nhập hàng</h2>

<form method="post">

Tên SP
<input name="ten"><br><br>

Số lượng
<input name="sl"><br><br>

Giá nhập
<input name="gia"><br><br>

Ngày nhập
<input type="date" name="ngay"><br><br>

Nhà cung cấp
<select name="ncc">

<?php
$rs=mysqli_query($conn,"SELECT * FROM nha_cung_cap");

while($r=mysqli_fetch_assoc($rs)){
echo "<option value='{$r['id']}'>{$r['ten_ncc']}</option>";
}
?>

</select>

<br><br>

<button name="luu">Lưu</button>

</form>

<?php

if(isset($_POST['luu'])){

$ten=$_POST['ten'];
$sl=$_POST['sl'];
$gia=$_POST['gia'];
$ngay=$_POST['ngay'];
$ncc=$_POST['ncc'];

mysqli_query($conn,"INSERT INTO nhap_hang VALUES(NULL,'$ten',$sl,$gia,'$ngay',$ncc)");

echo "Đã lưu";

}

?>