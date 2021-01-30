<!doctype html>
<?php
include "sys_config.class.php";
require_once "DateUtils.inc.php";
require_once "SharedClass.class.php";
require_once "UI.inc.php";

HTMLBegin();
$wwwroot = "kir";
$message_array = [];
?>
<body >
<form method=post>
    <div class="container-fluid">
        <? if($message_array) {
        foreach($message_array as $msg){
        ?>
        <div class="row">
            <div class="col-1" ></div>
            <div class="col-10" >
                <div class="alert alert-danger well" role="alert"><?php echo $msg; ?></div>
            </div>
            <div class="col-1" ></div>
        </div>
    </div>
    <? }} ?>
    <div class="row">
        <div class="col-3" ></div>
        <div class="col-6" >
            <br>
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        چارچوب توسعه نرم افزار سدف
                    </div>
                    <div class="caption" style="float: left">
                        برنامه نصب
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table">
                        <tr>
                            <td>آدرس دیتابیس</td>
                            <td><input type=text name=Userip id=Userip class="form-control"></td>
                        </tr>
                        <tr>
                        <tr>
                            <td>نام کاربری دیتابیس</td>
                            <td><input type=text name=Username id=Username class="form-control"></td>
                        </tr>
                        <tr>
                            <td>کلمه عبور دیتابیس</td>
                            <td><input type=password id=UserPassword name=UserPassword class="form-control"></td>
                        </tr>
                        <tr>
                            <td>آدرس wwwroot</td>
                            <td><input type=text id=wwwroot name=Userwwwroot class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan=2 align=center>
                                <button type="submit" class="btn btn-primary active">نصب</button>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
            <div class="col-3" ></div>
        </div>

</form>
</div>
</body>
</html>