<div class="container">
            <div class="forms">
                <div class="login-box">
                    <h2 class="title">Login</h2>
                    <form method="POST">
                        <div class="user-box">
                            <input type="text" name="username" required oninput="removeError()">
                            <label>Username</label>
                        </div>
                        <div class="user-box">
                            <input type="password" name="password" required oninput="removeError()">
                            <label>Password</label>
                        </div>
                        <?php
                            if (isset($error)) {
                                echo '<span class="errorInfo">'.$error.'</span>';
                            }
                        ?>
                        <div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" id="logcheck">
                                <label for="logcheck" class="text">Nhớ mật khẩu</label>
                            </div>
                            <a href="#!" class="text">Quên mật khẩu ?</a>
                        </div>
                        <div class="input-field button">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <input type="submit" value="Đăng Nhập">
                        </div>
                        <div class="login-signup">
                            <span class="text">Chưa phải thành viên
                                <?php
                                    echo '<a href="'.$this -> url("Auth", "register").'" class="text signup-text">Đăng kí</a>';
                                ?>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function removeError() {
            var error = document.querySelector('.errorInfo');
            error.innerText = '';
        }
    </script>