
<!-- Main Footer -->
<footer class="main-footer text-right">
    <strong><?= $setting->setting('footer')['value'] ?></strong>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="../public/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/admin/dist/js/adminlte.js"></script>
<?php if ($controller === "location" and in_array($action,array("add","edit"))): ?>

    <script>
        var ba = 1;
        var count = 2;
        var dict = {
            1: 'null',
            2: 'null',
            3: 'null',
            4: 'null',
            5: 'null',
            6: 'null',
            7: 'null',
            8: 'null'
        };
        $(".fileUploader").change(function (e) {
            $("#dv" + ba + " .imgUp").first().parent()
                .append('<a class="ui red right corner label" href="javascript:;" id="lnkIMGID" onclick="deleteimg(' + "'" + ba + "'" + ',this)"><i class="fa fa-close"></i></a>');
            $("#dv" + ba + " .imgUp").first().removeClass("imgUp").attr('src',URL.createObjectURL(e.target.files[0]));
            var dvId = $("#dv" + ba).next().attr('id');
            count = dvId.substr(dvId.length - 1);
            $(".image-placeholders #dv" + count + " img").attr("src","../public/admin/dist/img/addimage.png").addClass("imgUp");
        });

        function selPic(a) {
            if ($('.image-placeholders li#dv' + a + ' img').hasClass('imgUp')) {
                $('#fileUploader'+a).click();
                ba = a;
            }
        }

        function deleteimg(index, rid) {

            var form = $("#__AntiForgeryTokenAjax")
            var Token = $('input[name="__RequestVerificationToken"]', form).val()
            if ($(rid).closest("ul").find('.imgUp').length == 1) {
                var indexID = $("#dv" + index).index();
                $("#fileUploader"+index).attr('value', '');
                $(".image-placeholders li#dv" + index).parent().append($('<li id="dv' + index + '"><img src="../public/admin/dist/img/image.png" onclick="selPic(' + "'" + index + "'" + ')" class="img-responsive dis-inline"/></li>'));
                $(rid).parent().remove();
                if (indexID == 0) {
                    if($(".image-placeholders li:first-child").attr('src') == "../public/admin/dist/img/image.png"){
                        $(".image-placeholders li:first-child").addClass('firstpic');
                        if ($(".image-placeholders li.firstpic img").hasClass("imgUp")) {
                            $(".image-placeholders li.firstpic img").attr('src', '../public/admin/dist/img/addimage.png');
                        }
                    }
                }
            } else {
                var indexID = $("#dv" + index).index();
                $(".image-placeholders li#dv" + index).parent().append($('<li id="dv' + index + '"><img src="../public/admin/dist/img/addimage.png" onclick="selPic(' + "'" + index + "'" + ')" class="img-responsive dis-inline imgUp"/></li>'));
                $(rid).parent().remove();
                if (indexID == 0) {
                    if($(".image-placeholders li:first-child").attr('src') == "../public/admin/dist/img/image.png"){
                        $(".image-placeholders li:first-child").addClass('firstpic');
                        if ($(".image-placeholders li.firstpic img").hasClass("imgUp")) {
                            $(".image-placeholders li.firstpic img").attr('src', '../public/admin/dist/img/addimage.png');
                        }
                    }
                }
            }
            delImage("/Index/DeleteImage", Token, dict, index, 8);
        }

        // Validation Form
        function checkform(thisoObj) {
            if (!thisoObj.val() && thisoObj.attr("id") !== "Address" && !thisoObj.parent().has("div").length)
                thisoObj.parent().append("<div class=\"ui basic pointing prompt label transition visible\">" + thisoObj.next().html() + " را وارد کنید" + "</div>");
            if (thisoObj.attr("id") === "Address" && !thisoObj.val() && !thisoObj.parent().has("div").length)
                thisoObj.parent().append("<div class=\"ui basic pointing prompt label transition visible\">محله یا خیابان اصلی را وارد کنید</div>");
            if (thisoObj.val())
                thisoObj.parent().children().last().remove(".pointing");
        }

        $("form[name=sabtfrm] #code, form[name=sabtfrm] #Address, form[name=sabtfrm] #MortgageOrTotalRent, form[name=sabtfrm] #RentOrMetricRent").blur(function () {
            checkform($(this));
        });
        $("#btnsubmit").click(function () {
            $("form[name=sabtfrm] #code,form[name=sabtfrm] #Address, form[name=sabtfrm] #MortgageOrTotalRent, form[name=sabtfrm] #RentOrMetricRent").filter(function () {
                checkform($(this));
            });
            var empty = 0;
            $.each($("form[name=sabtfrm] #code,form[name=sabtfrm] #Address, form[name=sabtfrm] #MortgageOrTotalRent, form[name=sabtfrm] #RentOrMetricRent"), function () {
                if ($(this).val()) {
                    $(this).parent().children().last().remove(".pointing");
                    empty++;
                }
            });
            if (empty == 4) {
                $("form[name=sabtfrm]").submit();
            }
        });
    </script>

<?php endif; ?>

<?php if (in_array($controller,array("setting","user","slider","news")) and $action === "edit"): ?>

    <script type="text/javascript">
        $("#removeImg").click(function (){
            $("#image_path").attr('value', '');
            $("#myPartialContainer .img-circle, #removeImg").remove();
        });
    </script>

<?php endif; ?>

<?php if ($controller==="comment" and $action === "list"): ?>
    <script type="text/javascript">
        $(document).ready(function () {
// Ajax Request !!! (for security reseons : put it in separate file !!!)
            $(".edit-btn-published").click(function (e) {
                var thisElement = $(this);
                var reqURL = "index.php?controller=comment&action=edit";
                var value = thisElement.val();
                value = value.split('-');
                var status = value[0];
                var id = value[1];
                /*
                thisElement.parent().find('.result').fadeIn(10);
                thisElement.parent().find('.result').html('...');*/
                $.ajax({
                    type: 'POST',
                    url: reqURL,
                    data: {id: id,status:status},
                    success: function (response) {
                        var msg = '';
                        var c = '';
                        var button = '';
                        var btnC='';
                        if (status==='published') {
                            msg = 'منتظر تایید.';
                            thisElement.parent().parent().parent().find('tr.c-'+id).removeClass('bg-success');
                            c = 'bg-warning';
                            button = 'انتشار';
                            thisElement.removeClass('btn-warning');
                            btnC = 'btn-success';
                            thisElement.val('pending-'+id);
                        }
                        else if(status==='pending') {
                            msg = 'منتشر شد.';
                            thisElement.parent().parent().parent().find('tr.c-'+id).removeClass('bg-warning');
                            c = 'bg-success';
                            button = 'لغو تایید';
                            thisElement.removeClass('btn-warning');
                            btnC = 'btn-warning';
                            thisElement.val('published-'+id);
                        }
                        thisElement.parent().parent().find('td .msg').html(msg);
                        thisElement.html(button);
                        thisElement.parent().parent().parent().find('tr.c-'+id).addClass(c);
                        thisElement.addClass(btnC);
                        thisElement.parent().find('.result').fadeIn(500);
                        // refresh page after 1 second
                        // setTimeout("location.href='" + window.location.href + "'", 1000);
                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
            });
        });
    </script>
<?php endif; ?>

</body>
</html>