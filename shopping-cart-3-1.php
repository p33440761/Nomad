<?php include __DIR__. '/parts-php/config.php'; ?>
<?php 
$title = '會員註冊';
$pageName = 'form';
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/shopping-cart-3-1.css" />
    <title>購物車頁</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
</head>

<body>
    <?php include __DIR__ . '/parts-php/html-navbar.php'; ?>

    <section class="progress-bar-section hero-section">
        <div class="container">
            <ul class="progress-bar flex">
                <li class="dots">
                    <p class="title ff-noto">
                        確認購買清單
                        <svg class="icon-play svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-play"></use>
                        </svg>
                    </p>
                    <div class="outer-circle">
                        <div class="inner-circle">
                            <div class="line"></div>
                        </div>
                    </div>
                </li>
                <li class="dots">
                    <p class="title ff-noto">
                        選額計算及配送方式
                        <svg class="icon-play svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-play"></use>
                        </svg>
                    </p>
                    <div class="outer-circle">
                        <div class="inner-circle">
                            <div class="line"></div>
                        </div>
                    </div>
                </li>
                <li class="dots">
                    <p class="title ff-noto">
                        填寫訂購人資訊及收貨人資訊
                        <svg class="icon-play svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-play"></use>
                        </svg>
                    </p>
                    <div class="outer-circle">
                        <div class="inner-circle">
                            <div class="line"></div>
                        </div>
                    </div>
                </li>
                <li class="dots">
                    <p class="title ff-noto">
                        填寫信用卡資料
                        <svg class="icon-play svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-play"></use>
                        </svg>
                    </p>
                    <div class="outer-circle">
                        <div class="inner-circle">
                            <div class="line"></div>
                        </div>
                    </div>
                </li>
                <li class="dots">
                    <p class="title ff-noto">
                        完成訂購
                        <svg class="icon-play svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-play"></use>
                        </svg>
                    </p>
                    <div class="outer-circle">
                        <div class="inner-circle"></div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="order-detail-section hero-section">
        <div class="container">
            <h2 class="title ff-noto">個人資料填寫(保險用)</h2>
            <div class="orderer-info-form">
                <form name="form2" action="./shopping-cart-4.php" method="post" novalidate
                    onsubmit="checkForm(); return false">
                    <h4 class="text ff-noto">訂購人資訊</h4>
                    <ul class="form-items">
                        <li class="box flex">
                            <label for="name" class="text ff-noto">姓名</label>
                            <input id="name" class="ff-noto" type="text" name="name3" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex gender">
                            <label for="gender" class="text ff-noto">性別</label>
                            <div class="box">
                                <input id="male" class="male" type="radio" name="gender" value="male" required>

                                <label for="male" class="text ff-noto">男</label>

                                <input id="female" class="female" type="radio" name="gender" value="female" required>

                                <label for="female" class="text ff-noto">女</label>
                                <span class="small ff-noto"></span>
                            </div>
                        </li>
                        <li class="box flex">
                            <label for="personalId" class="text ff-noto">身分證字號</label>
                            <input id="personalId" class="ff-noto" type="text" name="personalId" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label for="birthDate" class="text ff-noto">出生年月日</label>
                            <input id="birthDate" class="ff-noto" type="date" name="birthDate" placeholder="1990/01/01"
                                required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label for="email" class="text ff-noto">電子信箱</label>
                            <input id="email" class="ff-noto" type="email" name="email3" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label for="mobile" class="text ff-noto">連絡電話</label>
                            <input id="mobile" class="ff-noto" type="text" name="mobile3" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label for="address" class="text ff-noto">聯絡地址</label>
                            <input id="address" class="ff-noto" type="text" name="address3" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label for="lineId" class="text ff-noto">Line ID</label>
                            <input id="lineId" class="ff-noto" type="text" name="lineId" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label for="country" class="text ff-noto">國籍</label>
                            <input id="country" class="ff-noto" type="text" name="country" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label for="criticalIllness" class="text ff-noto">重大疾病</label>
                            <input id="criticalIllness" class="ff-noto" type="text" name="criticalIllness" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label for="emergencyContact" class="text ff-noto">緊急聯絡人</label>
                            <input id="emergencyContact" class="ff-noto" type="text" name="emergencyContact" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label for="emergencyContactRelation" class="text ff-noto">緊急聯絡人關係</label>
                            <input id="emergencyContactRelation" class="ff-noto" type="text"
                                name="emergencyContactRelation" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="btns flex">
                            <a href="./shopping-cart-3.php">
                                <div class="backward-btn ff-noto">上一步</div>
                            </a>

                            <input type="submit" name="order-info" value="下一步" class="forward-btn ff-noto">

                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </section>



    <?php include __DIR__ . '/parts-php/html-footer.php'; ?>

    <div class="spaceForFixed-mobile"></div>

    <?php include __DIR__ . '/parts-php/html-fixedBar.php'; ?>
    <?php include __DIR__ . '/parts-php/html-scripts.php'; ?>

    <script>
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;
    const personalId_re = /^[A-Z]\d{9}$/;
    const $name = $('#name');
    const $email = $('#email');
    const $mobile = $('#mobile');
    const $address = $('#address');
    const $personalId = $('#personalId');
    const $country = $('#country');
    const $criticalIllness = $('#criticalIllness');
    const $emergencyContact = $('#emergencyContact');
    const $emergencyContactRelation = $('#emergencyContactRelation');
    const $checkBox = document.querySelectorAll('li.gender input');
    const inputs = document.querySelectorAll('ul input:not(input.forward-btn)');

    inputs.forEach(function(el) {
        el.addEventListener('keyup', returnColor);

        function returnColor() {
            if (window.matchMedia("(max-width: 700px)").matches) {
                $(this).css('border-bottom', '1px solid #bbbbbb');
            } else {
                $(this).css('border', '1px solid #bbbbbb');
            }
            $(this).next().text('');
        }
    })

    function checkForm() {

        let isPass = true;

        if ($name.val().length < 2) {
            isPass = false;
            if (window.matchMedia("(max-width: 700px)").matches) {
                $name.css('border-bottom', '1px solid rgb(219, 71, 71)');
            } else {
                $name.css('border', '1px solid rgb(219, 71, 71)');
            }
            $name.next().text('請輸入正確的姓名');
        } else if (!personalId_re.test($personalId.val())) {
            isPass = false;
            if (window.matchMedia("(max-width: 700px)").matches) {
                $personalId.css('border-bottom', '1px solid rgb(219, 71, 71)');
            } else {
                $personalId.css('border', '1px solid rgb(219, 71, 71)');
            }
            $personalId.next().text('請輸入正確的身分證字號');
        } else if (!email_re.test($email.val())) {
            isPass = false;
            if (window.matchMedia("(max-width: 700px)").matches) {
                $email.css('border-bottom', '1px solid rgb(219, 71, 71)');
            } else {
                $email.css('border', '1px solid rgb(219, 71, 71)');
            }
            $email.next().text('請輸入正確的e-mail');
        } else if (!mobile_re.test($mobile.val())) {
            isPass = false;
            if (window.matchMedia("(max-width: 700px)").matches) {
                $mobile.css('border-bottom', '1px solid rgb(219, 71, 71)');
            } else {
                $mobile.css('border', '1px solid rgb(219, 71, 71)');
            }
            $mobile.next().text('請輸入正確的聯絡電話');
        } else if ($address.val() === '') {
            isPass = false;
            if (window.matchMedia("(max-width: 700px)").matches) {
                $address.css('border-bottom', '1px solid rgb(219, 71, 71)');
            } else {
                $address.css('border', '1px solid rgb(219, 71, 71)');
            }
            $address.next().text('請輸入正確的聯絡地址');
        } else if ($country.val() === '') {
            isPass = false;
            if (window.matchMedia("(max-width: 700px)").matches) {
                $country.css('border-bottom', '1px solid rgb(219, 71, 71)');
            } else {
                $country.css('border', '1px solid rgb(219, 71, 71)');
            }
            $country.next().text('請輸入正確的國籍');
        } else if ($criticalIllness.val() === '') {
            isPass = false;
            if (window.matchMedia("(max-width: 700px)").matches) {
                $criticalIllness.css('border-bottom', '1px solid rgb(219, 71, 71)');
            } else {
                $criticalIllness.css('border', '1px solid rgb(219, 71, 71)');
            }
            $criticalIllness.next().text('若無重大疾病史，請填" 無 "');
        } else if ($emergencyContact.val().length < 2) {
            isPass = false;
            if (window.matchMedia("(max-width: 700px)").matches) {
                $emergencyContact.css('border-bottom', '1px solid rgb(219, 71, 71)');
            } else {
                $emergencyContact.css('border', '1px solid rgb(219, 71, 71)');
            }
            $emergencyContact.next().text('請填入正確的緊急聯絡人姓名');
        } else if (isPass) {
            $.post(
                'shopping-cart-3-1-api.php',
                $(document.form2).serialize(),
                function(data) {
                    if (data.success) {
                        location.href = 'shopping-cart-4.php';
                    }
                }, 'json'
            )
        }

    }
    </script>

    <?php include __DIR__ . '/parts-php/html-endingTag.php'; ?>