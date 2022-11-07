<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=<?php echo ROOT."/public/css/login.css"?>>
        <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.2-web/css/all.css">
        <title>Login</title>
    </head>

    <body>
        <div class="container">
            <div class="forms">
                <div class="form login">
                    <span class="title">Đăng nhập</span>
                    <form method="POST">
                        <div class="input-field">
                            <input type="text" placeholder="Nhập email của bạn" name="username">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" placeholder="Nhập mật khẩu của bạn" name="password">
                            <i class="fa fa-lock"></i>
                        </div>
                        
                        <div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" id="logcheck">
                                <label for="logcheck" class="text">Nhớ mật khẩu</label>
                            </div>
                            <a href="./ResetPasword.html" class="text">Quên mật khẩu ?</a>
                        </div>
                        <div class="input-field button">
                            <input type="submit" value="Đăng Nhập">
                        </div>
                    </form>
                    <div class="login-signup">
                        <span class="text">Chưa phải thành viên
                            <a href="./Resigtration.html" class="text signup-text">Đăng kí</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>