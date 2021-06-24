<?php include __DIR__. '/parts-php/config.php'; ?>
<?php 
$title = '購物車';
$pageName = 'form';
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/shopping-cart-3.css" />
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
            <h2 class="title ff-noto">訂購人/收貨人資訊</h2>
            <div class="orderer-info-form">
                <form name="form1" action="./shopping-cart-3-1.php" method="post" novalidate
                    onsubmit="checkForm(); return false;">
                    <h4 class="text ff-noto">訂購人資訊</h4>
                    <ul class="form-items">
                        <li class="box flex">
                            <label for="name" class="text ff-noto">姓名</label>
                            <input id="name" class="ff-noto" type="text" name="name" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label for="email" class="text ff-noto">E-mail</label>
                            <input id="email" class="ff-noto" type="email" name="email" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label for="mobile" class="text ff-noto">連絡電話</label>
                            <input id="mobile" class="ff-noto" type="text" name="mobile" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label for="address" class="text ff-noto">聯絡地址</label>
                            <input id="address" class="ff-noto" type="text" name="address" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex checkbox">
                            <label class="text ff-noto">收貨人資訊</label>
                            <input class="checkbox" type="checkbox" name="info-same" value="html-orderer-info">
                            <span class="text ff-noto none"> 收件資料與訂購人相同請打勾</span>
                            <span class="text ff-noto">同訂購人資料請打勾</span>
                        </li>

                        <li class="box flex">
                            <label for="name2" class="text ff-noto">姓名</label>
                            <input id="name2" class="ff-noto" type="text" name="name2" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label for="email2" class="text ff-noto">E-mail</label>
                            <input id="email2" class="ff-noto" type="email" name="email2" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label for="mobile2" class="text ff-noto">連絡電話</label>
                            <input id="mobile2" class="ff-noto" type="text" name="mobile2" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label for="address2" class="text ff-noto">聯絡地址</label>
                            <input id="address2" class="ff-noto" type="text" name="address2" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="btns flex">
                            <a href="./shopping-cart-2.php">
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
    const $name = $('#name');
    const $email = $('#email');
    const $mobile = $('#mobile');
    const $address = $('#address');
    const $name2 = $('#name2');
    const $email2 = $('#email2');
    const $mobile2 = $('#mobile2');
    const $address2 = $('#address2');
    // const fields = [$name, $email, $mobile, $address];
    const checkBox = document.querySelector('input.checkbox');
    const inputs = document.querySelectorAll('ul input:not(input.checkbox, input.forward-btn)');

    // 點擊同訂購人資料checkbox後貼上資料
    checkBox.addEventListener('click', function() {
        if (checkBox.checked) {
            console.log(checkBox.checked);
            $name2.val($name.val());
            $email2.val($email.val());
            $mobile2.val($mobile.val());
            $address2.val($address.val());
        } else {
            console.log(checkBox.checked);
            $name2.val('');
            $email2.val('');
            $mobile2.val('');
            $address2.val('');
        }

    })

    // 輸入錯誤後，下次點擊input輸入資料時，紅色報錯消失
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

    // 表單檢查
    function checkForm() {

        //回復原來的狀態
        // fields.forEach(el => {
        //     if (window.matchMedia("(max-width: 700px)").matches) {
        //         el.css('border-bottom', '1px solid #bbbbbb');
        //     } else {
        //         el.css('border', '1px solid #bbbbbb');
        //     }
        //     el.next().text('');
        // })

        let isPass = true;

        if ($name.val().length < 2) {
            isPass = false;
            if (window.matchMedia("(max-width: 700px)").matches) {
                $name.css('border-bottom', '1px solid rgb(219, 71, 71)');
            } else {
                $name.css('border', '1px solid rgb(219, 71, 71)');
            }
            $name.next().text('請輸入正確的姓名');
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
        } else if (isPass) {
            $.post(
                'shopping-cart-3-api.php',
                $(document.form1).serialize(),
                function(data) {
                    if (data.success) {
                        location.href = 'shopping-cart-3-1.php';
                    } else {
                        location.href = 'shopping-cart-4.php';
                    }
                },
                'json'
            )
        }

    }
    </script>
    <?php include __DIR__ . '/parts-php/html-endingTag.php'; ?>