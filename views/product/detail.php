  <!-- Breadcrumbs -->
  <div class="breadcrumbs bounceInUp animated">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Về trang chủ" href="index.php">Trang Chủ</a><span>» </span></li>
            <li class=""> <a title="Go to Home Page" href="index.php?c=product&id=<?php echo $data[0]['catalog_id']; ?>"><?php echo $data[0]['catalog']; ?></a><span>» </span></li>
            <li class="category13"><strong><?php echo $data[0]['name']; ?></strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End -->
  <!-- Main Container -->
  <div class="main-container col1-layout">
    <div class="main container">
    <div class="col-main">
      <div class="row">
        <div class="product-view">
          <div class="product-essential">
            <form id="product_addtocart_form">
            <input type="hidden" name="id" value="<?php echo $data[0]['id']; ?>">
              <div class="product-img-box col-sm-5 col-xs-12 bounceInRight animated">
                <div class="product-image">
                  <div class="large-image">
                    <a href="products-images/<?php echo $data[0]['image_link']; ?>"  class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20">
                      <img alt="Thumbnail" src="products-images/<?php echo $data[0]['image_link']; ?>">
                    </a>
                  </div>
                  <div class="flexslider flexslider-thumb">
                    <ul class="previews-list slides">
                      <li>
                        <a href='products-images/<?php echo $data[0]['image_link']; ?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'products-images/<?php echo $data[0]['image_link']; ?>' ">
                          <img src="products-images/<?php echo $data[0]['image_link']; ?>" alt = "Thumbnail 1"/>
                        </a>
                      </li>
                      <?php $image=split(',',$data[0]['image_list']);
                            if($image[0]!='')
                            foreach ($image as $key => $value):
                      ?>
                      <li>
                        <a href='products-images/<?php echo $value; ?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'products-images/<?php echo $value; ?>' ">
                          <img src="products-images/<?php echo $value; ?>" alt = "Thumbnail 1"/>
                        </a>
                      </li>
                      <?php endforeach ?>
                    </ul>
                  </div>
                </div>
                <!-- end: more-images --> 
              </div>
              <div class="product-shop col-sm-7 col-xs-12 bounceInUp animated">
              <!-- <div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div> -->
                <div class="product-name">
                  <h1><?php echo $data[0]['name']; ?></h1>
                </div>
                <div class="short-description">
                  <?php echo $data[0]['content']; ?>
                </div>
                <div class="price-box">
                <?php if ($data[0]['discount']==0): ?>
                  <span class="regular-price"><span class="price"><?php echo number_format($data[0]['price']); ?> VNĐ</span> </span>
                <?php else: ?>
                  <p class="old-price"> <span class="price-label"></span> <span class="price"><?php echo number_format($data[0]['price']); ?> VNĐ</span> </p>
                  <p class="special-price"> <span class="price-label"></span> <span class="price"><?php echo number_format($data[0]['price']-$data[0]['discount']); ?> VNĐ</span> </p>
                <?php endif ?>
                </div>
                <div class="add-to-box">
                  <div class="add-to-cart">
                    <label for="qty">Số lượng:</label>
                    <div class="pull-left">
                      <div class="custom pull-left">
                        <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                        <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                        <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                      </div>
                    </div>
                    <button class="button btn-cart" title="Thêm Giỏ Hàng" type="submit"><span><i class="icon-basket"></i>Thêm Giỏ Hàng</span></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="related-slider col-lg-12 col-xs-12 bounceInDown animated">
            <div class="slider-items-products">
              <div class="slider-items-products">
                <div class="new_title center">
                  <h2>Sản Phẩm Liên Quan</h2>
                </div>
                  <div id="related-products-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid">
                      <?php foreach ($data_relation as $key => $value): ?>
                      <div class="item">
                        <div class="item-inner">
                          <div class="item-img">
                            <div class="item-img-info"><a href="index.php?c=product&m=detail&id=<?php echo $value['id']; ?>" title="<?php echo $value['name']; ?>" class="product-image"><img src="products-images/<?php echo $value['image_link']; ?>" alt="<?php echo $value['name']; ?>"></a>
                              <div class="item-box-hover">
                                <div class="box-inner">
                                  <div class="actions">
                                    <div class="add_cart">
                                      <form id='form-add'>
                                        <input type="hidden" name="c" value="cart">
                                        <input type="hidden" name="m" value="add">
                                        <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                                        <button class="button btn-cart" type="submit"><span>Thêm vào giỏ hàng</span></button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"><a href="index.php?c=product&m=detail&id=<?php echo $value['id']; ?>" title="<?php echo $value['name'];?>"><?php echo $value['name']; ?></a> </div>
                              <div class="item-content">
                                <div class="item-price">
                                  <div class="price-box">
                                  <?php if ($value['discount']==0): ?>
                                    <span class="regular-price"><span class="price"><?php echo number_format($value['price']); ?> VNĐ</span> </span>
                                  <?php else: ?>
                                    <p class="old-price"> <span class="price-label"></span> <span class="price"><?php echo number_format($value['price']); ?> VNĐ</span> </p>
                                    <p class="special-price"> <span class="price-label"></span> <span class="price"><?php echo number_format($value['price']-$value['discount']); ?> VNĐ</span> </p>
                                  <?php endif ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Container End -->