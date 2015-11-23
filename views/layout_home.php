<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons Icon -->
<link rel="icon" href="http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico" type="image/x-icon" />
<title><?php echo $title; ?></title>

<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS Style -->
<link rel="stylesheet" type="text/css" href="./styles/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./styles/css/font-awesome.css" media="all">
<link rel="stylesheet" type="text/css" href="./styles/css/animate.css" media="all">
<link rel="stylesheet" type="text/css" href="./styles/css/revslider.css" >
<link rel="stylesheet" type="text/css" href="./styles/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="./styles/css/owl.theme.css">
<link rel="stylesheet" type="text/css" href="./styles/css/jquery.mobile-menu.css">
<link rel="stylesheet" type="text/css" href="./styles/css/style.css" media="all">
<link rel="stylesheet" type="text/css" href="./styles/css/blogmate.css">
<link rel="stylesheet" type="text/css" href="./styles/css/flexslider.css">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,700,900' rel='stylesheet' type='text/css'>
</head>

<body class="cms-index-index cms-home-page">
<div id="page"> 
  <!-- Header -->
  <header>
    <div class="header-container">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-xs-12"> 
            <!-- Header Logo -->
            <div class="logo"><a title="Blog Thực Tập" href="index.php"><img alt="Blog Thực Tập" src="./images/logo.png"></a></div>
            <!-- End Header Logo --> 
          </div>
          <div class="col-lg-9 col-xs-12 right_menu">
            <div class="toplinks"> 
              <!-- Default Welcome Message -->
              <div class="welcome-msg hidden-xs"><?php echo isset($_SESSION['name'])?$_SESSION['name']:''; ?></div>
              <!-- End Default Welcome Message -->
              <?php if(!empty($_SESSION['name'])){ ?>
                <div class="dropdown" style='display:inline-block'>
                    <a class='dropdown-toggle' data-toggle="dropdown"><span class="hidden-xs">Quản Lý</span></a>
                    <ul class="dropdown-menu">
                      <li><a href="admin.php">Admin</a></li>
                      <li><a href="index.php?c=logout">Đăng Xuất</a></li>
                    </ul>
                </div>
              <?php } ?>
              <div class="links">
                <div><a title="Checkout" href="index.php?c=cart"><span class="hidden-xs">Xuất Giỏ Hàng</span></a></div>
                <div><a title="Blog" href="index.php?c=blog"><span class="hidden-xs">Bài Viết</span></a></div>
                <?php if(empty($_SESSION['name'])){ ?>
                  <div class="login"><a href="index.php?c=login"><span class="hidden-xs">Đăng Nhập</span></a></div> 
                <?php } ?>
              </div>
              <!-- links -->
            </div>
            <!-- Search-col -->
            <div class="search-box pull-right">
              <form action="http://htmldemo.magikcommerce.com/ecommerce/classic-html-template/version_3/cat" method="POST" id="search_mini_form" name="Categories">
                <input type="text" placeholder="Search entire store here..." maxlength="70" name="search" id="search">
                <button type="button" class="search-btn-bg"><span class="glyphicon glyphicon-search"></span>&nbsp;</button>
              </form>
            </div>
            <!-- End Search-col -->
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- end header -->
  <div class="mm-toggle-wrap">
    <div class="mm-toggle"><i class="icon-align-justify"></i><span class="mm-label">Menu</span> </div>
  </div>
  <!-- Navbar -->
  <nav>
    <div class="container">
      <div class="row">
        <div class="nav-inner col-lg-12">
          <ul id="nav" class="hidden-xs">
            <li class="level0 parent drop-menu active"><a href="index.php"><span>Trang chủ</span></a></li>
            <?php $menu=model('catalog')->catalog('WHERE parent_id=0');
                  foreach ($menu as $key => $value):
            ?>
              <li class="mega-menu"><a href="index.php?c=product&id=<?php echo $value['id']; ?>" class="level-top"><span><?php echo $value['name']; ?></span></a>
                <div  style="left: 0px; display: none;" class="level0-wrapper dropdown-6col">
                  <div class="container">
                    <div class="level0-wrapper2">
                      <div class="nav-block nav-block-center">
                        <ul class="level0">
                          <?php
                                $menu=model('catalog')->catalog('WHERE parent_id='.$value['id']);
                                foreach ($menu as $key => $value): 
                          ?>
                            <li class="level1 nav-6-1 parent item"><a href="index.php?c=product&id=<?php echo $value['id']; ?>" class=""><span><?php echo $value['name']; ?></span></a>
                              <ul class="level1">
                              <?php
                                $menu=model('catalog')->catalog('WHERE parent_id='.$value['id']);
                                foreach ($menu as $key => $value): 
                              ?>
                                <li class="level2 nav-6-1-1"><a href="index.php?c=product&id=<?php echo $value['id']; ?>"><span><?php echo $value['name']; ?></span></a></li>
                              <?php endforeach ?>
                              </ul>
                            </li>
                          <?php endforeach ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            <?php endforeach ?>
            <li class="mega-menu"><a href="index.php?c=blog" class="level-top"><span>Bài Viết</span></a>
            </li>
          </ul>
          <div class="menu_top">
            <div class="top-cart-contain pull-right"> 
              <!-- Top Cart -->
              <div class="mini-cart">
                <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle">
                  <a href="#">
                    <span class="hidden-xs">Giỏ Hàng (<?php echo empty($_SESSION['total_qty'])?0:$_SESSION['total_qty'] ?>)
                    </span>
                  </a>
                </div>
                <div>
                  <?php if (!empty($_SESSION['cart'])): ?>
                    <div class="top-cart-content" style="display: none;">
                      <div class="block-subtitle">
                        <div class="top-subtotal"><?php echo $_SESSION['total_qty']; ?> Sản Phẩm
                          <span class="price"><?php echo number_format($_SESSION['total']); ?> VNĐ</span> 
                        </div>
                        <!--top-subtotal-->
                      </div>
                      <!--block-subtitle-->
                      <ul class="mini-products-list" id="cart-sidebar">
                      <?php foreach ($_SESSION['cart'] as $key => $value): ?>
                        <li class="item first">
                          <div class="item-inner"><a class="product-image" title="<?php echo $value['name']; ?>" href="index.php?c=product&m=detail&id=<?php echo $key; ?>"><img alt="<?php echo $value['name']; ?>" src="./products-images/<?php echo $value['image_link']; ?>"></a>
                            <div class="product-details">
                              <div class="access">
                                <form id='form-del'>
                                  <input type="hidden" name="c" value="cart">
                                  <input type="hidden" name="m" value="delete">
                                  <input type="hidden" name="id" value="<?php echo $key; ?>">
                                  <button class="btn-remove1" title="Xóa" type='submit'>Xóa</button>
                                </form>
                              </div>
                              <strong><?php echo $value['qty']; ?></strong> x <span class="price"><?php echo number_format($value['price']); ?></span>
                              <p class="product-name"><a href="index.php?c=product&m=detail&id=<?php echo $key; ?>"><?php echo $value['name']; ?></a></p>
                            </div>
                          </div>
                        </li>
                      <?php endforeach ?>
                      </ul>
                      <div class="actions">
                        <button class="btn-checkout" onclick="window.location.href='index.php?c=cart'" title="Xuất Giỏ Hàng" type="button"><span>Xuất Giỏ Hàng</span></button>
                      </div>
                      <!--actions--> 
                    </div>
                  <?php endif ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- end nav -->
  <div id='ajax_table'>
    <?php include ROOT . DS . 'views' . DS . $template_file; ?>
  </div>
