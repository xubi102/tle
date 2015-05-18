<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url'); ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url'); ?>/assets/css/main.css" />
  </head>
  <body class="home">
    <header>
      <div class="slider">
        <ul class="bxslider">
				  <li><img src="<?php echo bloginfo('template_url'); ?>/assets/img/img-slide.jpg" alt=""></li>
				  <li><img src="<?php echo bloginfo('template_url'); ?>/assets/img/img-slide2.jpg" alt=""></li>
				  <li><img src="<?php echo bloginfo('template_url'); ?>/assets/img/img-slide3.jpg" alt=""></li>
				  <li><img src="<?php echo bloginfo('template_url'); ?>/assets/img/img-slide4.jpg" alt=""></li>
				</ul>
      </div>
      <div class="wrap">
        <div class="logo"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/logo.png" alt="TLE"></div>
      </div>
      <div class="biglogo1"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/big-logo1.png" alt=""></div>
      <div class="biglogo2"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/big-logo2.png" alt=""></div>
      <div class="mainNav">
        <div class="wrap">
          <ul class="language">
            <li><a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/icon-en.jpg" alt="English"></a></li>
            <li><a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/icon-vi.jpg" alt="Tiếng Việt"></a></li>
          </ul>
          <?php
						wp_nav_menu( array(
							'menu'    => 'top',
							'walker'  => new themeslug_walker_nav_menu_pc()
						));
					?>
        </div>
      </div>
    </header>
    <section class="overview">
      <div class="container">
        <div class="row">
          <div class="des">Tập đoàn Thang máy thiết bị Thăng Long là doanh nghiệp hàng đầu trong lĩnh vực <span class="red">cung cấp và lắp đặt thiết bị tòa nhà</span> tại thị trường Việt Nam</div>
          <ul class="listItem">
            <li>
              <img src="<?php echo bloginfo('template_url'); ?>/assets/img/thang-may-cuon.jpg" alt="">
              <p><span>Thang máy cuốn Mitsubishi</span></p>
            </li>
            <li>
              <img src="<?php echo bloginfo('template_url'); ?>/assets/img/nhom-kinh.jpg" alt="">
              <p><span>Nhôm kính</span></p>
            </li>
            <li>
              <img src="<?php echo bloginfo('template_url'); ?>/assets/img/dieu-hoa-khong-khi.jpg" alt="">
              <p><span>Điều hòa không khí trung tâm Mitsubishi</span></p>
            </li>
            <li>
              <img src="<?php echo bloginfo('template_url'); ?>/assets/img/he-thong-quan-ly-ibms.jpg" alt="">
              <p><span>Hệ thống quản lý IBMS</span></p>
            </li>
            <li>
              <img src="<?php echo bloginfo('template_url'); ?>/assets/img/do-go-noi-that.jpg" alt="">
              <p><span>Đồ gỗ nội thất</span></p>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <section class="organize">
      <div class="container">
        <div class="row">
          <h3 class="titleSection">sơ đồ tổ chức</h3>
          <p class="des">Tập đoàn Thang máy thiết bị Thăng Long bao gồm các thành viên</p>
          <div class="col-md-3 col-lg-3">
            <div class="thumbCat">
              <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/thang-may-thiet-bi-thang-long.jpg" alt=""></a>
            </div>
            <a href="#" class="nameServices">Công ty TNHH Tập đoàn Thang máy Thiết bị Thăng Long</a>
          </div>
          <div class="col-md-3 col-lg-3">
            <div class="thumbCat">
              <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/thang-may-thiet-bi-thang-long.jpg" alt=""></a>
            </div>
            <a href="#" class="nameServices">Công ty TNHH Việt Phát Thăng Long</a>
          </div>
          <div class="col-md-3 col-lg-3">
            <div class="thumbCat">
              <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/noi-that-thanh-thang.jpg" alt=""></a>
            </div>
            <a href="#" class="nameServices">Công ty CP Sản xuất Xuất khẩu Nội thất Thành Thắng Thăng Long</a>
          </div>
          <div class="col-md-3 col-lg-3">
            <div class="thumbCat">
              <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/co-dien-thang-long.jpg" alt=""></a>
            </div>
            <a href="#" class="nameServices">Công ty CP Cơ điện Thăng Long</a>
          </div>
          <div class="col-md-2 col-lg-2 col-md-offset-5">
            <a class="btnProfile" href="#">tải profile</a>
          </div>
        </div>
      </div>
    </section>
    <section class="services">
      <div class="container">
        <div class="row">
          <h3 class="titleSection">dịch vụ</h3>
          <div class="col-md-4 col-lg-4">
            <div class="thumbCat">
              <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/thi-cong.jpg" alt=""></a>
            </div>
            <a href="#" class="nameServices">thi công lắp đặt</a>
            <p class="des">Đội ngũ kinh doanh được đào tạo chuyên nghiệp sẽ giúp khách hàng lựa chọn được sản phẩm phù hợp nhất với mục đích</p>
          </div>
          <div class="col-md-4 col-lg-4">
            <div class="thumbCat">
              <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/tu-van.jpg" alt=""></a>
            </div>
            <a href="#" class="nameServices">thi công lắp đặt</a>
            <p class="des">Năng lực tư vấn kỹ thuật của Tập đoàn đã được khẳng định trong các công trình thuộc hàng lớn nhất Việt Nam</p>
          </div>
          <div class="col-md-4 col-lg-4">
            <div class="thumbCat">
              <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/bao-hanh.jpg" alt=""></a>
            </div>
            <a href="#" class="nameServices">thi công lắp đặt</a>
            <p class="des">Đối với mỗi công trình, Tập đoàn luôn có đội ngũ kỹ thuật khảo sát kỹ lưỡng, giải đáp mọi vướng mắc của khách hàng. </p>
          </div>
        </div>
      </div>
    </section>
    <section class="culture">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-lg-10 col-offset-1">
            <p class="title1">văn hóa tle</p>
            <p class="title2">Đội ngũ nhân viên được đào tạo và nhận thức rõ về tầm quan trọng của việc đáp ứng cao nhất các yêu cầu của khách hàng.</p>
            <p class="title3">hoạt động trên nguyên tắc coi trọng và giữ gìn chữ "TÍN"</p>
          </div>
        </div>
      </div>
    </section>
    <section class="news">
      <div class="container">
        <div class="row">
          <h3 class="titleSection">tin tức</h3>
          <div class="col-md-6 col-lg-6">
            <div class="newsBox">
              <img src="<?php echo bloginfo('template_url'); ?>/assets/img/tin-noi-bo.jpg" alt="">
              <div class="titleBox1">tin nội bộ</div>
            </div>
            <div class="listBox">
              <ul>
                <li><a href="#">Lễ kỷ niệm 8/3: Tràn ngập bất ngờ và niềm vui!</a></li>
                <li><a href="#">Bán Kết 2: Khối Văn Phòng - Trung Tâm TCLĐ 1: Luân Lưu Nghiệt Ngã</a></li>
                <li><a href="#">Tranh Giải 3: Thành Thắng Thăng Long - Trung Tâm TCLĐ 1: Nghẹt Thở Ở Sân Tập SVĐ QG Mỹ Đình Tạ</a></li>
                <li><a href="#">Bán Kết 2: Khối Văn Phòng - Trung Tâm TCLĐ 1: Luân Lưu Nghiệt Ngã</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-6">
            <div class="newsBox">
              <img src="<?php echo bloginfo('template_url'); ?>/assets/img/tuyen-dung.jpg" alt="">
              <div class="titleBox2">tuyển dụng</div>
            </div>
            <div class="listBox">
              <ul>
                <li><a href="#">Tuyển dụng nhân sự tháng 04/2015</a></li>
                <li><a href="#">Chi tiết Việt Phát Thăng Long tuyển dụng nhân sự tháng 03/2015</a></li>
                <li><a href="#">Việt Phát Thăng Long Tuyển Dụng Tháng 1 </a></li>
                <li><a href="#">Văn Phòng Nha Trang Tuyển Dụng Nhân Sự Tháng 12</a></li>
                <li><a href="#">Việt Phát Thăng Long Tuyển Dụng Tháng 1 </a></li>
              </ul>
            </div>
          </div>
      </div>
    </section>
    <section class="contact">
      <div class="container">
        <div class="row">
          <h3 class="titleSection">
            Liên hệ
          </h3>
          <p class="des">Vui lòng liên hệ chúng tôi theo thông tin dưới đây</p>
          <div class="col-md-8 col-lg-8 col-md-offset-2">
            <form action="">
              <div class="row">
                <div class="col-md-4">
                  <input type="text" placeholder="Họ và tên*" />
                </div>
                <div class="col-md-4">
                  <input type="text" placeholder="Điện thoại*" />
                </div>
                <div class="col-md-4">
                  <input type="text" placeholder="Email*" />
                </div>
                <div class="col-md-12">
                  <textarea name="content" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="col-md-4">
                  <input type="text" placeholder="Nhập mã*" />
                </div>
                <div class="col-md-2 catpcha">
                  <img src="<?php echo bloginfo('template_url'); ?>/assets/img/catpcha.jpg" alt="">
                </div>
                <div class="col-md-2 pull-right">
                  <input class="send" type="submit" value="gửi đi"></input>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="ftLeft">
               <div class="logoFooter">
                  <img src="<?php echo bloginfo('template_url'); ?>/assets/img/logo2.jpg" alt="">
                </div>
                <div class="info">
                  <span class="infoItem">
                    Địa chỉ trụ sở: số 44 - Hào Nam - Quận Đống Đa - Hà Nội
                  </span>
                  <span class="infoItem">
                    Điện thoại: +84-4.39783799 | Fax :  +84-4.39783799
                  </span>
                  <span class="infoItem">
                    Email: thanglongelevator@tle.com.vn
                  </span>
                </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 box2">
            <div class="ftRIght">
              <div class="copyright">
                Copyright@2013 TLE. All right reserved
              </div>
              <div class="social">
                <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/fb.jpg" alt="fb"></a>
                <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/tw.jpg" alt="tw"></a>
                <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/gg.jpg" alt="gg"></a>
                <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/link.jpg" alt="link"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </body>
  
<script type='text/javascript' src='<?php echo bloginfo('template_url'); ?>/assets/js/jquery-1.10.2.min.js'></script>
<script type='text/javascript' src='<?php echo bloginfo('template_url'); ?>/assets/js/jquery.bxslider.min.js'></script>
<script type='text/javascript' src='<?php echo bloginfo('template_url'); ?>/assets/js/main.js'></script>
</html>