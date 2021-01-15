<?php
session_start();
?>

<!doctype html>

<?php
include "sys_config.class.php";
require_once "DateUtils.inc.php";
require_once "SharedClass.class.php";
require_once "UI.inc.php";

HTMLBegin();

$message = "";
$username = $_SESSION["UserID"];
$email = $_SESSION["UserEmail"];
$OTP = $_SESSION["OTP"];

if(isset($_REQUEST["submit"]))
{
    $userOTP = $_REQUEST["UserOTP"];

    if ($userOTP != $OTP) {
        $message = "رمز عبور یکبارمصرف درست نمی باشد. لطفا مجدد تلاش کنید.";
    }

    else{
        echo "<script>document.location='login.php';</script>";
        die();
    }
}

function console_log( $data ){echo '<script>'.'console.log('. json_encode( $data ) .')'.'</script>';}

function send_email($email_address){

    $OTP = md5(openssl_random_pseudo_bytes(10));

    echo "<script>console.log('Debug Objects: " . $OTP . "' );</script>";

    $to = $email_address;
    $subject = "کد فعال سازی سیستم سدف";
    $txt = "سلام کاربر گرامی. کد فعال سازی برای ورود به سیستم". $OTP ."می باشد.";

    mail($to, $subject, $txt);
}

if(isset($_REQUEST["resend"]))
{
    send_email($email);
}

?>

<body >
<form method=post>

    <div class="container-fluid">
        <? if($message!="") { ?>
        <div class="row">
            <div class="col-1" ></div>
            <div class="col-10" >
                <div class="alert alert-danger well" role="alert"><?php echo $message; ?></div>
            </div>
            <div class="col-1" ></div>
        </div>
    </div>
    <? } ?>
    <div class="row">
        <div class="col-3" ></div>
        <div class="col-6" >
            <br>
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        چارچوب توسعه نرم افزار سدف
                    </div>
                    <div class="caption", style="float: left">
                        اعتبارسنجی ایمیل < ثبت نام
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table">
                        <tr>
                            <td>رمز عبور یکبارمصرف</td>
                            <td><input type=text name=UserOTP id=UserOTP class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan=2 align=center>
                                <button name="submit" type="submit" class="btn btn-primary active">ثبت نام</button>
                            </td>

                            <td>
                                <a name="resend" onclick=<?php
                                //TODO: fix the front view
                                ?>>ارسال مجدد به ایمیل</a>
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