</div>

  <!-- Footer -->
  <footer>
    <section class="footer-navbar">
      <div class="footer-inner">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-xs-12 col-lg-8">
              <div class="footer-column pull-left collapsed-block">
                <h4>Thông Tin Shop<a class="expander visible-xs" href="#TabBlock-1">+</a></h4>
                <div class="tabBlock" id="TabBlock-1">
                  <!-- <ul class="links">
                    <li class="first"><a href="#" title="How to buy">How to buy</a></li>
                    <li><a href="faq.html" title="FAQs">FAQs</a></li>
                    <li><a href="#" title="Payment">Payment</a></li>
                    <li><a href="#" title="Shipment&lt;/a&gt;">Shipment</a></li>
                    <li><a href="#" title="Where is my order?">Where is my order?</a></li>
                    <li class="last"><a href="#" title="Return policy">Return policy</a></li>
                  </ul> -->
                </div>
              </div>
              <div class="footer-column pull-left collapsed-block">
                <h4>Thông Tin Shop<a class="expander visible-xs" href="#TabBlock-2">+</a></h4>
                <div class="tabBlock" id="TabBlock-2">
                 <!--  <ul class="links">
                    <li class="first"><a title="Your Account" href="login.html">Your Account</a></li>
                    <li><a title="Information" href="#">Information</a></li>
                    <li><a title="Addresses" href="#">Addresses</a></li>
                    <li><a title="Addresses" href="#">Discount</a></li>
                    <li><a title="Orders History" href="#">Orders History</a></li>
                    <li class="last"><a title=" Additional Information" href="#">Additional Information</a></li>
                  </ul> -->
                </div>
              </div>
              <div class="footer-column pull-left collapsed-block">
                <h4>Thông  Tin Shop<a class="expander visible-xs" href="#TabBlock-3">+</a></h4>
                <div class="tabBlock" id="TabBlock-3">
                 <!--  <ul class="links">
                    <li class="first"><a href="#" title="privacy policy">Privacy policy</a></li>
                    <li><a href="#" title="Search Terms">Search Terms</a></li>
                    <li><a href="#" title="Advanced Search">Advanced Search</a></li>
                    <li><a href="contact_us.html" title="Contact Us">Contact Us</a></li>
                    <li><a href="#" title="Suppliers">Suppliers</a></li>
                    <li class=" last"><a href="#" title="Our stores" class="link-rss">Our stores</a></li>
                  </ul> -->
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-lg-4">
              <div class="footer-column-last">
                <div class="newsletter-wrap collapsed-block">
                  <h4>Đăng Ký Email<a class="expander visible-xs" href="#TabBlock-4">+</a></h4>
                  <!-- <div class="tabBlock" id="TabBlock-4">
                    <form id="newsletter-validate-detail" method="post" action="#">
                      <div id="container_form_news">
                        <div id="container_form_news2">
                          <input type="text" class="input-text required-entry validate-email" value="Enter your email address" onfocus=" this.value='' " title="Sign up for our newsletter" id="newsletter" name="email">
                          <button class="button subscribe" title="Subscribe" type="submit"><span>Theo dõi</span></button>
                        </div>
                      </div>
                    </form>
                  </div> -->
                </div>
                <div class="social">
                  <h4>Mạng Xã Hội</h4>
                  <ul class="link">
                    <li class="fb pull-left"><a href="#"></a></li>
                    <li class="tw pull-left"><a href="#"></a></li>
                    <li class="googleplus pull-left"><a href="#"></a></li>
                    <li class="rss pull-left"><a href="#"></a></li>
                    <li class="pintrest pull-left"><a href="#"></a></li>
                    <li class="linkedin pull-left"><a href="#"></a></li>
                    <li class="youtube pull-left"><a href="#"></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-middle">
        <div class="container">
          <div class="row">
            <div style="text-align:center"><a href="index.html"><img src="./images/footer-logo.png" alt="footer-logo"></a></div>
            <address>
            <i class="icon-location-arrow"></i> Địa Chỉ <i class="icon-mobile-phone"></i><span> Điện Thoại</span> <i class="icon-envelope"></i><a href="mailto:minhtri.ltv@gmail.com">Email</a>
            </address>
          </div>
        </div>
      </div>
      <!--Theme của người khác :D-->
      <!-- <div class="footer-bottom">
        <div class="container">
          <div class="row">
            <div class="col-sm-5 col-xs-12 coppyright">&copy; 2015 Magikcommerce. All Rights Reserved.</div>
            <div class="col-sm-7 col-xs-12 company-links">
              <ul class="links">
                <li><a title="Magento Themes" href="#">Magento Themes</a></li>
                <li><a title="Premium Themes" href="#">Premium Themes</a></li>
                <li><a title="Responsive Themes" href="#">Responsive Themes</a></li>
                <li class="last"><a title="Magento Extensions" href="#">Magento Extensions</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div> -->
    </section>
  </footer>

