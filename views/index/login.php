<!-- Main Container -->
  <section class="main-container col1-layout wow bounceInUp animated">
    <div class="main container">
      <div class="account-login">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
          <div class="page-title">
            <h2>Đăng Nhập Tài Khoản</h2>
          </div>
          <fieldset class="col1-set">
            <legend>Đăng Nhập Tài Khoản</legend>
            <div class="registered-users">
              <div class="content">
                <form id='form-login' method="POST" action="index.php" role="form" accept-charset="utf-8">
                <input type="hidden" name="c" value="login">
                <input type="hidden" name="m" value="login">
                  <div class="form-group">
                      <label class="control-label" for="user">Username <span class="required">*</span></label>
                      <input type="text" class="form-control" style='width:100%' id="user" name="user">
                  </div>
                  <div class="form-group">
                      <label class="control-label" for="pass">Password <span class="required">*</span></label>
                      <input type="password" id="pass" style='width:100%' class="form-control" name="pass">
                  </div>
                  <?php echo $error; ?>
                  <div class="buttons-set">
                    <button id="submit" name="submit" type="submit" class="button login"><span>Đăng Nhập</span></button>
                    <!-- <a class="forgot-word" href="#">Forgot Your Password?</a>  -->
                  </div>
                </form>
              </div>
            </div>
          </fieldset>
        </div>
      </div>
    </div>
  </section>
  <!-- Main Container End -->
