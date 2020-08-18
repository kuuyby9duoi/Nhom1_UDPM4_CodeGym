<?php 
require_once('connect.php'); 
session_start(); 
$email1=$_SESSION['user'];
$check_admin=mysqli_query($conn,"select * from khachhang where email='$email1'");
$check=mysqli_fetch_array($check_admin);
$admin1=$check['admin'];
if (empty($_SESSION['user'])||$admin1!='true') header('Location:myaccount.php');
else { 
			$id=$_GET['id'];
			$acc=$_GET['acc'];	
			if($acc=='delete') {$run=mysqli_query($conn,"delete from khachhang where id='$id'");header('Location:manager_user.php?sldong=5&page=1');}
			if($acc=='admin')  {$update_admin=mysqli_query($conn,"update khachhang set admin='true' where id='$id'");header('Location:manager_user.php?sldong=5&page=1');} 
			if($acc=='chmod')  {$update_admin=mysqli_query($conn,"update khachhang set admin='false' where id='$id'");header('Location:manager_user.php?sldong=5&page=1');}
			if($acc=='delete_product') {$delete=mysqli_query($conn,"delete from sanpham where produc_id='$id'");header('Location:manager_product.php?sldong=5&page=1');}
			if($acc=='delete_invoice') {$delete=mysqli_query($conn,"delete from invoice where id_invoice='$id'");header('Location:manager_invoice.php?sldong=5&page=1');}
			
			
			if($acc=='delete_cart') {

				$get_product=$_GET['id_product']; 
				$run=mysqli_query($conn,"select * from cart where id_user='$id'");
				$num=mysqli_num_rows($run);
				$cart=mysqli_fetch_array($run);
				$produc_id=$cart['id_product'];
				$sl_mua=$cart['sl_mua'];
				$a=explode(' ',$produc_id);
				$b=explode(' ',$sl_mua);
				$du=count($a);
				for ($i=0; $i < $du; $i++) { 
					if ($a[$i]==$get_product) {unset($a[$i]); unset($b[$i]);break;}
				}$new_a=implode(" ",$a);
				$new_b=implode(" ",$b);
				$delete=mysqli_query($conn,"update cart set id_product='$new_a',sl_mua='$new_b' where id_user='$id'");header('Location:/shop/cart.php');





			}
																						
			if($acc=='export') {
require_once('Classes/PHPExcel.php'); 
$get_data=mysqli_query($conn,"select * from khachhang");
//Khởi tạo đối tượng
$excel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
$excel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
$excel->getActiveSheet()->setTitle('user');

//Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(18);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(9);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(17);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(32);
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(18);
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(255);
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(50);
$excel->getActiveSheet()->getColumnDimension('L')->setWidth(255);

//Xét in đậm cho khoảng cột
$excel->getActiveSheet()->getStyle('A1:L1')->getFont()->setBold(true);
//Tạo tiêu đề cho từng cột
$excel->getActiveSheet()->setCellValue('A1', 'id');
$excel->getActiveSheet()->setCellValue('B1', 'Họ và tên');
$excel->getActiveSheet()->setCellValue('C1', 'Giới tính');
$excel->getActiveSheet()->setCellValue('D1', 'Địa chỉ');
$excel->getActiveSheet()->setCellValue('E1', 'Quê Quán');
$excel->getActiveSheet()->setCellValue('F1', 'SĐT');
$excel->getActiveSheet()->setCellValue('G1', 'Email');
$excel->getActiveSheet()->setCellValue('H1', 'Sở Thích');
$excel->getActiveSheet()->setCellValue('I1', 'Admin');
$excel->getActiveSheet()->setCellValue('J1', 'Mật Khẩu');
$excel->getActiveSheet()->setCellValue('K1', 'Path avatar');
$excel->getActiveSheet()->setCellValue('L1', 'key pass');
// thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
// dòng bắt đầu = 2
$numRow = 2;
while ($row=mysqli_fetch_assoc($get_data)) 
{
    $excel->getActiveSheet()->setCellValue('A' . $numRow, $row['id']);
    $excel->getActiveSheet()->setCellValue('B' . $numRow, $row['name']);
    $excel->getActiveSheet()->setCellValue('C' . $numRow, $row['gender']);
    $excel->getActiveSheet()->setCellValue('D' . $numRow, $row['address']);
    $excel->getActiveSheet()->setCellValue('E' . $numRow, $row['quequan']);
    $excel->getActiveSheet()->setCellValue('F' . $numRow, $row['phone']);
    $excel->getActiveSheet()->setCellValue('G' . $numRow, $row['email']);
    $excel->getActiveSheet()->setCellValue('H' . $numRow, $row['hobby']);
    $excel->getActiveSheet()->setCellValue('I' . $numRow, $row['admin']);
    $excel->getActiveSheet()->setCellValue('J' . $numRow, $row['password']);
    $excel->getActiveSheet()->setCellValue('K' . $numRow, $row['path_avatar']);
    $excel->getActiveSheet()->setCellValue('K' . $numRow, $row['salt']);
    $numRow++;
}

header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="export_user.xlsx"');
PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
}














	}		?>