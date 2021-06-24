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
    <link rel="stylesheet" href="./css/shopping-cart-4.css" />
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

    <section class="credit-card-section hero-section">
        <div class="container">
            <h2 class="title ff-noto">填寫信用卡資料</h2>
            <div class="credit-card">
                <div class="card-info">
                    <p class="visa ff-airbnb"><i>VISA</i></p>
                    <div class="img">
                        <svg class="icon-chip svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-chip"></use>
                        </svg>
                    </div>
                    <ul class="card-number flex">
                        <li class="group-1">
                            <span>●</span>
                            <span>●</span>
                            <span>●</span>
                            <span>●</span>
                        </li>
                        <li class="group-2">
                            <span>●</span>
                            <span>●</span>
                            <span>●</span>
                            <span>●</span>
                        </li>
                        <li class="group-3">
                            <span>●</span>
                            <span>●</span>
                            <span>●</span>
                            <span>●</span>
                        </li>
                        <li class="group-4">
                            <span class="num ff-airbnb">4</span>
                            <span class="num ff-airbnb">5</span>
                            <span class="num ff-airbnb">6</span>
                            <span class="num ff-airbnb">7</span>
                        </li>
                    </ul>

                    <div class="name-date flex">
                        <div class="box">
                            <p class="small ff-airbnb">CARDHOLDER NAME</p>
                            <p class="big ff-airbnb">John Doe</p>
                        </div>
                        <div class="box">
                            <p class="small ff-airbnb">EXPIRE DATE</p>
                            <p class="big ff-airbnb">05 / 2021</p>
                        </div>
                    </div>
                </div>


                <p class="text ff-airbnb none">Select Card Type</p>
                <div class="chooseCards flex">
                    <p class="text ff-airbnb visa">Visa</p>
                    <p class="text ff-airbnb mastercard">Master Card</p>
                </div>

                <form name="form3" action="./shopping-cart-5.php" class="card-form" method="post" novalidate
                    onsubmit="checkForm(); return false;">
                    <ul>
                        <li class="box flex">
                            <label for="name" class="text ff-noto">持卡人姓名</label>
                            <input id="name" class="ff-noto" type="text" name="name" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label for="number" class="text ff-noto">信用卡卡號</label>
                            <input id="number" class="ff-airbnb" type="text" name="number" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label class="text ff-noto" for="expireDate">信用卡有效年月</label>
                            <input id="expireDate" class="ff-noto" type="date" name="expireDate" required>
                            <span class="small ff-noto"></span>
                        </li>
                        <li class="box flex">
                            <label class="text ff-noto" for="ccv">CCV</label>
                            <input id="ccv" class="ff-noto" type="text" name="ccv" required>
                            <span class="small ff-noto"></span>
                        </li>

                        <li class="btns flex">
                            <a href="./shopping-cart-3-1.php">
                                <div class="backward-btn ff-noto">上一步</div>
                            </a>

                            <input type="submit" name="credit-card-info" value="結帳" class="forward-btn ff-noto">

                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </section>

    <div class="delete-item-modal">
        <div class="container">
            <div class="delete-warning-card">
                <div class="flex">
                    <svg class="icon-cross svg none">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-cross"></use>
                    </svg>
                </div>
                <p class="text ff-noto">
                    正在進行付款......<br>
                    請勿關閉視窗
                    <svg class="icon-warning-rounded svg">
                        <use xlink:href="./icomoon/symbol-defs.svg#icon-warning-rounded"></use>
                    </svg>
                </p>

            </div>
        </div>
    </div>


    <?php include __DIR__ . '/parts-php/html-footer.php'; ?>

    <div class="spaceForFixed-mobile"></div>

    <?php include __DIR__ . '/parts-php/html-fixedBar.php'; ?>
    <?php include __DIR__ . '/parts-php/html-scripts.php'; ?>

    <script>
    // 驗證信用卡4碼
    const creditCard_re = /^\d{4}-\d{4}-\d{4}-\d{4}$/;
    const ccv_re = /^\d{3}$/;
    const $name = $('#name');
    const $number = $('#number');
    const $ccv = $('#ccv');
    const inputs = document.querySelectorAll('ul input:not(input.forward-btn)');
    const delItemModal = document.querySelector('.delete-item-modal');
    const checkOut = document.querySelector('.card-form .forward-btn');
    const exitDelPage = document.querySelector('.delete-item-modal .icon-cross');
    const delCard = document.querySelector('.delete-warning-card');

    checkOut.addEventListener('click', () => {
        console.log(checkForm());
        if (checkForm()) {
            delItemModal.classList.add('open');
            delCard.classList.add('open');
        }
    });

    exitDelPage.addEventListener('click', () => {
        delItemModal.classList.remove('open');
        delCard.classList.remove('open');
    });

    delItemModal.addEventListener("click", (e) => {
        if (e.currentTarget.classList.contains('delete-item-modal')) {
            delItemModal.classList.remove('open');
            delCard.classList.remove('open');
        }
    });

    // 當輸入錯誤時顯示紅框，紅框顯示隨著RWD變化
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
            $name.next().text('請輸入正確的持卡人姓名');
        } else if (!creditCard_re.test($number.val())) {
            isPass = false;
            if (window.matchMedia("(max-width: 700px)").matches) {
                $number.css('border-bottom', '1px solid rgb(219, 71, 71)');
            } else {
                $number.css('border', '1px solid rgb(219, 71, 71)');
            }
            $number.next().text('請輸入正確的信用卡號');
        } else if (!ccv_re.test($ccv.val())) {
            isPass = false;
            if (window.matchMedia("(max-width: 700px)").matches) {
                $ccv.css('border-bottom', '1px solid rgb(219, 71, 71)');
            } else {
                $ccv.css('border', '1px solid rgb(219, 71, 71)');
            }
            $ccv.next().text('請輸入正確的CCV號碼');
        } else {
            setTimeout(function() {
                document.form3.submit();
            }, 1500);
        }

        return isPass;
    }
    </script>

    <?php include __DIR__ . '/parts-php/html-endingTag.php'; ?>