<div id="mobile-menu">
  <ul>
    <li> </li>
    <li>
      <div class="home"><a href="index.php"><i class="icon-home"></i>Trang Chủ</a> </div>
    </li>
    <?php $menu=model('catalog')->catalog('WHERE parent_id=0');
          foreach ($menu as $key => $value):
    ?>
          <li><a  href="index.php?c=product&id=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a>
            <ul>
              <?php $menu=model('catalog')->catalog('WHERE parent_id='.$value['id']);
                    foreach ($menu as $key => $value):
              ?>
                <li> <a href="index.php?c=product&id=<?php echo $value['id']; ?>" class=""><?php echo $value['name']; ?></a>
                  <ul>
                    <?php $menu=model('catalog')->catalog('WHERE parent_id='.$value['id']);
                          foreach ($menu as $key => $value):
                    ?>
                       <li class="level2 nav-6-1-1"><a href="index.php?c=product&id=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></li>
                    <?php endforeach ?>
                  </ul>
                </li>
              <?php endforeach ?>
            </ul>
          </li>
    <?php endforeach ?>
    <li><a href="index.php?c=blog">Bài Viết</a></li>
  </ul>
</div>

<!-- End Footer --> 
<!-- JavaScript --> 
<script type="text/javascript" src="./styles/js/jquery.min.js"></script> 
<script type="text/javascript" src="./styles/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="./styles/js/parallax.js"></script> 
<script type="text/javascript" src="./styles/js/revslider.js"></script> 
<script type="text/javascript" src="./styles/js/common.js"></script>
<script type="text/javascript" src="./styles/js/jquery.flexslider.js"></script> 
<script type="text/javascript" src="./styles/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="./styles/js/cloud-zoom.js"></script> 
<script type="text/javascript" src="./styles/js/jquery.mobile-menu.min.js"></script>
<!-- Validate -->
<script src="./styles/js/jquery.validate.min.js"></script>
<script src="./styles/js/additional-methods.min.js"></script>
<script type='text/javascript'>
jQuery(document).ready(function(){
jQuery('#rev_slider_4').show().revolution({
dottedOverlay: 'none',
delay: 5000,
startwidth: 1170,
startheight: 650,

hideThumbs: 200,
thumbWidth: 200,
thumbHeight: 50,
thumbAmount: 2,

navigationType: 'thumb',
navigationArrows: 'solo',
navigationStyle: 'round',

touchenabled: 'on',
onHoverStop: 'on',

swipe_velocity: 0.7,
swipe_min_touches: 1,
swipe_max_touches: 1,
drag_block_vertical: false,

spinner: 'spinner0',
keyboardNavigation: 'off',

navigationHAlign: 'center',
navigationVAlign: 'bottom',
navigationHOffset: 0,
navigationVOffset: 20,

soloArrowLeftHalign: 'left',
soloArrowLeftValign: 'center',
soloArrowLeftHOffset: 20,
soloArrowLeftVOffset: 0,

soloArrowRightHalign: 'right',
soloArrowRightValign: 'center',
soloArrowRightHOffset: 20,
soloArrowRightVOffset: 0,

shadow: 0,
fullWidth: 'on',
fullScreen: 'off',

stopLoop: 'off',
stopAfterLoops: -1,
stopAtSlide: -1,

shuffle: 'off',

autoHeight: 'off',
forceFullWidth: 'on',
fullScreenAlignForce: 'off',
minFullScreenHeight: 0,
hideNavDelayOnMobile: 1500,

hideThumbsOnMobile: 'off',
hideBulletsOnMobile: 'off',
hideArrowsOnMobile: 'off',
hideThumbsUnderResolution: 0,

hideSliderAtLimit: 0,
hideCaptionAtLimit: 0,
hideAllCaptionAtLilmit: 0,
startWithSlide: 0,
fullScreenOffsetContainer: ''
});
});

