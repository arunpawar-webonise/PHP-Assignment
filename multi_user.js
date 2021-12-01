function showRegistrationForm() {
    $(".registerForm").css("display", "block");
    $(".registerbtn").css("display", "none");
    $(".loginbtn").css("display", "none");
    $(".editbtn").css("display", "none");

}

function showLoginForm() {
    // var loginform = document.querySelector('.loginForm');
    // loginform.style.display = "block";
    $(".loginForm").css("display", "block");
    $(".registerbtn").css("display", "none");
    $(".loginbtn").css("display", "none");
    $(".editbtn").css("display", "none");

}

function showEditForm() {
    $('.editForm').css("display", "block");
    $(".registerbtn").css("display", "none");
    $(".loginbtn").css("display", "none");
    $(".editbtn").css("display", "none");
}

