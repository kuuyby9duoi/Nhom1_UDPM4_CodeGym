<!DOCTYPE html>
<?php include('header.php'); ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Quán Cây Nhỏ</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/slide.css">
    <style type="text/css">
        .name {font-size: 15px;color: #000;text-align: center; margin-top: -15px;}
        .sale {background-color:#ff040496;width: 35px;height: 35px;line-height: 35px;padding-left: 5px; color: #fff;font-size: 12px;position: relative;top: -200px;left: 45px;border-radius: 50%; }
    </style>
</head>
<body id="page-top">
      <div class="slideshow-container bounce animated simple-slider">
	        <div class="mySlides fade"><img src="assets/img/1.webp" style="width:100%;height:100%;"></div>
	        <div class="mySlides fade"><img src="assets/img/2.webp" style="width:100%;height:100%;"></div>
	        <div class="mySlides fade"><img src="assets/img/3.webp" style="width:100%;height:100%;"></div>
      </div>
 

      <div style="text-align:center; height: 0px; display: none;">
        <span class="dot" onclick="currentSlide(0)"></span> 
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
      </div>  
 <script>
      //khai báo biến slideIndex đại diện cho slide hiện tại
      var slideIndex;
      // KHai bào hàm hiển thị slide
      function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
             slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }

          slides[slideIndex].style.display = "block";  
          dots[slideIndex].className += " active";
          //chuyển đến slide tiếp theo
          slideIndex++;
          //nếu đang ở slide cuối cùng thì chuyển về slide đầu
          if (slideIndex > slides.length - 1) {
            slideIndex = 0
          }    
          //tự động chuyển đổi slide sau 3.5s
          setTimeout(showSlides,3500);
      }
      //mặc định hiển thị slide đầu tiên 
      showSlides(slideIndex = 0);


      function currentSlide(n) {
        showSlides(slideIndex = n);
      }
    </script>
 
 
 
 
 
 
 
 
 
    
    <div class="features-boxed">
        <div class="container swing animated">
            <div class="intro">
                <h2 class="text-center">Giảm Giá Kinh Hoàng</h2>
                <p class="text-center">Hoa rơi hữu ý, nước chảy vô tình, sinh kiếp đễ dàng, tình kiếp gian nan.</p>
            </div>
            <div class="row justify-content-center features">
            	<?php $run=mysqli_query($conn,"select * from sanpham"); $num=mysqli_num_rows($run); while($row_option=mysqli_fetch_array($run)) { ;?>
		
                <div class="col-sm-6 col-md-5 col-lg-4 item" data-bs-hover-animate="pulse">
                    <div class="box"><img src="../<?php $path=$row_option['picture']; 
													$a=explode(' ',$path);
													$pic=count($a); echo $a[0]; ?>" width="200px" height="200px" style="border-radius: 10px;">
						<div class="sale"><?php $price=$row_option['money']; $old_price=$row_option['old_price']; $sub=($price - $old_price)/$old_price * 100;      echo round($sub, 0); ?>%</div>							
                        <h3 class="name"><?php echo $row_option['name']; ?></h3>
                       <p class="money" style="color: #79a206; color: #79a206; margin: 10px 20px 25px 0px; float: left; padding-left: 40px;margin-top: 2px;"><?php    

                         echo $price; ?>VNĐ</p> <p class="old_price" style="color: #999; text-decoration: line-through; margin: 10px 20px 25px 0px;"> <?php echo $old_price; ?>VNĐ</p> <a class="learn-more" href="../shop/?id=<?php echo $row_option['produc_id']; ?>&acc=detail" rel="<?php echo $row_option['name']; ?>">Xem thêm »</a></div>
                </div>
             <?php } ?>   
            </div>
        </div>
    </div>
</body> <?php include('footer.php'); ?>
</html>
   