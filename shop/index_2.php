<!DOCTYPE html>
<?php 
include('../header.php'); require_once('../connect.php'); 
ob_start();$sl=$_GET['sldong'];  $page=$_GET['page'];  ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Shop</title>
    <style type="text/css">

.product {width: 200px; height: 200px;  float: left; margin-left: 50px; border:#000 1px solid;border-bottom: none;border-right: none; }
.product img:hover {transform: scale(1.2); opacity: 8; filter: alpha(opacity=50);border-right: #000 1px solid;}
.name {font-size: 15px;color: #000;text-align: center; margin-top: -15px;}

.money {font-size: 13px; color: #79a206; margin: 10px 20px 25px 0px; float: left;margin-top: 5px;}
.old_price{color: #999; font-size: 13px; text-decoration: line-through; margin: 10px 20px 25px 0px;}
.sale {background-color:#ff040496;width: 40px;height: 30px;line-height: 30px;padding-left: 5px; color: #fff;font-size: 13px;position: relative;top: -200px;left: 0px;border-bottom-right-radius: 10px; }
</style>
</head>

<body id="page-top">
    <div id="wrapper"  >
      
        <div class="d-flex flex-column" id="content-wrapper" >
            <div id="content">
               
            <div class="container-fluid" >
                


                <div class="card shadow" >
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Sản phẩm:</p>
                          
                          
                    </div>
                    <div class="card-body" >
                        <div class="row" style="height: 60px;">

                         <form method="get">
                            <div class="col-md-6 text-nowrap">
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Số dòng hiển thị:&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm" name="sldong" style="z-index: -1000;"><option value="5" <?php if($sl==5) echo "selected"; ?>>5</option><option value="10" <?php if($sl==10) echo "selected"; ?>>10</option><option value="15" <?php if($sl==15) echo "selected"; ?>>15</option><option value="20" <?php if($sl==20) echo "selected"; ?>>20</option><option value="25" <?php if($sl==25) echo "selected"; ?>>25</option><option value="50" <?php if($sl==50) echo "selected"; ?>>50</option><option value="100" <?php if($sl==100) echo "selected"; ?>>100</option></select>&nbsp;</label></div>

                               








                                <button type="submit" name="page" class="btn btn-primary btn-sm" value="1" style="position:relative;bottom: 40px;left: 1100px;">Tìm kiếm</button>
                            </div>
                         </form>

                            <div class="col-md-6" style="margin-left: -500px;">
                                <div class="text-md-right dataTables_filter" id="dataTable_filter">


 <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><p style="display: inline;position: relative;top: -27px;"> Danh mục:   &nbsp; </p><label>
                                    <select name="category" class="form-control form-control-sm custom-select custom-select-sm" title="chọn danh mục sản phẩm">
                                    <option value="Cây trong nhà" selected>Cây trong nhà</option>
                                    <option value="Cây ngoài trời">Cây ngoài trời</option>
                                    <option value="Cây để bàn">Cây để bàn</option>
                                    <option value="Cây mini">Cây mini</option>
                                    <option value="Cây thủy canh">Cây thủy canh</option>
                                    <option value="Cây công trình">Cây công trình</option>
                                    <option value="Phân bón">Phân bón</option>
                                    <option value="Chậu">Chậu</option>
                                    </select>

                                &nbsp;</label></div>
<p style="position: relative;bottom: 60px; left: 1000px; width: 150px; "> Tên sản phẩm:</p>
                                <label style="position: relative;bottom: 105px; left: 450px;"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Từ khóa"></label> </div>
                            </div>
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info" style="height: 800px;">
                           





<?php $run=mysqli_query($conn,"select * from sanpham"); $num=mysqli_num_rows($run); if($page==1) {$start=0; } else {$start=$page*$sl-$sl;}  ; 
                $run2=mysqli_query($conn,"select * from sanpham limit $start,$sl"); while($row_option=mysqli_fetch_array($run2)) { ;?>
    <a href="../shop/?id=<?php echo $row_option['produc_id']; ?>&acc=detail" rel="<?php echo $row_option['name']; ?>">
        <div class="product" style="margin-bottom: 80px;"><div><img src="../<?php $path=$row_option['picture']; 
                                                    $a=explode(' ',$path);
                                                    $pic=count($a); echo $a[0]; ?>" width="200px" height="200px" style="transition: transform .2s;">
                                                    <div class="sale"><?php $price=$row_option['money']; $old_price=$row_option['old_price']; $sub=($price - $old_price)/$old_price * 100;      echo round($sub, 0); ?>%</div> </div></a>
        <h2 class="name"><?php echo $row_option['name']; ?></h2>
        <h2 class="money"><?php echo $price; ?>VNĐ</h2>
        <div class="old_price"><?php echo $old_price; ?>VNĐ</div>
                  
</div>
<?php } ?>


                       
                    </div>
                </div><div class="row">
                            <div class="col-md-6 align-self-center">
                                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite" style="padding-left: 10px;"><?php if($sl>$num) echo "Hiển thị $num của $num product";
                                           else echo "Hiển thị $sl của $num product";
                                     ?>
                                </p>
                            </div>
                            <div class="col-md-6" style="padding-right: 20px;">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                   
                                        <?php $cc=ceil($num/$sl); for ($j=1; $j <= $cc; $j++) { echo "<li class='page-item'><a class='page-link' href='index_2.php?sldong=$sl&page=$j'>$j</a></li>";}
                                         ?>
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                    </ul>
                                </nav>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <?php include('../footer.php'); ?>
</body>

</html>
















