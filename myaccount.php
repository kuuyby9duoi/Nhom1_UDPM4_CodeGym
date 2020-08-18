<!DOCTYPE html>
<?php include('header.php'); 
if(empty($_SESSION['user'])){header('location:login.php');} 
else {
 require_once('connect.php'); ob_start();

          
          	$email=$_SESSION['user'];
			$sql="select * from khachhang where email='$email'";
			$run=mysqli_query($conn,$sql);
	   		$num=mysqli_num_rows($run);
	   		$row=mysqli_fetch_array($run);
	   		$name=$row['name'];
	   		$gender=$row['gender'];
	   		$address=$row['address'];
	   		$quequan=$row['quequan'];
	   		$phone=$row['phone'];
	   		$hobby=$row['hobby'];
	   		$link_avatar=$row['path_avatar'];
	   		$admin=$row['admin'];
		   	$id=$row['id'];

	if(isset($_POST['admin'])) {header('location:admin_area.php');}
    if(isset($_POST['editpass'])) {header('location:editpass.php?id='.$id);}
	if(isset($_POST['editprofile'])) {header('location:editprofile.php?id='.$id);}
	if(isset($_POST['logout'])) {unset($_SESSION['user']); header('location:login.php');}
	if(isset($_POST['delete'])) {		
	$xoa="delete from khachhang where email='$email'";
	$run=mysqli_query($conn,$xoa);
	unset($_SESSION['user']); header('location:login.php');

}
    
    



  }  ob_end_flush(); 




?>
<html>
<head>
    <title>Profile</title>
</head>
<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../admin_area.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="../myaccount.php"><i class="fas fa-user"></i><span>user</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../manager_product.php?sldong=4&page=1"><i class="fas fa-table"></i><span>Sản phẩm</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../manager_invoice.php?sldong=5&page=1"><i class="far fa-user-circle"></i><span>Hóa đơn</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../manager_email.php?sldong=5&page=1"><i class="fas fa-user-circle"></i><span>Email</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                





        <div class="container-fluid">
            <h3 class="text-dark mb-4" style="padding-top: 10px;">Chỉnh sửa hồ sơ</h3>
            <div class="row mb-3">
                <div class="col-lg-4">
                    <div class="card mb-3">




                        <form method="post" enctype="multipart/form-data">
                        <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="<?php echo "$link_avatar" ?>" alt="avatar" width="160" height="160">
                                   
                            </div>
                        </div>
                   

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary font-weight-bold m-0">Kiểm kê</h6>
                        </div>
                        <div class="card-body">
                            <h4 class="small font-weight-bold">Số sản phẩm đã mua:<span class="float-right">20</span></h4>
                            <div class="progress progress-sm mb-3">
                                <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"><span class="sr-only">20%</span></div>
                            </div>
                            <h4 class="small font-weight-bold">Số sản phẩm còn trong giỏ hàng:<span class="float-right">8</span></h4>
                            <div class="progress progress-sm mb-3">
                                <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"><span class="sr-only">40%</span></div>
                            </div>
                            <h4 class="small font-weight-bold">Tổng thiệt hại:<span class="float-right">600000VNĐ</span></h4>
                            <div class="progress progress-sm mb-3">
                                <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="sr-only">60%</span></div>
                            </div>
                            <h4 class="small font-weight-bold">Số lượt đánh giá:<span class="float-right">10</span></h4>
                            <div class="progress progress-sm mb-3">
                                <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="sr-only">80%</span></div>
                            </div>
                            <h4 class="small font-weight-bold">Mức độ tin tưởng<span class="float-right">100%</span></h4>
                            <div class="progress progress-sm mb-3">
                                <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="sr-only">100%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row mb-3 d-none">
                        <div class="col">
                            <div class="card text-white bg-primary shadow">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <p class="m-0">Peformance</p>
                                            <p class="m-0"><strong>65.2%</strong></p>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                    </div>
                                    <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white bg-success shadow">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <p class="m-0">Peformance</p>
                                            <p class="m-0"><strong>65.2%</strong></p>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                    </div>
                                    <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Thông tin tài khoản</p>
                                </div>
                                <div class="card-body">
                                    
<style type="text/css">
.form-control{display:block;width:100%;height:calc(1.5em + .75rem + 2px);padding:.375rem .75rem;font-size:1rem;font-weight:400;line-height:1.5;color:#6e707e;background-color:#fff;background-clip:padding-box; border-top: none;border-right: none; border-left: none; border-bottom:1px solid #d1d3e2;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out;}
</style>



                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label for="username"><strong>Họ và tên:</strong></label><div class="form-control"> <?php echo "$name"; ?> </div></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label for="email"><strong>Email:</strong></label><div class="form-control" ><?php echo "$email" ?></div></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label for="first_name"><strong>Giới tính:</strong></label><div class="form-control"><?php echo $gender ?></div> </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label for="last_name"><strong>SĐT:</strong></label><div class="form-control"><?php echo "$phone"; ?></div>
                                            </div>
                                        </div>
                                        
                                    
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Sổ địa chỉ</p>
                                </div>
                                <div class="card-body">
                                   
                                        <div class="form-group"><label for="address"><strong>Địa chỉ:</strong><br></label><div class="form-control" ><?php echo "$address"; ?> </div></div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label for="city"><strong>Tỉnh (thành phố):</strong><br></label>
                                                    <div class="form-control" ><?php echo $quequan;?></div>
                                                            
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label for="country"><strong>Sở thích:</strong><br></label><div class="form-control"><?php echo "$hobby"; ?></div></div>
                                            </div>
                                        </div>
                                        <div class="form-group"><?php if($admin=='true') { ?>
																<button class="btn btn-primary btn-sm" name="admin" value="admin">Admin area</button> <?php } ?>
																<button class="btn btn-primary btn-sm" name="editpass" value="Đổi mật khẩu">Đổi mật khẩu</button>
																<button class="btn btn-primary btn-sm" name="editprofile" value="Sửa thông tin">Sửa thông tin</button>
																<button class="btn btn-primary btn-sm" name="delete" onclick="return confirm('Bạn có chắc xóa vĩnh viễn tài khoản này?')">Xóa tài khoản</button>
                                                                
																<button class="btn btn-primary btn-sm" name="logout" value="đăng xuất">Đăng xuất</button>
                                                                <button class="btn btn-primary btn-sm" name="back" value="back"><a href="javascript:history.back()" style="text-decoration: none; color: #fff;">Quay lại</a></button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php');?>

</body>
</html>











