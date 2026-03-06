<?php
include "menu.php";
include "config/db.php";
?>

<h2>Lập hóa đơn</h2>

<form method="post">

Ngày
<input type="date" name="ngay"><br><br>

Khách hàng

<select name="kh">

<?php

$rs=mysqli_query($conn,"SELECT * FROM khach_hang");

while($r=mysqli_fetch_assoc($rs)){
echo "<option value='{$r['id']}'>{$r['ten_kh']}</option>";
}

?>

</select>

<br><br>

<button name="tao">Tạo</button>

</form>

<?php

if(isset($_POST['tao'])){

$ngay=$_POST['ngay'];
$kh=$_POST['kh'];

mysqli_query($conn,"INSERT INTO hoa_don VALUES(NULL,'$ngay',$kh)");

}

?>