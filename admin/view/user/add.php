<title>پنل <?=($user->isAdmin($_SESSION['userId']))?'مدیریت':'کاربری'?> | اضافه کردن کاربر جدید</title><div class="row">
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            افزودن کاربر جدید
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="ui form form-rtl">
                            <form action="#" method="post" name="sabtfrm" enctype="multipart/form-data">
                                <div class="col-deposit-form" id="context">
                                    <div id="DepositeSection2">
                                        <div id="myPartialContainer">
                                            <?php if ($errMsg): ?>
                                                <div style="padding: 5px 30px" class="bg-danger text-right font-light">
                                                    <h4 class="text-danger text-bold"><?= nl2br($errMsg) ?></h4>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (isset($sucMsg)): ?>
                                                <div style="padding: 5px 30px" class="bg-success text-right font-light">
                                                    <h4 class="text-success text-bold"><?= nl2br($sucMsg) ?></h4>
                                                </div>
                                            <?php endif; ?>
                                            <h4 class="text-bold">افزودن</h4><br>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="fname" name="frm[fname]" type="text">
                                                        <label for="fname" class="active">نام</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input id="lname" name="frm[lname]" type="text">
                                                        <label for="lname" class="active">نام خانوادگی</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="codeMelli" name="frm[codeMelli]" type="text">
                                                        <label for="codeMelli" class="active">کد ملی</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="fatherName" name="frm[fatherName]" type="text">
                                                        <label for="fatherName" class="active">نام پدر</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="grade" name="frm[grade]" type="text">
                                                        <label for="grade" class="active">مقطع تحصیلی</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required class="form-control" id="birth_date"
                                                               name="frm[birth_date]" type="date">
                                                        <label for="birth_date" class="active">تاریخ تولد</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required id="password" name="frm[password]" type="password"
                                                               placeholder="گذرواژه را وارد نمایید">
                                                        <label for="password" class="active">گذرواژه</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input required class="form-control" id="repassword"
                                                               name="frm[repassword]" type="password"
                                                               placeholder="تکرار گذرواژه را وارد نمایید">
                                                        <label for="repassword" class="active">تکرار گذرواژه</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 offset-sm-3">
                                                    <div class="field placeholder">
                                                        <input id="image" name="image" type="file" class="form-control">
                                                        <label for="image" class="active">عکس پروفایل</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 offset-sm-3">
                                                    <div class="field placeholder">
                                                        <select class="form-control" name="frm[role]" id="role">
                                                            <option value="admin">مدیر سایت</option>
                                                            <option value="user">کاربر</option>
                                                        </select>
                                                        <label for="role" class="active">سطح دسترسی</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="DepositeSection3">

                                        <div class="text-left btn-box mt-4">
                                            <button name="frmBtn" type="submit" id="btnsubmit"
                                                    class="btn btn-block btn-success btn-lg">افزودن
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->