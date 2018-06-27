

<html xmlns="http://www.w3.org/1999/xhtml">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>登入</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
    #heig{
        height:25px;
    }
    #colsr{
        background-color: #E5E5E5;
    }
</style>





<div class="container">
    <div align="center">
        <form id="form1" name="form1" method="post" action="check_login">
            <P> </P>
            <P> </P>
            <table width="300" border="1" class="table table-bordered table-condensed">
                <tr>
                    <td colspan="2" id="color"><div align="center"><strong>登入</strong></div></td>
                </tr>
                <tr>
                <td><div align="center"><strong>帳號</strong></div></td>
                <td><label id="heig"><input type="text" name="uname"></label></td>
                </tr>
                <tr>
                    <td><div align="center"><strong>密碼</strong></div></td>
                    <td><label id="heig"><input type="password" name="upass"></label></td>
                </tr>
                <tr>
                <td colspan="2" id="color">
                <div class="btn-group">
                    <button class="btn btn-info" type="submit">登入</button>
                    <button class="btn btn-success" type="reset">重新填寫</button>
                </div></td>
                </tr>

            </table>
        </form>
        <center><button type="button" class="btn btn-info" onclick="location.href='create_user_view'">建立新帳號</button></center>
    </div>
</div>