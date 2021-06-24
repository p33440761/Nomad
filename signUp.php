<?php include __DIR__.'/parts-php/config.php'?>
<?php
$tilte = '註冊';
$pageName = 'singUp';



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/alert.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="./fontawesome-free-5.15.3-web/css/all.css">
    <style>
    .error {
        color: #cd071e;
    }
    </style>
</head>

<body>
    <div class="body_wrap">
        <div class="logo">
            <img src="./icomoon/svg/icon-nomad-logo-white.svg">
        </div>
        <div class="container right-panel-active">
            <!-- Sign Up -->
            <div class="container__form container--signup">
                <form name="form1" method="post" action="#" class="form" id="form1" novalidate
                    onsubmit="checkForm(); return false">
                    <h2 class="form__title">註冊</h2>
                    <input type="text" placeholder="使用者名稱" class="input" id="nickname" name="nickname" required />
                    <input type="email" placeholder="信箱" class="input" id="email" name="email" required />
                    <small class="form-text error"></small>
                    <input type="password" placeholder="密碼" class="input" id="password" name="password" required />
                    <small class="form-text error"></small>
                    <span class="link">已經有帳號了?<a href="#" class="link" id="have_account">登入</a></span>
                    <button class="btn btn_dark">註冊</button>
                </form>
            </div>

            <!-- Sign In -->
            <div class="container__form container--signin">
                <form name="form2" method="post" action="#" class="form" id="form2" novalidate
                    onsubmit="checkAccount(); return false">
                    <h2 class="form__title">登入</h2>
                    <input type="email" placeholder="信箱" class="input" id="email_login" name="email" required />
                    <small class="form-text error"></small>
                    <input type="password" placeholder="密碼" class="input" class="input" id="password_login"
                        name="password" required />
                    <span class="link">還沒加入我們?<a href="#" class="link" id="wanna_signUp">註冊</a></span>
                    <!-- <a href="#" class="link" id="forgot_password">忘記密碼?</a> -->
                    <button class="btn btn_dark">登入</button>
                </form>
            </div>

            <!-- Overlay -->
            <div class="container__overlay">
                <div class="overlay">
                    <div class="overlay__panel overlay--left">
                        <button class="btn" id="signIn">登入</button>
                    </div>
                    <div class="overlay__panel overlay--right">
                        <button class="btn" id="signUp">註冊</button>
                    </div>
                </div>
            </div>
            <!--重設密碼 -->
            <!-- <div class="container__form container--signin reset_sec" id="reset_sec_01">
                <form action="#" class="form reset_password" id="form_reset_btn_01" name="forgotPassword" method="post" onsubmit="sendEmail(); return false">
                    <h2 class="form__title">重設您的密碼</h2>
                    <input type="email" placeholder="信箱" class="input" name="forgot_email" id="forgot_email"/>
                    <button class="btn btn-reset" id="reset_btn_01">重設密碼</button>
                </form>
            </div> -->
            <!-- 輸入email驗證碼 -->
            <!-- <div class="container__form container--signin reset_sec" id="reset_sec_02">
                <form action="#" class="form reset_password" id="form_reset_btn_02">
                    <h2 class="form__title">輸入EMAIL驗證碼</h2>
                    <input type="text" placeholder="驗證碼" class="input" />
                    <button class="btn btn-reset" id="reset_btn_02">重設密碼</button>
                </form>
            </div> -->
            <!-- 確認新密碼 -->
            <!-- <div class="container__form container--signin reset_sec" id="reset_sec_03">
                <form action="#" class="form" id="form_reset_btn_03">
                    <h2 class="form__title">輸入新密碼</h2>
                    <input type="password" placeholder="密碼" class="input" />
                    <input type="password" placeholder="密碼二次驗證" class="input" />
                    <button class="btn btn-reset" id="reset_btn_03">重設密碼</button>
                </form>
            </div> -->
        </div>
    </div>


    <?php include __DIR__.'/parts-php/alert.php' ?>
    <script src="lib/jquery-3.6.0.js"></script>
    <script src="./js/login.js"></script>


    <script>
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;
    const $nickname = $('#nickname'),
        $email = $('#email');
    const fileds = [$nickname, $email];
    const $email_login = $('#email_login')
    const $password_login = $('#password_login')
    const fileds_login = [$email_login];
    const $forgot_email = $('#forgot_email');

    function checkForm() {
        // 回復原來的狀態
        fileds.forEach(el => {
            el.css('border', '1px solid rgb(204, 204, 204)');
            el.next().text('');
        });

        let isPass = true;

        if (!email_re.test($email.val())) {
            isPass = false;
            $email.css('border', '1px solid #cd071e');
            $email.next().text('請輸入正確的 email');
        }
        if (isPass) {
            $.post(
                'signUp-api.php',
                $(document.form1).serialize(),
                function(data) {
                    if (data.success) {
                        $('.alert_body').css('top', '0%');
                        $('.alert_success').addClass('alert_show');
                        $('.alert_btn').click(function() {
                            $('.alert_body').css('top', '-100%');
                            $('.alert_success').removeClass('alert_show');
                        });
                        $('#form1')[0].reset();
                    } else {
                        $('.alert_body').css('top', '0%');
                        $('.alert_error').addClass('alert_show');
                        $('.alert_btn').click(function() {
                            $('.alert_body').css('top', '-100%');
                            $('.alert_error').removeClass('alert_show');
                        })
                    }
                },
                'json'
            )
        }
    }

    function checkAccount() {
        fileds_login.forEach(el => {
            el.css('border', '1px solid rgb(204, 204, 204)');
            el.next().text('');
        });
        let isPass = true;
        if (!email_re.test($email_login.val())) {
            isPass = false;
            $email_login.css('border', '1px solid red');
            $email_login.next().text('請輸入正確的 email');
        }
        if (isPass) {
            $.post(
                'signIn-api.php',
                $(document.form2).serialize(),
                function(data) {
                    if (data.success) {
                        // alert('登入成功');
                        location.href = 'member.php';
                        console.log(data);
                    } else {
                        $('.alert_body').css('top', '0%');
                        $('.alert_error_login').addClass('alert_show');
                        $('.alert_btn').click(function() {
                            $('.alert_body').css('top', '-100%');
                            $('.alert_error_login').removeClass('alert_show');
                        })
                        // alert(data.error);
                    }
                },
                'json'
            )
        }
    }

    $("#have_account").click(function() {
        if ($('.container--signup').css('transform', 'translateX(0%)')) {

            $(".container--signup").css(
                "transform",
                "translateX(100%)"
            );
            $(".container--signin").css(
                "transform",
                "translateX(0%)"
            );
        } else {
            $(".container--signup").css(
                "transform",
                "translateX(0%)"
            );
            $(".container--signin").css(
                "transform",
                "translateX(100%)"
            );
        }


    });

    $("#wanna_signUp").click(function() {
        if ($('.container--signin').css('transform', 'translateX(100%)')) {

            $(".container--signup").css(
                "transform",
                "translateX(0)"
            );
            $(".container--signin").css(
                "transform",
                "translateX(-100%)"
            );
        } else if ($('.container--signin').css('transform', 'translateX(0%)')) {
            console.log('hi');
            $(".container--signup").css(
                "transform",
                "translateX(0%)"
            );
            $(".container--signin").css(
                "transform",
                "translateX(100%)"

            );
        }
    });
    // function sendEmail(){
    //     $('#reset_btn_01').on('click', function(){
    //         if($forgot_email.val() != ""){
    //             $forgot_email.css('border','1px solid green');

    //             $.ajax({
    //                 url:'signUp.php',
    //                 method:'POST',
    //                 dataType:'text',
    //                 data:{
    //                     email: $forgot_email.val()
    //                 },success: function(response){
    //                     console.log(response);
    //                 }
    //             });

    //         }else{
    //             $forgot_email.css('border','1px solid #cd071e');
    //         }
    //     });
    // }
    </script>


    <?php include __DIR__ . '/parts-php/html-endingTag.php'; ?>