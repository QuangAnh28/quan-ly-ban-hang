<?php
include "menu.php";
include "config/db.php";
?>

<h2>Thống kê doanh thu</h2>

<table border="1">

<tr>
<th>Sản phẩm</th>
<th>Số lượng</th>
<th>Doanh thu</th>
</tr>

<?php

$rs=mysqli_query($conn,"
SELECT ten_sp,
SUM(so_luong) as tong_sl,
SUM(so_luong*gia) as doanhthu
FROM chi_tiet_hoa_don
GROUP BY ten_sp
");

while($r=mysqli_fetch_assoc($rs)){

echo "
<tr>
<td>{$r['ten_sp']}</td>
<td>{$r['tong_sl']}</td>
<td>{$r['doanhthu']}</td>
</tr>
";

}

?>

</table>