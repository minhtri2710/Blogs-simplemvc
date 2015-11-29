<section class="main-container col1-layout wow bounceInUp animated">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
            <div class="page-title">
                <h2>Giỏ Hàng</h2>
            </div>
            <?php if (!empty($_SESSION['cart'])): ?>
                <div class="table-responsive">
                <form id='form-update'>
                    <fieldset>
                        <table class="data-table cart-table" id="shopping-cart-table">
                          <thead>
                            <tr class="first last">
                              <th rowspan="1">&nbsp;</th>
                              <th rowspan="1"><span class="nobr">Tên Sản Phẩm</span></th>
                              <th colspan="1" class="a-center"><span class="nobr">Giá</span></th>
                              <th class="a-center " rowspan="1">Số Lượng</th>
                              <th colspan="1" class="a-center">Tổng Giá</th>
                              <th class="a-center" rowspan="1">&nbsp;</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr class="first last">
                                <td class="a-right last" colspan="6">
                                    <button class="button btn-continue" onclick="window.location.href='index.php'" title="Tiếp Tục" type="button"><span>Tiếp Tục</span></button>
                                    <button class="button btn-update" title="Cập Nhật" value="update_cart" name="update_cart_action" type="submit"><span>Cập Nhật</span></button>
                                    <button id="empty_cart_button" class="button" title="Xóa Giỏ Hàng" type="button"><span>Xóa Giỏ Hàng</span></button>
                                </td>
                            </tr>
                          </tfoot>
                          <tbody>
                            <?php 
                                $total='';
                                foreach ($_SESSION['cart'] as $key => $value): ?>
                                <tr class="first odd">
                                  <td class="image"><a class="product-image" title="<?php echo $value['name']; ?>" href="index.php?c=product&m=detail&id=<?php echo $key; ?>"><img width="75" alt="<?php echo $value['name']; ?>" src="products-images/<?php echo $value['image_link']; ?>"></a></td>
                                  <td><h2 class="product-name"> <a href="index.php?c=product&m=detail&id=<?php echo $key; ?>"><?php echo $value['name']; ?></a> </h2></td>
                                  <td class="a-center hidden-table"><span class="cart-price"> <span class="price"><?php echo number_format($value['price']); ?> VNĐ</span></span></td>
                                  <td class="a-center"><input maxlength="12" class="input-text qty" title="Số Lượng" size="4" value="<?php echo $value['qty']; ?>" name="txtQty[<?php echo $key; ?>]"></td>
                                  <td class="a-center"><span class="cart-price"> <span class="price"><?php echo number_format($value['subtotal']); ?> VNĐ</span> </span></td>
                                  <td class="a-center last"><a class="button remove-item" id='del' data-key="<?php echo $key; ?>" title="Xóa Sản Phẩm"><span><span>Xóa Sản Phẩm</span></span></a></td>
                                </tr>
                            <?php
                                $total+=$value['subtotal'];
                                endforeach
                            ?>
                          </tbody>
                        </table>
                    </fieldset>
                </form>
                </div>
                <div class="cart-collaterals row">
                  <form id="form-info-transaction">
                    <div class="col-sm-4">
                      <div class="shipping">
                        <h3>Thông Tin Liên Lạc</h3>
                        <div class="shipping-form">
                          <ul class="form-list">
                            <li>
                              <div class="form-group">
                                <label for="txtName">Họ Tên</label>
                                  <input type="text" name="txtName" style='width:100%' id="txtName" class="form-control">
                              </div>
                            </li>
                            <li>
                              <div class="form-group">
                                <label for="txtPhone">Điện Thoại</label>
                                <input type="text" name="txtPhone" style='width:100%' id="txtPhone" class="form-control">
                              </div>
                            </li>
                            <li>
                              <div class="form-group">
                                <label for="txtEmail">Email</label>
                                <input type="text" name="txtEmail" style='width:100%' id="txtEmail" class="form-control">
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="shipping">
                        <h3>Nhập Địa Chỉ Nhận Hàng</h3>
                        <div class="shipping-form">
                            <ul class="form-list">
                              <li>
                                <div class="form-group">
                                  <label for="txtAddress">Địa Chỉ</label>
                                  <input type="text" name="txtAddress" style='width:100%' id="txtAddress" class="form-control">
                                </div>
                              </li>
                            </ul>
                        </div>
                      </div>
                    </div>
                    <div class="totals col-sm-4">
                      <h3>Tổng số Tiền Giỏ Hàng</h3>
                      <div class="inner">
                        <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                          <tbody>
                            <tr>
                              <td colspan="1" class="a-left">Tổng Giá Trị</td>
                              <td class="a-right"><span class="price"><?php echo number_format($total); ?> VNĐ</span></td>
                            </tr>
                          </tbody>
                        </table>
                        <ul class="checkout">
                          <li>
                            <button class="button btn-proceed-checkout" name='submit' type='submit' title="Tiến Hành Đặt Hàng" ><span>Đặt Hàng</span></button>
                          </li>
                        </ul>
                      </div>
                      <!--inner--> 
                    </div>
                  </form>
                </div>
            <?php else: ?>
                <h1>Chưa Có Sản Phẩm Nào Trong Giỏ Hàng</h1>
            <?php endif ?>
        </div>
        <div class="crosssel wow bounceInUp animated">
          <div>
            <h2>Sản Phầm Có Thể Bạn Sẽ Quan Tâm</h2>
          </div>
          <div class="category-products">
            <ul class="products-grid crosssel-pro">
            <?php foreach ($data as $key => $value): ?>
              <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                  <div class="item-inner">
                    <div class="item-img">
                      <div class="item-img-info"> <a href="index.php?c=product&m=detail&id=<?php echo $value['id']; ?>" title="<?php echo $value['name']; ?>" class="product-image"> <img src="products-images/<?php echo $value['image_link']; ?>" alt="<?php echo $value['name']; ?>"> </a>
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
                        <div class="item-title"> <a href="index.php?c=product&m=detail&id=<?php echo $value['id']; ?>" title="<?php echo $value['name']; ?>"> <?php echo $value['name']; ?> </a> </div>
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
        </div>
      </div>
    </div>
  </section>