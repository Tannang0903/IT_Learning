<div class="container">
    <div class="forms">
        <div class="form login">
            <span class="title">Đăng Kí</span>
            <form action="" method="POST">
                <div class="input-field">
                    <input type="text" placeholder="Tên đăng nhập" name="username" required>
                    <i class="fa fa-user"></i>
                </div>
                <span class="text-danger">
                    <?php
                        if (isset($error['Username'])) {
                            foreach ($error['Username'] as $errorMessage) {
                                echo $errorMessage;
                            }
                        }
                    ?>
                </span>
                <div class="input-field">
                    <input type="text" placeholder="Địa chỉ email" name="email" required>
                    <i class="fa fa-envelope"></i>
                </div>
                <span class="text-danger">
                    <?php
                        if (isset($error['Email'])) {
                            foreach ($error['Email'] as $errorMessage) {
                                echo $errorMessage;
                            }
                        }
                    ?>
                </span>
                <div class="input-field">
                    <input type="password" placeholder="Mật khẩu" name="password" required>
                    <i class="fa fa-lock"></i>
                </div>
                <span class="text-danger">
                    <?php
                        if (isset($error['Password'])) {
                            foreach ($error['Password'] as $errorMessage) {
                                echo $errorMessage;
                            }
                        }
                    ?>
                </span> 
                <div class="input-field">
                    <input type="password" placeholder="Nhập lại mật khẩu" name="confirmPassword" required>
                    <i class="fa fa-lock"></i>
                </div>
                <div class="input-field button">
                    <input type="submit" value="Đăng Kí">
                </div>
            </form>
            <div class="login-signup">
                <span class="text">
                    <a href="" class="text signup-text">Đã có tài khoản</a>
                </span>
            </div>
        </div>
    </div>
</div>