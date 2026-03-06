<?php
include "menu.php";
include "config/db.php";
?>

<h2>Chi tiết hóa đơn</h2>

<form method="post">

Hóa đơn

<select name="hd">

<?php
$rs=mysqli_query($conn,"SELECT * FROM hoa_don");

while($r=mysqli_fetch_assoc($rs)){
echo "<option value='{$r['id']}'>HD {$r['id']}</option>";
}
?>

</select>

<br><br>

Tên SP
<input name="sp"><br><br>

Số lượng
<input name="sl"><br><br>

Giá
<input name="gia"><br><br>

<button name="them">Thêm</button>

</form>

<?php

if(isset($_POST['them'])){

$hd=$_POST['hd'];
$sp=$_POST['sp'];
$sl=$_POST['sl'];
$gia=$_POST['gia'];

mysqli_query($conn,"INSERT INTO chi_tiet_hoa_don VALUES(NULL,$hd,'$sp',$sl,$gia)");

}

?>