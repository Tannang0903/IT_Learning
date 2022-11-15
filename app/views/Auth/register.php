<div class="container">
    <div class="forms">
        <div class="login-box">
            <h2 class="title">Login</h2>
            <form method="POST" action="" id="submit" autocomplete="off">
                <div class="user-box">
                    <input type="text" name="username" required id="inputUsername" autocomplete="off">
                    <label>Username</label>
                </div>
                <span class="text-danger username-error">
                    <?php
                        if (isset($error['Username'])) {
                            foreach ($error['Username'] as $errorMessage) {
                                echo $errorMessage;
                            }
                        }
                    ?>
                </span>
                <div class="user-box">
                    <input type="text" name="email" required id="inputEmail" autocomplete="off">
                    <label>Email</label>
                </div>
                <span class="text-danger email-error">
                    <?php
                        if (isset($error['Email'])) {
                            foreach ($error['Email'] as $errorMessage) {
                                echo $errorMessage;
                            }
                        }
                    ?>
                </span>
                <div class="user-box">
                    <input type="password" name="password" required id="inputPassword" autocomplete="new-password">
                    <label>Password</label>
                </div>
                <span class="text-danger password-error">
                    <?php
                        if (isset($error['Password'])) {
                            foreach ($error['Password'] as $errorMessage) {
                                echo $errorMessage;
                            }
                        }
                    ?>
                </span> 
                <div class="user-box">
                    <input type="password" name="confirmPassword" id="confirmPassword" required autocomplete="new-password">
                    <label>Confirm Password</label>
                </div>
                <span class="text-danger password-error" id="confirmPasswordError">
                    
                </span> 
                <div class="input-field button">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <input type="submit" value="Đăng Ký">
                </div>
                <div class="login-signup">
                    <span class="text">
                        <?php
                            echo '<a href="'.$this -> url("Auth", "login").'" class="text signup-text">Đã có tài khoản</a>';
                        ?>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>