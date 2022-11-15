const inputUsername = document.getElementById('inputUsername');
const confirmPassword = document.getElementById('confirmPassword');
const inputEmail = document.getElementById('inputEmail');
const inputPassword = document.getElementById('inputPassword');
const confirmPasswordError = document.getElementById('confirmPasswordError');
const btnSummit = document.getElementById('submit');

inputUsername.oninput = (e) => {
    const textError = document.querySelector(".username-error");
    textError.innerText = '';
}
inputEmail.oninput = (e) => {
    const textError = document.querySelector(".email-error");
    textError.innerText = '';
}
inputPassword.oninput = (e) => {
    const textError = document.querySelector(".password-error");
    textError.innerText = '';
}

btnSummit.addEventListener('submit', e =>  {
    if(confirmPassword.value !== inputPassword.value) {
        confirmPasswordError.innerText = "Mật khẩu xác định không chính xác";
        e.preventDefault();
    }
}); 