
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Register</h3>
                <form class="user" method="POST" action="<?= base_url('auth/cek_regis'); ?>">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="nama" class="form-control form-control-user" id="nama" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control form-control-user" id="email" name="email"
                    placeholder="Alamat Email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control form-control-user" id="password1"
                    name="password1" placeholder="Password">
                  </div>
                  
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Daftar Akun</button>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('Auth'); ?>">Already have an Account? Login</a>
                </div>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
</html>