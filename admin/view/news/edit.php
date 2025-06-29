<title>پنل <?=($user->isAdmin($_SESSION['userId']))?'مدیریت':'کاربری'?> | ویرایش خبر <?=$item['title']?></title><div class="row">
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ویرایش خبر <?= $item['title'] ?>
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
                                            <h4 class="text-bold">ویرایش</h4><br>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="field placeholder">
                                                        <input required id="code" name="frm[title]" type="text"
                                                               value="<?= $item['title'] ?>">
                                                        <label for="code" class="active">عنوان محصول</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="field">
                                                        <label class="active">وضعیت خبر : </label>
                                                        <label for="radio1" class="label label-success">منتشر شده</label>
                                                        <input type="radio" id="radio1" name="frm[status]" value="published" <?= ($item['status']==='published')?'checked':''?>>
                                                        <label for="radio2" class="label label-primary">پیش نویس</label>
                                                        <input type="radio" id="radio2" name="frm[status]" value="draft" <?= ($item['status']==='draft')?'checked':''?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="field placeholder">
                                                        <input id="image" name="image" type="file" class="form-control">
                                                        <label for="image" class="active">تصویر خبر</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 offset-sm-3">
                                                    <div class="field placeholder">
                                                        <select class="form-control" name="frm[category]" id="category">
                                                            <option value="location" <?=($item['category'] === 'location')?'selected':''?>>مکان های اقامتی</option>
                                                            <option value="loan" <?=($item['category'] === 'loan')?'selected':''?>>وام</option>
                                                        </select>
                                                        <label for="category" class="active">دسته بندی خبر</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 text-center">
                                                    <?php if (!empty($item['image'])): ?>
                                                        <img width="200px" src="../<?= $item['image'] ?>"
                                                                class="img-circle"/>
                                                        <button type="button" class="btn btn-danger" id="removeImg" name="removeImg">حذف عکس</button>
                                                        <input id="image_path" hidden type="text" value="<?= $item['image'] ?>" name="frm[image]">
                                                    <?php else: ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="field placeholder cke_rtl">
                                                        <textarea rows="10" class="form-control" id="body" name="frm[body]"><?=$item['body'] ?></textarea>
                                                        <label for="body" class="active">توضیحات خبر</label>
                                                        <script>
                                                            CKEDITOR.replace( 'body' );
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="DepositeSection3">
                                        <div class="text-left btn-box mt-4">
                                            <button name="frmBtn" type="submit" id="btnsubmit"
                                                    class="btn btn-block btn-success btn-lg">ویرایش نهایی
                                                خبر
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