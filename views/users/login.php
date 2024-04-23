<!-- <div class="container" style="max-width: 500px">
    <form method="post" action="">
        <div class="img-logo">
            <img src="assets/images/logo.png" alt="">
            <h2>Form login</h2>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" value="" id="username" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" value="" id="password" class="form-control"/>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary"/>
           <p>
               Chưa có tài khoản, <a href="index.php?controller=login&action=register">Đăng ký</a> ngay
           </p>
        </div>
    </form>
</div> -->

<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0" style="background-image: url(assets/images/image_10.png);">
      <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <section class="content-header">
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                    </div>
                <?php endif; ?>
            
                <?php if (!empty($this->error)): ?>
                    <div class="alert alert-danger">
                        <?php
                        echo $this->error;
                        ?>
                    </div>
                <?php endif; ?>
            
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </div>
                <?php endif; ?>
                <!--        <div class="alert alert-danger">Lỗi validate</div>-->
                <!--        <p class="alert alert-success">Thành công</p>-->
            </section>
              <div class="brand-logo" style="text-align: center;">
                <img src="assets/images/image_9.png" alt="logo">
              </div>
              <h3 style="text-align: center; font-weight:600;">Welcome back!</h3>
              <h6 class="font-weight-light" style="text-align: center;">Login to your account</h6>
              <form class="pt-3" method="post" action="">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="mt-3">
                    <input type="submit" name="submit" value="SIGN IN" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"/>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Remember me
                    </label>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>