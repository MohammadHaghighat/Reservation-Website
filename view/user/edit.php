<main>
  <div class="container">
    <h4 class="mb-4">ویرایش مشخصات کاربری</h4>

    <div class="row mb-4">
      <div class="col-12 pagearea">
        <form action="#" id="edit-user-form" method="post">

          <div class="row align-items-center mt-sm-0 mt-2 mb-3">
            <div class="col-lg-2 col-5">
              <label for="firstname" class="form-label mb-0">نام:</label>
            </div>
            <div class="col-lg-4 col-7">
              <input type="text" class="form-control w-75" id="firstname" required value="<?=$item['fname']?>">
            </div>
            <div class="col-lg-2 col-5">
              <label for="lastname" class="form-label mb-0">نام خانوادگی:</label>
            </div>
            <div class="col-lg-4 col-7">
              <input type="text" class="form-control w-75" id="lastname" required value="<?=$item['lname']?>">
            </div>
          </div>

          <div class="row align-items-center mt-sm-0 mt-2 mb-3">
            <div class="col-lg-2 col-5">
              <label for="fathername" class="form-label mb-0">نام پدر:</label>
            </div>
            <div class="col-lg-4 col-7">
              <input type="text" class="form-control w-75" id="fathername" required value="<?=$item['father_name']?>">
            </div>
            <div class="col-lg-2 col-5">
              <label for="edu" class="form-label mb-0">تحصیلات:</label>
            </div>
            <div class="col-lg-4 col-7">
              <select class="form-select w-75" aria-label="edu">
                <option value="1">زیر دیپلم</option>
                <option value="2">دیپلم</option>
                <option value="3">فوق دیپلم</option>
                <option value="4" selected>لیسانس</option>
                <option value="5">فوق لیسانس</option>
                <option value="5">دکتری عمومی</option>
                <option value="6">دکتری تخصصی</option>
                <option value="7">مقاطع بالاتر</option>
              </select>
            </div>
          </div>

          <div class="row align-items-center mt-sm-0 mt-2 mb-3">
            <div class="col-lg-2 col-5">
              <label for="pass" class="form-label mb-0">رمز عبور:</label>
            </div>
            <div class="col-lg-4 col-7">
              <input type="password" class="form-control w-75" id="pass">
            </div>

            <div class="col-lg-2 col-5">
              <label for="repass" class="form-label mb-0">تکرار رمز عبور:</label>
            </div>
            <div class="col-lg-4 col-7">
              <input type="password" class="form-control w-75" id="repass">
            </div>
          </div>

          <div class="row align-items-center mt-sm-0 mt-2 mb-3">
            <div class="col-lg-2 col-5">
              <label for="dtp1-text" class="form-label">تاریخ تولد</label>
            </div>
            <div class="col-lg-4 col-7">
              <input type="text" class="form-control d-inline-block w-75" data-name="dtp1-text" required value="<?=$item['birth_date']?>">
              <span class="input-group-text d-inline-block cursor-pointer" id="dtp1">📅</span>

              <input type="hidden" class="form-control" data-name="dtp1-date">
            </div>
          </div>

          <div class="row justify-content-center align-items-center mt-5 mb-2">
            <div class="col-12 text-center">
              <button name="frmBtn" class="btn btn-success w-25">ثبت اطلاعات</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</main>