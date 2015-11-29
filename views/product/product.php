  <!-- Breadcrumbs -->
  <div class="breadcrumbs bounceInUp animated">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Đến Trang Chủ" href="index.php">Trang Chủ</a><span>» </span></li>
            <?php if (!empty($catalog)): ?>
              <?php if ($catalog[0]['parent_id']!=0): ?>
                <li class=""> <a title="Đến trang <?php echo $catalog[0]['name_parent']; ?>" href="index.php?c=product&id=<?php echo $catalog[0]['parent_id']; ?>"><?php echo $catalog[0]['name_parent']; ?></a><span>» </span></li>
                <li class="category13"><strong><?php echo $catalog[0]['name']; ?></strong></li>
              <?php else: ?>
                <li class="category13"><strong><?php echo $catalog[0]['name']; ?></strong></li>
              <?php endif ?>
            <?php else: ?>
                <li class="category13"><strong>Sản Phẩm</strong></li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End -->
  <!-- Main Container -->
  <section class="main-container col2-left-layout bounceInUp animated">
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h2><?php echo !empty($catalog)?$catalog[0]['name']:'Sản Phẩm'; ?></h2>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-main col-sm-9 col-sm-push-3">
        <article class="col-main">
          <div class="category-description std">
            <div class="slider-items-products">
              <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col1 owl-carousel owl-theme"> 
                    <!-- Item -->
                    <div class="item"> <a href="#x"><img alt="" src="images/women_banner.png"></a>
                      <div class="cat-img-title cat-bg cat-box">
                        <h2 class="cat-heading"><strong>BANNER</strong><br></h2>
                          <p>Treo Cho Đẹp :D</p>
                      </div>
                    </div>
                    <div class="item"> <a href="#x"><img alt="" src="images/women_banner1.png"></a>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="category-products">
            <ul class="products-grid">
              <?php foreach ($data as $key => $value): ?>
                <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
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
                  </li>
              <?php endforeach ?>
            </ul>
          </div>
          <div class="toolbar">
              <div class="pager">
                <div class="pages">
                  <?php echo $page; ?>
                </div>
              </div>
          </div>
          </article>
          <!--  ///*///======    End article  ========= //*/// --> 
        </div>
        <div class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
          <aside class="col-left sidebar">
          <div class="side-nav-categories">
              <div class="block-title"> Danh Mục </div>
              <div class="box-content box-category">
                <ul>
                  <?php $menu=model('catalog')->catalog('WHERE parent_id=0');
                        foreach ($menu as $key => $value):
                  ?>
                    <li> <a <?php if(!empty($_GET['id'])) echo $value['id']==$_GET['id']?'class="active"':''; ?> href="index.php?c=product&id=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a> <span <?php if(!empty($_GET['id'])) echo $value['id']==$_GET['id']?'class="subDropdown minus"':'class="subDropdown plus"'; else echo 'class="subDropdown plus"'; ?> ></span>
                      <ul class="level0_415" style="display:block">
                        <?php $menu=model('catalog')->catalog('WHERE parent_id='.$value['id']);
                          foreach ($menu as $key => $value):
                        ?>
                        <li> <a href="index.php?c=product&id=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a> <span class="subDropdown plus"></span>
                          <ul class="level1" style="display:none">
                            <?php $menu=model('catalog')->catalog('WHERE parent_id='.$value['id']);
                              foreach ($menu as $key => $value):
                            ?>
                              <li> <a href="index.php?c=product&id=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a> </li>
                            <?php endforeach ?>
                          </ul>
                          <!--level1--> 
                        </li>
                        <?php endforeach ?>
                      </ul>
                    </li>
                  <?php endforeach ?>
                </ul>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>
  <!-- Main Container End --> 