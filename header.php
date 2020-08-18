<!DOCTYPE html>
<?php session_start();
require_once('connect.php'); ob_start(); 
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="/assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="/assets/css/Simple-Slider.css">
    <!--<script defer src="/assets/js/jquery.min.js"></script>-->
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="/assets/js/chart.min.js"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script defer src="/assets/js/bs-init.js"></script>
    <script defer src="/assets/js/aos.js"></script>
    <script defer src="/assets/js/jquery.easing.js"></script>
    <script defer src="/assets/js/swiper.jquery.min.js"></script>
    <script defer src="/assets/js/Simple-Slider.js"></script>
    <script defer src="/assets/js/theme.js"></script>
<style type="text/css">  
*{margin:0;padding:0;}


ul li a {color:#000;text-decoration:none;}
ul li a:hover{text-decoration:underline;color:#7abf8bd4;}

#logo {width:160px;height:60px; padding-left: 30%;}
.aaa::-webkit-search-decoration,
.aaa::-webkit-search-cancel-button { display: none; }
.aaa {outline: none; font-family: font_txt; margin-top: -15px; background: #716a6a url(/img/icon/search-icon.webp) no-repeat 9px center; border: solid 2px #1dd120; padding: 9px 10px 9px 32px; width: 95px; -webkit-border-radius: 10em;-moz-border-radius: 10em;border-radius: 10em;-webkit-transition: all .5s;-moz-transition: all .5s;transition: all .5s;}
.aaa:focus {width: 240px;border-color: #66CC75;color: #000;background-color: #fff;-webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);-moz-box-shadow: 0 0 5px rgba(109,207,246,.5);box-shadow: 0 0 5px rgba(109,207,246,.5);}
.aaa::-webkit-input-placeholder { color: #cec7c7;}
.bbb {display: none;}
.li1 { padding-left:50px ;font-weight: bold; list-style: none;padding-top: 20px;display: inline-flex;position: relative;right: 70%;}
.noti2 {height: 1000px;width: 90%; border-radius: 20px;margin: auto;z-index: 1000;}

.close {background-color: #ffffff00; }
.slz {width: 20px; height: 20px;border-radius: 10px;background-color: #79a206;text-align: center;color: #fff;line-height: 20px;font-size:15px;}
#logo {width:160px;height:60px;margin-left: -800px;}

.cart { position: absolute;top: -2px;}

.kq { font-size: 25px; font-weight: bold; margin-bottom: 30px; padding-top: 20px;text-align: center;}
.productz {width: 220px; height: 200px;   margin-left: 30px;border: #000 1px solid;border-left: none; border-bottom: none;float: left;}
.productz img:hover {transform: scale(1.2); opacity: 8; filter: alpha(opacity=50);}
.namez {font-size: 15px;color: #000;text-align: center; margin-top: -15px;}

.moneyz {font-size: 14px; color: #79a206; margin: 10px 20px 25px 0px; float: left;margin-top: 5px;}
.old_pricez {color: #999; font-size: 14px; text-decoration: line-through; margin: 10px 20px 25px 0px;}
.salez {background-color:#ff040496;width: 40px;height: 30px;line-height: 30px;padding-left: 5px; color: #fff;font-size: 13px;position: relative;top: -200px;left: 0px;border-bottom-right-radius: 10px; }
.close {background-color: #ffffff00; }
</style>



    
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand"href="/" rel="home"><img src="../img/logo.webp" alt="logo" id="lo go" width="160px" height="60px"></a>
  <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars" ></i></button>
    
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="position: relative;">
    <div class="navbar-nav">
      <a class="nav-item nav-link <?php if($_SERVER['PHP_SELF']=='/index.php') echo "active";?>"  href="../" rel="home">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link <?php  if($_SERVER['PHP_SELF']=='/shop/index_2.php'||$_SERVER['PHP_SELF']=='/shop/index.php') echo "active";?>" href="../shop?acc=view" rel="blog">Shop</a>
      <a class="nav-item nav-link" href="<?php if(empty($_SESSION['user'])) echo "../login.php"; else echo "../myaccount.php";?>" rel="myacount" ><?php if(empty($_SESSION['user']))echo "Login"; else echo "My account";?></a>
      <a class="nav-item nav-link" href="#" style="position: absolute; right: 5%;"><form method="POST"><input type="search" name="search" placeholder='Search' size="15" class="aaa  shake animated" /><input type="submit" name="search1" class="bbb" ></form></a>
     
     
  </div>
  </div>
     
      <?php if(!empty($_SESSION['user'])) { 
         $emailz=$_SESSION['user']; 
            $check_id=mysqli_query($conn,"select * from khachhang where email='$emailz' ");
            $id_tmp=mysqli_fetch_array($check_id); $id_kh=$id_tmp['id']; $admin=$id_tmp['admin'];
            $name=$id_tmp['name']; $avatar=$id_tmp['path_avatar'];
            $check_cart=mysqli_query($conn,"select * from cart where id_user='$id_kh' "); 
            $cart=mysqli_fetch_array($check_cart);
            $null=mysqli_num_rows($check_cart);
            if ($null!=0) {
                
                $sl_muaz=$cart['sl_mua'];
                $b=explode(' ',$sl_muaz);
                $du=count($b);$allz=0;
                for ($i=0; $i < $du; $i++) { $allz += $b[$i]; }  }
            else $allz=0;
            ?>
<a class="nav-item nav-link dropdown no-arrow" role="presentation">
    
    
              <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><img src="../img/icon/cart.webp" width="35px" height="23px" class="cartz"><span class="cart badge badge-danger badge-counter bounce animated"><?php echo $allz ?></span></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">Giỏ Hàng:</h6>

<?php $check_cart=mysqli_query($conn,"select * from cart where id_user='$id_kh' "); 
            $cart=mysqli_fetch_array($check_cart);
            if (mysqli_num_rows($check_cart)!=0) {
            
          
            $produc_id=$cart['id_product'];
            $sl_mua=$cart['sl_mua'];
            $a=explode(' ',$produc_id);
            $b=explode(' ',$sl_mua);

            $coupon1=$cart['coupon_code'];
            $du=count($a);
            if($produc_id=='') {echo "<h4 class='noti'>Giỏ hàng rỗng, quý khách vui lòng thêm sản phẩm vào giỏ !</h4>";}
            else {
            $tong2=0;
             for ($i=0; $i < count($a); $i++) { 
            $run=mysqli_query($conn,"select * from sanpham where produc_id='$a[$i]'"); 
            $num=mysqli_num_rows($run); 
            $sanpham=mysqli_fetch_array($run); 
            $ship=30000;
            $tong1=($b[$i] *  $sanpham['money']); 
            $tong2 += ($b[$i] *  $sanpham['money']);  

           ?>

                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="../<?php $path=$sanpham['picture'];$c=explode(' ',$path); echo $c[0]; ?>"></div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span><?php echo $sanpham['name']." x ".$b[$i] ; ?></span></div>
                                                <p class="small text-gray-500 mb-0">Đơn giá:<?php echo $sanpham['money']; ?>  + Thành tiền:<?php echo $tong1; ?> </p>
                                            </div>
                                        </a>

<?php }}} ?>




                                        <a class="text-center dropdown-item small text-gray-500" href="../shop/cart.php">Đến trang Giỏ hàng</a></div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
    
    



    
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle shake animated nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php echo $name;?></span><img class="border rounded-circle img-profile" src="../<?php echo $avatar;?>" width="50px" height="50px"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="../myaccount.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Cá nhân</a><?php if ($admin=='true') {
    
                                       ?><a class="dropdown-item" role="presentation" href="../admin_area.php"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Admin area</a>
                                   <?php } ?>
                                        
                                              <form method="POST"><div class="dropdown-divider"></div><button name="logout" class="dropdown-item" role="presentation"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Đăng xuất</button> </div></form>
                                        
                                        <?php if(isset($_POST['logout'])) {unset($_SESSION['user']); header('location:login.php');} ?>
                                 </div>

</a>

<?php  }  ?>
 
</div>
</div>
</nav>




<?php
//if ($_SERVER["REQUEST_METHOD"] == "GET") {
     if(isset($_POST['search1'])){ echo "<div class='noti2' >";
        $key = $_POST['search'];
        if (empty($key)) {
                echo "Vui lòng nhập một từ khóa hoặc tên sản phẩm!"; } 
        else {

                        $search=mysqli_query($conn,"select * from sanpham where name like '%$key%'");
                        $num=mysqli_num_rows($search);
                        


                if ($num > 0) {

                // Dùng $num để đếm số dòng trả về.
                echo "<p class='kq'>$num Kết Quả Tìm Kiếm: “ $key ”</p> <style>.noti2 {background-color: #ffffffa8; list-item;} 
                                                                               .all1,.all2,.product,#wrapper,#index {display:none;} </style>";
                // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                while ($row2 = mysqli_fetch_assoc($search)) {
                ?>

                <form method="POST" ><button type="submit" name="close" class="close" ><img src="../img/icon/close.svg" width="40px" height="40px" style="border-radius: 50px;outline: none;"></button></form>

                        <a href="../shop/?id=<?php echo $row2['produc_id']; ?>&acc=detail" rel="<?php echo $row2['name']; ?>" >
                        <div class="productz" ><img src="../<?php $path=$row2['picture']; 
                                                                    $a=explode(' ',$path);
                                                                    $pic=count($a); echo $a[0]; ?>" width="200px" height="200px" style="border-radius: 10px; transition: transform .2s;">
                                                                    <div class="salez"><?php $price=$row2['money']; $old_price=$row2['old_price'];  $sub=($price - $old_price)/$old_price * 100;      echo round($sub, 0); ?>%</div> 
                        <h2 class="namez"><?php echo $row2['name']; ?></h2>
                        <h2 class="moneyz"><?php echo $row2['money']; ?>VNĐ</h2></a>
                        <div class="old_pricez"><?php echo $old_price; ?>VNĐ</div>
                </div>
                <?php
                }
                } else echo "Khong tim thay ket qua!"; 

        }
}

if(isset($_POST['close'])){echo "<style>.noti2 {display:none;} </style>";header("Refresh:0"); }
?>

</body>
</html>