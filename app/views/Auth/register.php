<div class="container">
    <div class="forms">
        <div class="login-box">
            <h2 class="title">Login</h2>
            <form method="POST" action="">
                <div class="user-box">
                    <input type="text" name="username" required id="inputUsername">
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
                    <input type="text" name="email" required id="inputEmail">
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
                    <input type="password" name="password" required id="inputPassword">
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
                    <input type="password" name="confirmPassword" required>
                    <label>Confirm Password</label>
                </div>
                <div class="input-field button">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <input type="submit" value="Đăng Ký">
                </div>
                <div class="login-signup">
                    <span class="text">
                        <a href="" class="text signup-text">Đã có tài khoản</a>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var inputUsername = document.getElementById('inputUsername');
    inputUsername.oninput = (e) => {
        var textError = document.querySelector(".username-error");
        textError.innerText = '';
    }
    var inputEmail = document.getElementById('inputEmail');
    inputEmail.oninput = (e) => {
        var textError = document.querySelector(".email-error");
        textError.innerText = '';
    }
    var inputPassword = document.getElementById('inputPassword');
    inputPassword.oninput = (e) => {
        var textError = document.querySelector(".password-error");
        textError.innerText = '';
    }
</script>