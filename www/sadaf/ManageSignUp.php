<?php

include("header.inc.php");
HTMLBegin();
$mysql = pdodb::getInstance();
$current_status = null;
$other_status = null;
if (isset($_REQUEST["Save"])) {
    if (isset($_REQUEST["Item_FacilityStatus"])){
        $Item_FacilityStatus = $_REQUEST["Item_FacilityStatus"];

        $mysql->Prepare("UPDATE sadaf.ManageStatus
                            SET Status = ?
                            WHERE FacilityStatusID = 1 ;");
        $res = $mysql->ExecuteStatement(array($Item_FacilityStatus));
    }
    echo SharedClass::CreateMessageBox("اطلاعات ذخیره شد");
}

function loadStatus($mysql){
    $current_status = null;
    $other_status = null;
    $query = "select Status from sadaf.ManageStatus where FacilityStatusID = 1;";
    $res = $mysql->Execute($query);

    if($rec=$res->Fetch())
    {
        if($rec == 0){
            $current_status =  "غیرفعال";
            $other_status = "فعال";

        }
        else{
            $current_status =  "فعال";
            $other_status = "غیرفعال";
        }
    }

    return array($current_status ,$other_status);
}

?>
<form method="post" id="f1" name="f1">

    <br>
    <table width="90%" border="1" cellspacing="0" align="center">
        <tr class="HeaderOfTable">
            <td align="center">ویرایش وضعیت ثبت نام</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="0">

                    <tr>
                        <td width="1%" nowrap>
                           وضعیت ثبت نام
                        </td>
                        <td nowrap>
                            <select name="Item_FacilityStatus" id="Item_FacilityStatus" onload="<? $status = loadStatus($mysql); ?>">
                                <option value="1"><? echo $status[0]?></option>
                                <option value="0"><? echo $status[1]?></option>
                            </select>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="FooterOfTable">
            <td align="center">
                <input type="button" onclick="javascript: ValidateForm();" value="ذخیره">
            </td>
        </tr>
    </table>
    <input type="hidden" name="Save" id="Save" value="1">
</form>
<script>
    <? echo $LoadDataJavascriptCode; ?>
    function ValidateForm() {
        document.f1.submit();
    }

    function ConfirmDelete() {
        if (confirm('آیا مطمین هستید؟')) document.ListForm.submit();
    }
</script>
</html>

