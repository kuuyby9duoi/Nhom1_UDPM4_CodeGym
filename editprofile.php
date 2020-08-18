<!DOCTYPE html>
<?php  include('header.php');
if (empty($_SESSION['user'])) header('location:login.php'); 
else {
 require_once('connect.php'); ob_start(); 
$id=$_GET['id'];   $email=$_SESSION['user'];
$check_admin=mysqli_query($conn,"select * from khachhang where email='$email'");
$check=mysqli_fetch_array($check_admin);
$admin1=$check['admin'];
$id1=$check['id'];
if($admin1!='true'){if($id!=$id1)header('location:editprofile.php?id='.$id1);}
          
            $sql="select * from khachhang where id='$id'";
            $run=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($run);
            $row=mysqli_fetch_array($run);
            $name=$row['name'];
            $gender=$row['gender'];
            $address=$row['address'];
            $phone=$row['phone'];
            $email2=$row['email'];
            $hobby=$row['hobby'];
            $quequan=$row['quequan'];
            $link_avatar=$row['path_avatar'];




    if(isset($_POST['save']))
    {
    $email1=$_POST['email'];
    $name1=$_POST['name'];
    $gender1=$_POST['gender'];
    $address1=$_POST['address'];
    $quequan1=$_POST['quequan'];
    $phone1=$_POST['phone'];
    $hobby1=$_POST['hobby'];
    

    if(isset($_FILES['edit_avata'])&&$_FILES['edit_avata']["name"]!=null)
            {
                //lấy tên của file:
                $file_name=$_FILES['edit_avata']["name"];
                //lấy đường dẫn tạm lưu nội dung file:
                $file_tmp =$_FILES['edit_avata']['tmp_name'];
                //tạo đường dẫn lưu file trên host:
                $path ="upload/".$file_name;
                //upload nội dung file từ đường dẫn tạm vào đường dẫn vừa tạo:
                move_uploaded_file($file_tmp,$path);
                //lấy thể loại file vào biến $type
                $type=$_FILES['edit_avata']['type'] ;
                //lấy file size
                $size=$_FILES['edit_avata']['size'];
                if ($type=='image/jpeg'|| $type=='image/png'||$type=='image/gif') { 
                        if($size<5954000) $write_path=mysqli_query($conn,"update khachhang set path_avatar='$path' where id='$id'");
                        else echo "Dung lượng file không được quá 5MB" ;}
                else echo 'Vui lòng chọn loại file  là hình ảnh(png, jpeg, ico, gif)!';
            }
    if($gender1=='Nam'||$gender1=='Nữ') {
    $sql="update khachhang set name='$name1',gender='$gender1',address='$address1',phone='$phone1',email='$email1',hobby='$hobby1',quequan='$quequan1' where id='$id'";
    $run=mysqli_query($conn,$sql);echo "<script>alert('Cập nhật thông tin thành công!');</script>"; header("Refresh:0");}
    else echo "Vui lòng chọn đúng giới tính là: <i>Nam</i> hoặc <i>Nữ</i> chúng tôi dell chấp nhận Gt thứ 3";
    }
    



  }  ob_end_flush(); 




?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit Profile</title>

</head>
<body id="page-top">
    <div id="wrapper" >
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
                            <div class="mb-3">
<style type="text/css">.inputfile { width: 0.1px;height: 0.1px; opacity: 0; overflow: hidden; z-index: -1;}
                        .inputfile:focus + label,
                        .inputfile + label:hover {background-color: red;}
</style>      
                                    <input type="file" name="edit_avata" id="file"  class="inputfile" accept=".jpg, .jpeg, .png" />
                                    <label for="file" class="btn btn-primary btn-sm">Thay Avatar</label>



                            </div>
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
                                    




                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label for="username"><strong>Họ và tên:</strong></label><input class="form-control" type="text" name="name" value="<?php echo "$name"; ?>" size="40" ></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label for="email"><strong>Email:</strong></label><input class="form-control" type="email" name="email" value="<?php echo "$email2" ?>"  ></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label for="first_name"><strong>Giới tính:</strong></label><input type="radio" name="gender" value="Nam" style="margin-left: 20px;" <?php if($gender=='Nam') echo "checked" ?>>Nam   
         <input type="radio" name="gender" class="gender" value="Nữ" style="margin-left: 20px;" <?php if($gender=='Nữ') echo "checked"?> >Nữ   <input type="radio" name="gender" style="margin-left: 20px;" class="gender" value="Khác">Khác</div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label for="last_name"><strong>SĐT:</strong></label><input class="form-control" type="tel" maxlength="14" min="0" name="phone" value="0<?php echo "$phone"; ?>"></div>
                                            </div>
                                        </div>
                                        
                                    
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Sổ địa chỉ</p>
                                </div>
                                <div class="card-body">
                                   






                                        <div class="form-group"><label for="address"><strong>Địa chỉ:</strong><br></label><input class="form-control" type="text" name="address" value="<?php echo "$address"; ?>" size="150"></div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label for="city"><strong>Tỉnh (thành phố):</strong><br></label>
                                                    <select name="quequan" class="form-control">
                                                            <option value="Chọn tỉnh">Chọn tỉnh</option>
                                                            <?php
                                                            $run_option=mysqli_query($conn,"select * from quequan");
                                                            while ($row_option=mysqli_fetch_array($run_option)){?>
                                                            <option value="<?php echo $tinh=$row_option['address'];?>" <?php if($quequan==$tinh)echo "selected";?> ><?php echo $row_option['address']; ?></option>
                                                            <?php } ?>        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label for="country"><strong>Sở thích:</strong><br></label><input class="form-control" type="text" name="hobby" class="text2" value="<?php echo "$hobby"; ?>"></div>
                                            </div>
                                        </div>
                                        <div class="form-group"><button class="btn btn-primary btn-sm" type="submit" name="save">Lưu lại</button>
                                                                <button class="btn btn-primary btn-sm" type="reset" name="reset" value="reset">Reset</button>
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
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © trinhsydu.com 2020</span></div>
        </div>
    </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>

</body>
</html>