</script>
<script>
  $(document).ready(function() {
      $.validator.addMethod("onechar", function(value, element) {
        return this.optional( element ) || /(?!^[0-9]*$)^([a-zA-Z0-9_aáàảãạăắằẳẵặâấầẩẫậeéèẻẽẹêếềểễệiíìỉĩịoóòỏõọôốồổỗộơớờởỡợuúùủũụưứừửữựyýỳỷỹỵdđAÁÀẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬEÉÈẺẼẸÊẾỀỂỄỆIÍÌỈĨỊOÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢUÚÙỦŨỤƯỨỪỬỮỰYÝỲỶỸỴDĐ\s\.\/\,]+)$/.test( value );
      }, 'Có ít nhất một ký tự chữ cái');

      $('#ajax_table').on('submit','#form-add',function(e){
            e.preventDefault();
            var dataform = new FormData(this);
            $.ajax({
                url:window.location.origin+window.location.pathname,
                type:'post',
                data:dataform,
                dataType:'json',
                cache: false,
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
                success:function(json){
                  $(document).find('.mini-cart').html(json.data_mini);
                  switch(window.location.search.split('=')[1]) {
                      case 'cart':
                          $('#ajax_table').html(json.data);
                          $('#form-info-transaction').info_transaction();
                          break;
                  }
                },
                error : function(xhr, status,error){
                    console.log("Loi " + error + " thi mot fix sau");
                }
            });
        });
        $('#ajax_table').on('submit','#product_addtocart_form',function(e){
            e.preventDefault();
            var dataform = new FormData(this);
            dataform.append('c','cart');
            dataform.append('m','add');
            $.ajax({
                url:window.location.origin+window.location.pathname,
                type:'post',
                data:dataform,
                dataType:'json',
                cache: false,
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
                success:function(json){
                  $(document).find('.mini-cart').html(json.data_mini);
                  switch(window.location.search.split('=')[1]) {
                      case 'cart':
                          $('#ajax_table').html(json.data);
                          $('#form-info-transaction').info_transaction();
                          break;
                  }
                },
                error : function(xhr, status,error){
                    console.log("Loi " + error + " thi mot fix sau");
                }
            });
        });
        $(document).on('submit','#form-del',function(e){
            e.preventDefault();
            var dataform = new FormData(this);
            if(confirm('Bạn có muốn xóa')){
              $.ajax({
                  url:window.location.origin+window.location.pathname,
                  type:'post',
                  data:dataform,
                  dataType:'json',
                  cache: false,
                  contentType: false,
                  processData: false,
                  enctype: "multipart/form-data",
                  success:function(json){
                    $(document).find('.mini-cart').html(json.data_mini);
                    switch(window.location.search.split('=')[1]) {
                        case 'cart':
                            $('#ajax_table').html(json.data);
                            $('#form-info-transaction').info_transaction();
                            break;
                    }
                  },
                  error : function(xhr, status,error){
                      console.log("Loi " + error + " thi mot fix sau");
                  }
              });
            }
        });
        $('#ajax_table').on('submit','#form-update',function(e){
            e.preventDefault();
            var dataform = new FormData(this);
            $.ajax({
                url:window.location.origin+window.location.pathname,
                type:'post',
                data:dataform,
                dataType:'json',
                cache: false,
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
                success:function(json){
                  $(document).find('.mini-cart').html(json.data_mini);
                  switch(window.location.search.split('=')[1]) {
                      case 'cart':
                          $('#ajax_table').html(json.data);
                          $('#form-info-transaction').info_transaction();
                          break;
                  }
                },
                error : function(xhr, status,error){
                    console.log("Loi " + error + " thi mot fix sau");
                }
            });
        });
        $('#ajax_table').on('submit','#form-info-transaction',function(e){
            e.preventDefault();
            var dataform = new FormData(this);
            dataform.append('c','cart');
            dataform.append('m','add_order')
            $.ajax({
                url:window.location.origin+window.location.pathname,
                type:'post',
                data:dataform,
                dataType:'text',
                cache: false,
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
                success:function(){
                  window.location.href='index.php';
                },
                error : function(xhr, status,error){
                    console.log("Loi " + error + " thi mot fix sau");
                }
            });
        });
        $('#ajax_table').on('click','#empty_cart_button',function(e){
            var dataform = new FormData();
            dataform.append('c','cart');
            dataform.append('m','delete_all');
            if(confirm('Bạn có muốn xóa')){
              $.ajax({
                  url:window.location.origin+window.location.pathname,
                  type:'post',
                  data:dataform,
                  dataType:'json',
                  cache: false,
                  contentType: false,
                  processData: false,
                  enctype: "multipart/form-data",
                  success:function(json){
                    $(document).find('.mini-cart').html(json.data_mini);
                    switch(window.location.search.split('=')[1]) {
                        case 'cart':
                            $('#ajax_table').html(json.data);
                            $('#form-info-transaction').info_transaction();
                            $
                            break;
                    }
                  },
                  error : function(xhr, status,error){
                      console.log("Loi " + error + " thi mot fix sau");
                  }
              });
            }
        });
        $('#ajax_table').on('click','#del',function(e){
            var dataform = new FormData();
            dataform.append('c','cart');
            dataform.append('m','delete');
            dataform.append('id',$('#ajax_table').find('#del').data('key'));
            if(confirm('Bạn có muốn xóa')){
              $.ajax({
                  url:window.location.origin+window.location.pathname,
                  type:'post',
                  data:dataform,
                  dataType:'json',
                  cache: false,
                  contentType: false,
                  processData: false,
                  enctype: "multipart/form-data",
                  success:function(json){
                    $(document).find('.mini-cart').html(json.data_mini);
                    switch(window.location.search.split('=')[1]) {
                        case 'cart':
                            $('#ajax_table').html(json.data);
                            $('#form-info-transaction').info_transaction();
                            break;
                    }
                  },
                  error : function(xhr, status,error){
                      console.log("Loi " + error + " thi mot fix sau");
                  }
              });
            }
        });
      $(document).find('#form-login').validate({
          rules: {
              user: {
                  required: true,
                  minlength: 4,
                  onechar:true,
              },
              pass: {
                  required: true,
                  minlength: 6,
              },
          },
          messages: {
              user: {
                  required: "Xin hãy user",
                  minlength: "User ít nhất có 4 ký tự"
              },
              pass: {
                  required: "Xin hãy pass",
                  minlength: "Password ít nhất có 6 ký tự"
              },
          },
          showErrors: function (errorMap, errorList) {
              $.each(this.successList, function (index, value) {
                  $('#'+value.id+'').parent().removeClass("has-error");
                  $('#'+value.id+'').popover('destroy');
              });
              $.each(this.errorList, function (index, value) {
                  $('#'+value.element.id+'').parent().addClass("has-error");
                  $('#'+value.element.id+'').popover('destroy');
                  $('#'+value.element.id+'').popover({
                      content:value.message,
                      template:'<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-content"></div></div>',
                      placement: 'top',
                      trigger: 'manual',
                  }).popover('show');
                  setTimeout(function(){ $('#'+value.element.id+'').popover('hide'); },2000);
              });
          }
      });
      $.fn.info_transaction=function(){
        $(this).validate({
          rules: {
              txtName: {
                  required: true,
                  minlength: 4,
                  onechar:true,
              },
              txtPhone: {
                  required: true,
                  minlength: 9,
                  maxlength: 11,
              },
              txtEmail: {
                  required: true,
                  email:true,
              },
              txtAddress: {
                  required: true,
                  minlength: 20,
                  onechar:true,
              },
          },
          messages: {
              txtName: {
                  required: 'Xin Nhập Họ Tên',
                  minlength: 'Có Ít Nhất 4 Ký Tự',
                  onechar:'Có Ít Nhất 1 Ký Tự Chữ Cái',
              },
              txtPhone: {
                  required: 'Xin Nhập Điện Thoại',
                  minlength: 'Số Giới Hạn Từ 9-11',
                  maxlength: 'Số Giới Hạn Từ 9-11',
              },
              txtEmail: {
                  required: 'Xin Nhập Email',
                  email:'Email Sai',
              },
              txtAddress: {
                  required: 'Xin Nhập Địa Chỉ',
                  minlength: 'Có Ít Nhất 20 Ký Tự',
                  onechar:'Có Ít Nhất 1 Ký Tự Chữ Cái',
              },
          },
          showErrors: function (errorMap, errorList) {
              $.each(this.successList, function (index, value) {
                  $('#'+value.id+'').parent().removeClass("has-error");
                  $('#'+value.id+'').popover('destroy');
              });
              $.each(this.errorList, function (index, value) {
                  $('#'+value.element.id+'').parent().addClass("has-error");
                  $('#'+value.element.id+'').popover('destroy');
                  $('#'+value.element.id+'').popover({
                      content:value.message,
                      template:'<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-content"></div></div>',
                      placement: 'top',
                      trigger: 'manual',
                  }).popover('show');
                  setTimeout(function(){ $('#'+value.element.id+'').popover('hide'); },2000);
              });
          }
        });
      };
      $('#form-info-transaction').info_transaction();
       $(window).resize(function() {
          if($('.img_news').length)
            $('.img_news').attr('height',$('.img_news').css('width').replace(/[^-\d\.]/g, '')*0.66);
          if($('.item-img-info').length)
            $('.item-img-info a.product-image img').attr('height',$('.item-img-info').css('width').replace(/[^-\d\.]/g, '')*1.22);
        });
       $.fn.img_resize=function(){
          if($('.img_news').length)
            $('.img_news').attr('height',$('.img_news').css('width').replace(/[^-\d\.]/g, '')*0.66);
          if($('.item-img-info').length)
            $('.item-img-info a.product-image img').attr('height',$('.item-img-info').css('width').replace(/[^-\d\.]/g, '')*1.22);
        };
        $('#ajax_table').img_resize();
  });
  </script>
</body>

</html>
