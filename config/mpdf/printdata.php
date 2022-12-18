  <!-- JQVMap -->
  <link rel="stylesheet" href="/theinventory_v2/assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/theinventory_v2/assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  
<?php
require_once __DIR__ . '/vendor/autoload.php';
include '../connect.php';

$id = $_GET['itemId'];

$sqlcust = "SELECT * FROM orders,tblusers WHERE tblusers.id=orders.cust_id and orders.id=$id ";
$resultcust = $conn->query($sqlcust);
$rowcust = $resultcust ->fetch_assoc();

$sql2 = "SELECT order_details.id as oid,product_name,order_detail_price,order_detail_quantity,product_code FROM order_details,products where products.id=order_details.product_id and order_id = $id";
$result2 = $conn->query($sql2);

	
$mpdf = new \Mpdf\Mpdf();

$content = '
<style>
	body{
		font-family: "Garuda";
	}
</style>
<h5 style="text-align:right">วันที่ทำรายการ <u>'.$rowcust["order_date"].'</u></h5>
<h2 style="text-align:center">ใบเสร็จ</h2>
<h3 style="text-align:center">ระบบขายสินค้าออนไลน์</h3>



<h5 style="text-align:left">ชื่อลูกค้า <u>'.$rowcust["fullname"].'</u> <br>ที่อยู่ <u>'.$rowcust["custaddr"].'</u> <br>อีเมล <u>'.$rowcust["useremail"].'</u></h5>

<table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
    <tr  style="border:1px solid #000;padding:4px;">
    <th  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%">ลำดับ</th>
    <th  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="30%">รหัส</th>
    <th  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="20%">ชื่อ</th>
    <th  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="20%">จำนวน</th>
    <th  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="20%">ราคา</th>
</tr>';

$products = "";
if (mysqli_num_rows($result2) > 0) {
    $i = 1;
    $total=0;
    $qty=0;
    while($objResult = mysqli_fetch_assoc($result2)) {
    $sumqty= $objResult["order_detail_quantity"]*$objResult['order_detail_price'];
    $total+= $sumqty; 
    $qty+= $objResult["order_detail_quantity"];
    $products .= '<tr style="border:1px solid #000;">
        <td style="border-right:1px solid #000;padding:3px;text;"  >'.$i.'</td>
        <td style="border-right:1px solid #000;padding:3px;text;"  >'.$objResult["product_code"].'</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$objResult["product_name"].'</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$objResult["order_detail_quantity"].' ชิ้น</td>
        <td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$objResult["order_detail_price"].'</td>
        
    </tr>
   ';
    $i++;
  }
}


$end = '

</table>
<table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
<tr tr style="border:1px solid #000;">
<td style="border-right:1px solid #000;padding:3px;text;"><b><center>จำนวนจ่าย</center></b></td>
<td style="border-right:1px solid #000;padding:3px;text;"><p align = >'.number_format( $qty).' ชิ้น</p></td>
</tr>
<tr tr style="border:1px solid #000;">
<td style="border-right:1px solid #000;padding:3px;text;"><b><center>จำนวนเงินรวม</center></b></td>
<td style="border-right:1px solid #000;padding:3px;text;"><p align = "right">'.number_format( $total).' บาท.-</p></td>
</tr>
</table>

';

$texts = '

';

$mpdf->WriteHTML($content);
$mpdf->WriteHTML($products);
$mpdf->WriteHTML($end);
$mpdf->WriteHTML($texts);

$mpdf->Output();

?>
