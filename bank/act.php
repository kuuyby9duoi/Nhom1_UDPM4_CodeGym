<?php 
require_once('connect.php');


function select_user($tk,$mk)
{
global $conn;
$run=mysqli_query($conn,"select * from user where stk='$tk'");
$row=mysqli_fetch_array($run);
$num=mysqli_num_rows($run);


//Sinh ra chuỗi dài 32 ngẫu nhiên, cũng cần lưu chuỗi này vào một cột trong DB (chỉ file đăng ký)
$salt = random_bytes(32);
//Sử dụng thêm một salt cố định trong file connect
global $key;
//mã hóa nè
$crypt = md5(base64_encode($key).md5($mk).md5(md5($salt)));


if($num==1)
    { if($mk==$row['password']){$_SESSION['user']=$tk; header("Location:myaccount.php"); }          
		   else echo "Sai password!";}
    else  echo 'Số tài khoản không tồn tại!';
}
 





 ////---------------------------------------------------------------------///////
function register_user($tk,$mk) {
global $conn;
//Sử dụng thêm một salt cố định trong file connect
global $key;
//Sinh ra chuỗi dài 32 ngẫu nhiên, cũng cần lưu chuỗi này vào một cột trong DB (chỉ file đăng ký)
$salt = random_bytes(32);
//mã hóa nè
$crypt = md5(base64_encode($key).md5($mk).md5(md5($salt)));
//anti tấn công Cross-site scripting (XSS)- trim : xóa các kí tự trắng dư thừa ở hai đầu chuỗi
$username=htmlspecialchars(trim($tk));
//kiểm tra trong chuỗi có khoảng trắng không
if (preg_match('/\s/', $username))echo 'error input type'; 
else {


            $runcheck=mysqli_query($conn,"select * from user where email='$username'");
            
            if($numcheck=mysqli_num_rows($runcheck)!=0) echo "email đã tồn tại!";
            else
            {
            $run=mysqli_query($conn,"insert into user (email,password,salt) value('$email','$password','$salt')");
            if($run) echo "Thêm mới thành công!";
            else echo "Không được nhé!";   }
}
}







////---------------------------------------------------------------------///////
function chuyenkhoan($tkgoc,$tknhan,$money,$note)
{
global $conn;
if($tkgoc==$tknhan) {echo "Bạn không thể chuyển khoản cho chính mình!";}
else {
		if($money>50000000) {echo "Số tiền chuyển vượt quá hạn ngạch cho phép!";}
		else {
				$run1=mysqli_query($conn,"select * from user where stk='$tknhan'");
				$row1=mysqli_fetch_array($run1);
				$num1=mysqli_num_rows($run1);
				$run2=mysqli_query($conn,"select * from user where stk='$tkgoc'");
				$row2=mysqli_fetch_array($run2);
				$tien=$row2['sodu'];
				if($tien < $money+50000) {echo "tài khoản của quý khách dell đủ để thực hiện giao dịch!";}
				if($num1==1)
				    { $tien1=$row1['sodu']-$money;
					  $tien2=$row2['sodu']+$money;
				    $update_tk_nhan=mysqli_query($conn,"update user set sodu='$tien1' where stk='$tknhan'"); 
				    $update_tk_goc=mysqli_query($conn,"update user set sodu='$tien2' where stk='$tkgoc'"); 
				    date_default_timezone_set('Asia/Ho_Chi_Minh');
				    $date_time=date('Y/m/d H:i:s');
            		$insert_invoice=mysqli_query($conn,"insert into invoice (tk_goc,tk_nhan,so_tien,ngay_gio,noi_dung,act,sodu_cuoi) value('$tkgoc','$tknhan','$money','$date_time;','$note','CK','$tien1')");
            		echo "Giao dịch thành công";
				}
				    else { echo 'Số tài khoản thụ hưởng không tồn tại!';}		
			}	
	}
}


////---------------------------------------------------------------------///////

function change_pin($stk,$mk,$newpassword,$repassword)
{
global $conn;

if($newpassword==$repassword)
    {$run=mysqli_query($conn,"select * from user where stk='$stk'");
	$row=mysqli_fetch_array($run);
     if($mk==$row['password']){$run_editpin=mysqli_query($conn,"update user set password='$newpassword' where stk='$stk'"); unset($_SESSION['user']); header('location:login.php');}          
		   else { echo "Pin cũ không chính xác!";
		} }
else { echo 'Nhập lại Pin mới không khớp!';}
}


function rut_tien($stk,$money)
{
global $conn;
$run=mysqli_query($conn,"select * from user where stk='$stk'");
$row=mysqli_fetch_array($run);
$tien=$row['sodu'];
if($tien < $money+50000){echo "Số dư tài khoản không đủ để thục hiện giao dịch!";}
else {
	$tien1=$tien-$money;
	$update_tk_goc=mysqli_query($conn,"update user set sodu='$tien1' where stk='$stk'");
	$date_time=date('Y/m/d H:i:s');
    $insert_invoice=mysqli_query($conn,"insert into invoice (tk_goc,so_tien,ngay_gio,act,sodu_cuoi) value('$stk','$money','$date_time','RT','$tien1')");
    echo "Giao dịch thành công - Quý khách vui lòng đợi tiền chui ra<br> hóa đơn trong log/data.txt";
    $data ="\n" . 'AGRIBANK' . "\n" .'Tài khoản:'.$stk . "\n" . 'Giao dịch: Rút tiền: -'.$money. "\n" . 'Vào lúc:'.$date_time . "\n" .'Số dư cuối:'.$tien1 ;
    $link='log/data.txt';
    $a=in_ra($link,$data);
}}

function in_ra($url,$data)
{
    $file = @fopen($url, 'a+');
if (!$file)
    echo "Hết giấy in rồi thôi khỏi hóa đơn";
else {
    
    fwrite($file, $data);
    fclose($file);  }
}










?>