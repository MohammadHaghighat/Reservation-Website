<div class="loginarea">
  <div class="container">
    <div class="row justify-content-center gy-4">
      <div class="col-10 offset-1 col-lg-5 offset-lg-0">
        <div class="card">
          <h5 class="card-header">ورود به سامانه</h5>
          <?php if (isset($errMsg)): ?>
            <div class="alert alert-danger"><?= nl2br($errMsg) ?></div>
          <?php endif; ?>
          <div class="card-body px-0">
            <form method="post" action="#">
              <div class="row g-2 align-items-center mb-3">
                <div class="col-3">
                  <label for="username" class="col-form-label">نام کاربری</label>
                </div>
                <div class="col-9">
                  <input name="frm[username]" type="text" id="username" class="form-control">
                </div>
              </div>

              <div class="row g-2 align-items-center mb-3">
                <div class="col-3">
                  <label for="password" class="col-form-label">کلمه عبور</label>
                </div>
                <div class="col-9">
                  <input name="frm[password]" type="password" id="password" class="form-control">
                </div>
              </div>

              <div class="row justify-content-center mb-3">
                <div class="col-4">
                  <img src="public/captcha.php" class="captcha" alt="captcha">
                </div>
              </div>

              <div class="row g-2 align-items-center mb-3">
                <div class="col-auto">
                  <label for="captcha" class="col-form-label">کد امنیتی</label>
                </div>
                <div class="col-9">
                  <input name="frm[captcha]" type="text" id="captcha" class="form-control">
                </div>
              </div>

              <div class="row g-2 align-items-center mb-3">
                <div class="col-auto">
                  <label for="remember-me" class="form-check-label">مرا به خاطر بسپار</label>
                </div>
                <div class="col-auto">
                  <input name="frm[remember-me]" type="checkbox" id="remember-me" class="form-check-label">
                </div>
              </div>


              <div class="row justify-content-center">
                <div class="col-auto">
                  <button name="frmBtn" class="btn btn-sm btn-success">ورود</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-7">
        <div class="card">
          <h5 class="card-header">درباره سامانه</h5>
          <div class="card-body">
            <p class="card-text">کاربر گرامی
              <br />
              نام کاربری شما در سامانه به طور پیشفرض کد ملی شما و کلمه عبور اختصاص داده شماره شناسنامه شما میباشد.
              <br />
              لطفا در اولین ورود خود به سامانه نسبت به تغییر این رمز فورا اقدام نمایید. در غیر اینصورت تمامی عواقب متوجه خودتان خواهد بود.
              <br />
              با تشکر.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>