<?php include __DIR__. '/parts-php/config.php'; ?>
<?php
$title = '購物車';
$pageName = 'cart';


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/shopping-cart-1.css" />
    <title>購物車頁</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
</head>

<body>
    <?php include __DIR__ . '/parts-php/html-navbar.php'; ?>



    <?php if(empty($_SESSION['cart']) && empty($_SESSION['p_cart'])): ?>
    <div class="noItem">
        <p class="text ff-noto">
            目前購物車是空的<br>
            快去看看有哪些適合妳的行程吧。
        </p>
    </div>
    <?php else: ?>


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



    <section class="shopping-cart-section hero-section">
        <div class="container">
            <div class="shopping-cart">

                <div class="align">
                    <span class="line"></span>
                    <h2 class="text ff-noto">商品</h2>
                    <span class="line2 none"></span>
                </div>

                <?php foreach($_SESSION['p_cart'] as $p): ?>
                <div class="itemBox flex" data-sid="<?= $p['sid'] ?>">
                    <div class="delete-item-modal">
                        <div class="container">
                            <div class="delete-warning-card">
                                <div class="flex">
                                    <svg class="icon-cross svg none">
                                        <use xlink:href="./icomoon/symbol-defs.svg#icon-cross"></use>
                                    </svg>
                                </div>
                                <p class="text ff-noto">刪除後的商品將無法復原<br>確認刪除嗎?</p>
                                <div class="btns flex">
                                    <p class="cancel-btn ff-noto">取消</p>
                                    <p class="confirm-btn ff-noto" onclick="deleteProduct(event)">確認</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="left flex">
                        <div class="left-1 flex">
                            <div class="left-1-1 product-image">
                                <img src="<?= WEB_ROOT ?>/mountain-bag/<?= $p['product_id'] ?>.jpg" alt="">
                            </div>
                            <div class="left-1-2 w300">
                                <p class="title ff-noto product-name">
                                    <?= $p['product_name'] ?>
                                </p>
                                <p class="text ff-noto">
                                    <?= $p['product_id'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="left-2">
                            <p class="minus" onclick="minusProductQty(event)">
                                <svg class="icon-remove svg">
                                    <use xlink:href="./icomoon/symbol-defs.svg#icon-remove"></use>
                                </svg>
                            </p>
                            <p class="num ff-airbnb quantity" data-qty="<?= $p['quantity'] ?>"><?= $p['quantity'] ?></p>
                            <p class="add" onclick="addProductQty(event)">
                                <svg class="icon-add svg">
                                    <use xlink:href="./icomoon/symbol-defs.svg#icon-add"></use>
                                </svg>
                            </p>
                        </div>
                        <div class="left-3"><span class="num ff-airbnb price"
                                data-price="<?= $p['product_price'] ?>"></span>
                        </div>
                    </div>
                    <div class="right">
                        <svg class="icon-cross svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-cross"></use>
                        </svg>
                    </div>
                </div>
                <?php endforeach; ?>


                <div class="align">
                    <span class="line"></span>
                    <h2 class="text ff-noto">行程</h2>
                    <span class="line2 none"></span>
                </div>

                <?php foreach($_SESSION['cart'] as $v): ?>
                <div class="itemBox flex" data-sid="<?= $v['sid'] ?>">
                    <div class="delete-item-modal">
                        <div class="container">
                            <div class="delete-warning-card">
                                <div class="flex">
                                    <svg class="icon-cross svg none">
                                        <use xlink:href="./icomoon/symbol-defs.svg#icon-cross"></use>
                                    </svg>
                                </div>
                                <p class="text ff-noto">刪除後的商品將無法復原<br>確認刪除嗎?</p>
                                <div class="btns flex">
                                    <p class="cancel-btn ff-noto">取消</p>
                                    <p class="confirm-btn ff-noto" onclick="deleteItem(event)">確認</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="left flex">
                        <div class="left-1 flex">
                            <div class="left-1-1 schedule-image">

                                <img src="<?= WEB_ROOT ?>/images/<?= $v['schedule_id'] ?>/<?= $v['schedule_id'] ?>.jpeg"
                                    class="card-img-top" alt="">

                            </div>
                            <div class="left-1-2 w150">
                                <p class="title ff-airbnb date">
                                    <?= $v['departure_date'] ?>
                                </p>
                                <p class="text ff-airbnb">
                                    <?= $v['schedule_title'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="left-2 ml-6">
                            <p class="minus" onclick="minusQty(event)">
                                <svg class="icon-remove svg">
                                    <use xlink:href="./icomoon/symbol-defs.svg#icon-remove"></use>
                                </svg>
                            </p>
                            <p class="num ff-airbnb quantity" data-qty="<?= $v['quantity'] ?>"><?= $v['quantity'] ?></p>
                            <p class="add" onclick="addQty(event)">
                                <svg class="icon-add svg">
                                    <use xlink:href="./icomoon/symbol-defs.svg#icon-add"></use>
                                </svg>
                            </p>
                        </div>
                        <div class="left-3"><span class="num ff-airbnb price" data-price="<?= $v['price'] ?>"></span>
                        </div>
                    </div>
                    <div class="right">
                        <a href="#">
                            <svg class="icon-cross svg">
                                <use xlink:href="./icomoon/symbol-defs.svg#icon-cross"></use>
                            </svg>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>



                <div class="total">
                    <p class="text ff-noto">小結</p>
                    <p class="text ff-airbnb totalPrice"></p>
                </div>


                <!-- <a href="./shopping-cart-2.php"> -->
                <div class="checkout-cta" onclick="checkLogin()">
                    <p class="text ff-noto">前往結帳</p>
                </div>
                <!-- </a> -->
            </div>
        </div>
    </section>
    <?php endif; ?>

    <div class="notice-modal">
        <div class="container">
            <div class="notice-card">
                <p class="text ff-noto">請登入會員後再結帳</p>
                <p class="confirm-btn ff-noto">確認</p>
            </div>
        </div>
    </div>
    </div>


    <?php include __DIR__ . '/parts-php/html-footer.php'; ?>

    <div class="spaceForFixed-mobile"></div>

    <?php include __DIR__ . '/parts-php/html-fixedBar.php'; ?>
    <?php include __DIR__ . '/parts-php/html-scripts.php'; ?>

    <script>
    const quantity = $('.quantity');
    //金額轉換、加逗號
    const dollarCommas = function(n) {
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    };

    //刪除行程
    function deleteItem(event) {
        let me = $(event.currentTarget);
        let sid = me.closest('.itemBox').attr('data-sid');

        $.get('cart-api-2.php', {
            action: 'delete',
            sid: sid
        }, function(data) {

            me.closest('itemBox').remove();

            if ($('.shopping-cart-section > .itemBox').length < 1) {
                location.reload(); //重新輸入
            }
            showCartCount(data);
            calPrices();
        }, 'json');
    };

    //刪除商品
    function deleteProduct(event) {
        let me = $(event.currentTarget);
        let sid = me.closest('.itemBox').attr('data-sid');

        $.get('cart-api-2.php', {
            action: 'delete',
            pid: sid
        }, function(data) {

            me.closest('itemBox').remove();

            if ($('.shopping-cart-section > .itemBox').length < 1) {
                location.reload(); //重新輸入
            }
            showCartCount(data);
            calPrices();
        }, 'json');
    };

    //計算價格
    const calPrices = function() {
        let total = 0;

        $('.itemBox').each(function(index, element) {
            const $price = $(this).find('.price');
            const price = $price.attr('data-price') * 1;
            $price.text('$ ' + dollarCommas(price));

            const qty = $(this).find('.quantity').text() * 1;

            $(this).find('.price').text('$ ' + dollarCommas(price * parseInt(qty)) + ' TWD');
            total += price * parseInt(qty);
        });
        $('.totalPrice').text('$ ' + dollarCommas(total) + ' TWD');
    }

    //點擊 + 增加行程數量
    const addQty = function(event) {
        const el = $(event.currentTarget);
        let qty = el.prev('.quantity').val();
        const sid = el.closest('.itemBox').attr('data-sid');

        qty++;

        el.prev('.quantity').val(qty);
        el.prev('.quantity').text(qty);

        $.get('cart-api-2.php', {
            action: 'add',
            sid,
            qty
        }, function(data) {
            showCartCount(data);
            calPrices();
        }, 'json');
    }

    //點擊 - 減少行程數量
    const minusQty = function(event) {
        const el = $(event.currentTarget);
        let qty = el.next('.quantity').val();
        const sid = el.closest('.itemBox').attr('data-sid');

        if (qty > 1) {

            qty--;
            el.next('.quantity').val(qty);
            el.next('.quantity').text(qty);

            el.style = "background-color: var(-fifth-color)";

            $.get('cart-api-2.php', {
                action: 'add',
                sid,
                qty
            }, function(data) {
                showCartCount(data);
                calPrices();
            }, 'json');
        }
    }

    //點擊 + 增加商品數量
    const addProductQty = function(event) {
        const el = $(event.currentTarget);
        let pqty = el.prev('.quantity').val();
        const pid = el.closest('.itemBox').attr('data-sid');

        pqty++;

        el.prev('.quantity').val(pqty);
        el.prev('.quantity').text(pqty);

        $.get('cart-api-2.php', {
            action: 'add',
            pid,
            pqty
        }, function(data) {
            showCartCount(data);
            calPrices();
        }, 'json');
    }

    //點擊 - 減少商品數量
    const minusProductQty = function(event) {
        const el = $(event.currentTarget);
        let pqty = el.next('.quantity').val();
        const pid = el.closest('.itemBox').attr('data-sid');

        if (pqty > 1) {

            pqty--;
            el.next('.quantity').val(pqty);
            el.next('.quantity').text(pqty);

            $.get('cart-api-2.php', {
                action: 'add',
                pid,
                pqty
            }, function(data) {
                showCartCount(data);
                calPrices();
            }, 'json');
        }
    }

    $(function() {
        //呈現數量
        quantity.each(function() {
            const qty = $(this).attr('data-qty') * 1;
            $(this).val(qty);
        });
        calPrices();
    });

    // 尚未登入會員顯示無法結帳通知，並轉往登入頁面
    const noticeModal = document.querySelector('.notice-modal');
    const confirmBtn = document.querySelector('.notice-modal .confirm-btn');
    const noticeCard = document.querySelector('.notice-modal .notice-card');

    confirmBtn.addEventListener('click', () => {
        noticeModal.classList.remove('open');
        noticeCard.classList.remove('open');
        setTimeout(() => {
            location.href = 'signUp.php#form2';
        }, 500)
    })

    //按下結帳按鈕，檢查是否已登入會員
    function checkLogin() {
        $.get('shopping-cart-1-api.php', function(data) {
            if (data.success) {
                location.href = 'shopping-cart-2.php';
            } else {
                noticeModal.classList.add('open');
                noticeCard.classList.add('open');
            }
        }, 'json')
    }

    //   點選叉叉可以刪除商品
    const delItemModal = document.querySelector('.delete-item-modal');
    const delItemBtns = document.querySelectorAll('.icon-cross');
    const cancelBtns = document.querySelectorAll('.cancel-btn');
    const exitDelPages = document.querySelectorAll('.delete-item-modal .icon-cross');
    const delCard = document.querySelector('.delete-warning-card');


    delItemBtns.forEach(function(delItemBtn) {
        delItemBtn.addEventListener('click', function() {
            $(this).closest('.itemBox').find('.delete-item-modal').addClass('open');
            $(this).closest('.itemBox').find('.delete-warning-card').addClass('open');
        });
    });

    cancelBtns.forEach(function(cancelBtn) {
        cancelBtn.addEventListener('click', function() {
            $(this).closest('.delete-item-modal').removeClass('open');
            $(this).closest('.delete-warning-card').removeClass('open');
        });
    });

    exitDelPages.forEach(function(exitDelPage) {
        exitDelPage.addEventListener('click', function() {
            $(this).closest('.delete-item-modal').removeClass('open');
            $(this).closest('.delete-warning-card').removeClass('open');
        });
    });
    </script>


    <?php include __DIR__ . '/parts-php/html-endingTag.php'; ?>