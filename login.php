<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form name="login" method="post" action="validasi.php">
        <table width="50%" border="0" align="center" cellpadding="2" bgcolor="#FFFBF0" class="content">
            <tr>
                <td colspan="3">
                    <div align="center"><strong>Login Admin </strong></div>
                </td>
            </tr>
            <tr>
                <td width="38%"><strong>Username</strong></td>
                <td width="4%">:</td>
                <td width="58%"><input name="tusername" type="text" id="username" size="20" maxlength="20"></td>
            </tr>
            <tr>
                <td><strong>Password</strong></td>
                <td>:</td>
                <td><input name="tpasswd" type="password" id="tpasswd" size="20" maxlength="20"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="Submit" value="Submit"></td>
            </tr>
            <tr>
                <td colspan="3">
                   <div align="center"></div>
                </td>
            </tr>
            <tr>
                <td><a href="index.php">Kembali ke index</a></td>
            </tr>
        </table>
    </form>
</body>
</html>