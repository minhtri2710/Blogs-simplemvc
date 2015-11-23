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
                    <div class="top-subtotal"><?php echo $_SESSION['total_qty']; ?> items, 
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