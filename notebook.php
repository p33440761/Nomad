<?php include __DIR__.'/parts-php/config.php';?>
<?php

$title="新增post";
$pageName="post";


$sid=isset($_GET['sid'])?intval($_GET['sid']):1;
$n_sql = "SELECT * FROM `note` WHERE `sid`=sid ";
$stmt=$pdo->query($n_sql);
$row=$stmt->fetch();




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/notebook.css">
    <link rel="stylesheet" href="./css/nomadHomePage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100&display=swap" rel="stylesheet">

    <title>notebook</title>
</head>

<body>
    <?php include __DIR__ . '/parts-php/html-navbar.php'; ?>

    <div class="hero-section">
        <div class="webmodal"></div>
        <div class="share_dialog">
            <h4 class="dialog_title">Share this vlog</h4>
            <button class="close_button">
                <svg class="close_button" version="1.1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 20 20">
                    <title>close</title>
                    <path
                        d="M10 8.586l-7.071-7.071-1.414 1.414 7.071 7.071-7.071 7.071 1.414 1.414 7.071-7.071 7.071 7.071 1.414-1.414-7.071-7.071 7.071-7.071-1.414-1.414-7.071 7.071z">
                    </path>
                </svg>
            </button>
            <div class="link">
                <input class="pen_url" id="linktext" value="https://www.google.com.tw/"></input>
                <button class="copy_link" onclick="myFunction()">Copy Link</button>
            </div>
        </div>
        <div class="background ">
            <div class="wrapper">
                <form action="" method="post" id="comment_form" name="form" novalidate
                    onsubmit="checkForm();return false;">
                    <div class="close">
                        <svg class="close" version="1.1" xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                            viewBox="0 0 20 20">
                            <title>close</title>
                            <path
                                d="M10 8.586l-7.071-7.071-1.414 1.414 7.071 7.071-7.071 7.071 1.414 1.414 7.071-7.071 7.071 7.071 1.414-1.414-7.071-7.071 7.071-7.071-1.414-1.414-7.071 7.071z">
                            </path>
                        </svg>
                    </div>
                    <header>
                        <div id="profile"
                            value="<?= empty($_SESSION['user']['profile_image']) ? '' : $_SESSION['user']['profile_image'] ?>">
                            <img class="profilenew"
                                src="./images/<?= empty($_SESSION['user']['profile_image']) ? 'Ellipse 17.png' : $_SESSION['user']['profile_image'] ?>"
                                alt="">
                        </div>
                        <span class="editor" id="name"> <?= $_SESSION['user']['nickname'] ?> </span>
                        <span id="date" class="nodate"><?= date("Y/m/d")?></span>
                    </header>
                    <div class="sections">
                        <section class="active">
                            <div class="form_group">
                                <input type="text" placeholder="Title" id="diarytitle" name="diarytitle" required>
                                <small class="form-text error"></small>
                            </div>
                            <div class="images form_group">
                                <div class="pic" type="file" name="info_image" id="info_image" required>
                                    ADD
                                </div>
                            </div>
                            <div class="form_group">
                                <textarea type="text" placeholder="Enter Description" id="text_infor" name="text_infor"
                                    required></textarea>
                                <small class="form-text error"></small>
                            </div>
                        </section>
                    </div>
                    <footer>
                        <ul>
                            <li><span id="reset">reset</span></li>
                            <button type="submit" class="send">Send</button>
                        </ul>
                    </footer>
                </form>
            </div>
            <div class="notice-modal">
                <div class="container">
                    <div class="notice-card">
                        <p class="text ff-noto">請先登入會員</p>
                        <p class="confirm-btn ff-noto">確認</p>
                    </div>
                </div>
            </div>
            <div class="container web_note">
                <div class="mask">
                    <span class="title">登山記事</span>
                    <div class="notification"></div>
                    <button class="btn btn-primary addnote">
                        <img class="edit_note" src="./notebook-image/edit_note_black_24dp.png" alt="">
                        <div class="btn_text" id="myPopup" onclick="checkLogin()">新增話題</div>
                    </button>
                    <button class="web_edit" id="scroll_edit" onclick="checkLogin()">
                        <img class="edit_btn" src="./notebook-image/edit_note_black_24dp.png" alt="">
                    </button>
                    <div class="box container">
                    </div>
                    <div class="page_list_web">
                        <div class="flexBox flex">
                            <span>
                                <a href="javascript: backwardPage()">
                                    <li class="arrow">
                                        <svg class="icon-arrow_back_ios svg">
                                            <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_back_ios"></use>
                                        </svg>
                                    </li>
                                </a>
                            </span>
                            <ul class="page_list flex">


                            </ul>
                            <span>
                                <a href="javascript: forwardPage()">
                                    <li class="arrow">
                                        <svg class="icon-arrow_forward_ios svg">
                                            <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                                        </svg>
                                    </li>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box2 container"></div>
        <div class="page_list_mob">
            <div class="flexBox flex">
                <a href="javascript: backwardPage()">
                    <li class="arrow">
                        <svg class="icon-arrow_back_ios svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_back_ios"></use>
                        </svg>
                    </li>
                </a>
                <ul class="page_list flex">


                </ul>
                <a href="javascript: forwardPage()">
                    <li class="arrow">
                        <svg class="icon-arrow_forward_ios svg">
                            <use xlink:href="./icomoon/symbol-defs.svg#icon-arrow_forward_ios"></use>
                        </svg>
                    </li>
                </a>
            </div>
        </div>
        <button id="edit" onclick="checkLogin()">
            <img class="edit_btn" src="./notebook-image/edit_note_black_24dp.png" alt="">
        </button>


        <div class="notification"></div>



    </div>

    <?php include __DIR__ . '/parts-php/html-fixedBar.php'; ?>
    <?php include __DIR__ . '/parts-php/html-footer.php'; ?>
    <div class="spaceForFixed-mobile"></div>
    <?php include __DIR__ . '/parts-php/html-scripts.php'; ?>

    <script>
    let page = 1;
    let nData = {};
    const box = $('.box');
    const box2 = $('.box2');
    const pagination = $('.page_list');
    const notelistTpl = o => {
        return `
            <div class="card" data-sid="${o.sid}">
                        <div class="card_nav container">
                            <div id="profile">
                            <img class="profilenew" src="<?= WEB_ROOT?>/images/${o.profile_image}" alt="">
                            </div>
                            <span class="editor" id="name"> ${o.nickname} ·</span>
                            <span id="date" class="date">${o.date.replace(/-/g, "/")}</span>
                            <div class="heartshare">
                            <div class="heart heart-id-${o.sid}" onclick="onHeartclick(event)">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="30" height="25"
                                viewBox="0 0 512 512">
                                <title></title>
                                <g id="heart_fill">
                                </g>
                                <path
                                    d="M377.594 32c-53.815 0-100.129 43.777-121.582 89.5-21.469-45.722-67.789-89.5-121.608-89.5-74.191 0-134.404 60.22-134.404 134.416 0 150.923 152.25 190.497 256.011 339.709 98.077-148.288 255.989-193.603 255.989-339.709 0-74.196-60.215-134.416-134.406-134.416z">
                                </path>
                            </svg>
                            </div>
                            <svg class="share_link" version="1.1" xmlns="http://www.w3.org/2000/svg" width="30"
                                height="27" viewBox="0 0 512 512">
                                <title></title>
                                <g id="icomoon-ignore">
                                </g>
                                <path
                                    d="M432 352c-22.58 0-42.96 9.369-57.506 24.415l-215.502-107.751c0.657-4.126 1.008-8.353 1.008-12.664s-0.351-8.538-1.008-12.663l215.502-107.751c14.546 15.045 34.926 24.414 57.506 24.414 44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80c0 4.311 0.352 8.538 1.008 12.663l-215.502 107.752c-14.546-15.045-34.926-24.415-57.506-24.415-44.183 0-80 35.818-80 80 0 44.184 35.817 80 80 80 22.58 0 42.96-9.369 57.506-24.414l215.502 107.751c-0.656 4.125-1.008 8.352-1.008 12.663 0 44.184 35.817 80 80 80s80-35.816 80-80c0-44.182-35.817-80-80-80z">
                                </path>
                            </svg>
                            </div>
                        </div>
                        <a href="./open_notebook.php?sid=${o.sid}">
                            <div class="text_box" >
                                <span class="diarytitle ff-noto" id="diarytitle">${o.diarytitle}</span>
                                <div class="mainbox">
                                    <div class="info_box">
                                        <p class="text_info" id="text_infor">
                                            ${o.text_infor}
                                        </p>
                                    </div>
                                    <div id="info_image">
                                        <img class="info_image" src="<?= WEB_ROOT?>/notebook-image/${o.info_image}"
                                        alt="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="respond">
                                <div class="view">
                                    <svg class="eye" version="1.1" xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" viewBox="0 0 20 20">
                                        <title>eye</title>
                                        <path
                                            d="M0.2 10c1.86-3.592 5.548-6.004 9.8-6.004s7.94 2.412 9.771 5.943l0.029 0.061c-1.86 3.592-5.548 6.004-9.8 6.004s-7.94-2.412-9.771-5.943l-0.029-0.061zM10 14c2.209 0 4-1.791 4-4s-1.791-4-4-4v0c-2.209 0-4 1.791-4 4s1.791 4 4 4v0zM10 12c-1.105 0-2-0.895-2-2s0.895-2 2-2v0c1.105 0 2 0.895 2 2s-0.895 2-2 2v0z">
                                        </path>
                                    </svg>
                                    <span class="view_num" id="view_num" >${ (!$('.card').eq(0).data('sid') ||  $('.card').eq(0).data('sid') == o.sid  )? 0 :  view()}</span>
                                </div>
                                <div class="like">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 512 512">
                                        <title></title>
                                        <g id="icomoon-ignore">
                                        </g>
                                        <path
                                            d="M377.594 32c-53.815 0-100.129 43.777-121.582 89.5-21.469-45.722-67.789-89.5-121.608-89.5-74.191 0-134.404 60.22-134.404 134.416 0 150.923 152.25 190.497 256.011 339.709 98.077-148.288 255.989-193.603 255.989-339.709 0-74.196-60.215-134.416-134.406-134.416z">
                                        </path>
                                    </svg>
                                    <span class="like_num">${ (!$('.card').eq(0).data('sid') ||  $('.card').eq(0).data('sid') == o.sid  )? 0 :  like()}</span>
                                </div>
                            </div>
                        </a>
            </div>
            `;
    }
    const monotelistTpl = a => {
        return `
        <div class="mocard" modata-sid="${a.sid}" >
            <div class="card_nav container">
                <div id="profile"><img class="moprofilenew" src="<?= WEB_ROOT?>/images/${a.profile_image}" alt="">
                </div>
                <span class="editor ff-noto" id="name"> ${a.nickname}</span>
                <span id="date" class="date ff-raleway">${a.date}</span>
                <div class="moheartshare">
                <svg class="share_link" version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="26"
                    viewBox="0 0 512 512">
                    <title></title>
                    <g id="icomoon-ignore">
                    </g>
                    <path
                        d="M432 352c-22.58 0-42.96 9.369-57.506 24.415l-215.502-107.751c0.657-4.126 1.008-8.353 1.008-12.664s-0.351-8.538-1.008-12.663l215.502-107.751c14.546 15.045 34.926 24.414 57.506 24.414 44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80c0 4.311 0.352 8.538 1.008 12.663l-215.502 107.752c-14.546-15.045-34.926-24.415-57.506-24.415-44.183 0-80 35.818-80 80 0 44.184 35.817 80 80 80 22.58 0 42.96-9.369 57.506-24.414l215.502 107.751c-0.656 4.125-1.008 8.352-1.008 12.663 0 44.184 35.817 80 80 80s80-35.816 80-80c0-44.182-35.817-80-80-80z">
                    </path>
                </svg>
                <div class="moheart moheart-id-${a.sid}" onclick="onMoHeartClick(event)">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="30" height="23"
                    viewBox="0 0 512 512">
                    <title></title>
                    <g id="icomoon-ignore">
                    </g>
                    <path
                        d="M377.594 32c-53.815 0-100.129 43.777-121.582 89.5-21.469-45.722-67.789-89.5-121.608-89.5-74.191 0-134.404 60.22-134.404 134.416 0 150.923 152.25 190.497 256.011 339.709 98.077-148.288 255.989-193.603 255.989-339.709 0-74.196-60.215-134.416-134.406-134.416z">
                    </path>
                </svg>
                </div>
                </div>
            </div>
            <a href="./open_notebook.php?sid=${a.sid}">
            <div class="info_image container" id="info_image">
                <img class="info_image" src="<?= WEB_ROOT?>/notebook-image/${a.info_image}" alt="">
            </div>
            <div class="text_box" onclick="javascript:location.href='./open_notebook.html'">
                <span>${a.diarytitle}</span>
                <div class="text_info">
                    <p class="text_info" id="text_infor">
                    ${a.text_infor}
                    </p>
                </div>
            </div>
            <button class="more_btn more_btn-primary more">more</button>
            <div class="respond">
            <div class="viewlike">
                <div class="view">
                    <svg class="eye" version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 20 20">
                        <title>eye</title>
                        <path
                            d="M0.2 10c1.86-3.592 5.548-6.004 9.8-6.004s7.94 2.412 9.771 5.943l0.029 0.061c-1.86 3.592-5.548 6.004-9.8 6.004s-7.94-2.412-9.771-5.943l-0.029-0.061zM10 14c2.209 0 4-1.791 4-4s-1.791-4-4-4v0c-2.209 0-4 1.791-4 4s1.791 4 4 4v0zM10 12c-1.105 0-2-0.895-2-2s0.895-2 2-2v0c1.105 0 2 0.895 2 2s-0.895 2-2 2v0z">
                        </path>
                    </svg>
                    <span class="view_num" id="view_num"  >${ (!$('.card').eq(0).data('sid') ||  $('.card').eq(0).data('sid') == a.sid  )? 0 :  view()}</span>
                </div>
                <div class="like">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
                        <title></title>
                        <g id="icomoon-ignore">
                        </g>
                        <path
                            d="M377.594 32c-53.815 0-100.129 43.777-121.582 89.5-21.469-45.722-67.789-89.5-121.608-89.5-74.191 0-134.404 60.22-134.404 134.416 0 150.923 152.25 190.497 256.011 339.709 98.077-148.288 255.989-193.603 255.989-339.709 0-74.196-60.215-134.416-134.406-134.416z">
                        </path>
                    </svg>
                    <span class="like_num">${ (!$('.card').eq(0).data('sid') ||  $('.card').eq(0).data('sid') == a.sid  )? 0 :  like()}</span>
                </div>
            </div> 
            </div>
            </a>  
        </div>    
            `
    }
    const pageBtnTpl = n => {
        return `<a href="#${n}" onclick="changePage(${n})">
                    <li class="ff-airbnb text-first ${ n===page ? 'active' : ''}">
                        <p class="num ff-airbnb">${n}</p>
                    </li>
                </a>`;
    }

    getNotes();

    function getNotes() {
        $.get('notebook_api.php', {
            page
        }, function(data) {
            nData = data;
            renderNote();
            renderPagination();
            renderMonote();

            if (nData.favorites && nData.favorites.length) {
                nData.favorites.forEach(o => {
                    $('.heart-id-' + o.target_id).addClass('fill')
                });
                nData.favorites.forEach(a => {
                    $('.moheart-id-' + a.target_id).addClass('fill')
                });
            }
        }, 'json');
    }

    function ScrollBack() {
        window.scrollTo({
            top: 100,
            left: 0,
            behavior: 'smooth'
        });
    }

    function changePage(p) {
        page = p;
        ScrollBack();
        getNotes();
    }

    function backwardPage() {
        page = page - 1;
        if (!(page < 1)) {
            getNotes();
            ScrollBack()
        }
    }

    function forwardPage() {
        if (!(page >= nData.totalPages)) {
            page++;
            getNotes();
            ScrollBack()
        }
    }

    function renderPagination() {
        pagination.html('');
        for (let i = page - 2; i <= page + 2; i++) {
            if (i >= 1 && i <= nData.totalPages)
                pagination.append(pageBtnTpl(i));
        }
    }



    function renderNote() {
        box.html('');
        if (nData.rows && nData.rows.forEach) {
            nData.rows.forEach(el => {
                box.append(notelistTpl(el));
            });
        }
    }

    function renderMonote() {
        box2.html('');
        if (nData.rows && nData.rows.forEach) {
            nData.rows.forEach(al => {
                box2.append(monotelistTpl(al));
            });
        }
    }



    const mData = <?= isset($_SESSION['user']) ? json_encode($_SESSION['user']) : 'false'?>;

    const onHeartclick = function(e) {
        if (!mData) {
            noticeModal.classList.add('open');
            noticeCard.classList.add('open');
            return;
        }
        const heart = $(e.currentTarget);
        const card = heart.closest('.card');
        const nid = card.attr('data-sid');
        console.log('nid:', nid);
        const type = 3;
        const webNum = +$(heart).closest('.card_nav').next().find('.like_num').text();

        $.get('favorites3-api.php', {
            action: 'add',
            nid,
            type
        }, function(data) {
            if (data.addOrDel === 'add') {
                heart.addClass('fill');
                $(heart).closest('.card_nav').next().find('.like_num').text(webNum + 1);
            } else {
                heart.removeClass('fill');
                $(heart).closest('.card_nav').next().find('.like_num').text(webNum - 1);
            }
        }, 'json');
    }





    const onMoHeartClick = function(h) {
        if (!mData) {
            noticeModal.classList.add('open');
            noticeCard.classList.add('open');
            return;
        }
        const moheart = $(h.currentTarget);
        const mocard = moheart.closest('.mocard');
        const nid = mocard.attr('modata-sid');
        const nowNum = +$(moheart).closest('.card_nav').next().find('.like_num').text();
        console.log('nid:', nid);
        const type = 3;
        $.get('favorites3-api.php', {
            action: 'add',
            nid,
            type
        }, function(data) {
            if (data.addOrDel === 'add') {
                moheart.addClass('fill');
                $(moheart).closest('.card_nav').next().find('.like_num').text(nowNum + 1);
            } else {
                moheart.removeClass('fill');
                $(moheart).closest('.card_nav').next().find('.like_num').text(nowNum - 1);
            }
        }, 'json');

    };


    $('.box').on('click', '.share_link', function() {
        $('.share_dialog').addClass('is-open');
        $('.webmodal').addClass("active");
        $("body").css("overflow-y", 'hidden');

    });
    $('.box2').on('click', '.share_link', function() {
        $('.share_dialog').addClass('is-open');
        $('.webmodal').addClass("active");
        $("body").css("overflow-y", 'hidden');
    });



    const $diarytitle = $('#diarytitle'),
        $text_infor = $('#text_infor');
    const fields = [$diarytitle, $text_infor];

    function checkForm() {

        fields.forEach(al => {
            al.next().text('');
        });

        let isPass = true;

        if ($diarytitle.val().length < 1) {
            isPass = false;
            $diarytitle.css('border', '1px solid red');
            $diarytitle.next().text('');
        }

        if ($diarytitle.val().length > 11) {
            isPass = false;
            $diarytitle.css('border', '1px solid red');
            $diarytitle.next().text('');
            $text_infor.next().text('Title 太長了');
        }


        if ($text_infor.val().length > 900) {
            isPass = false;
            $text_infor.css('border', '1px solid red');
            $text_infor.next().text('Description不符合格式');
        }
        if ($text_infor.val().length < 30) {
            isPass = false;
            $text_infor.css('border', '1px solid red');
            $text_infor.next().text('Description太短了～');
        }
        if (window.file_field && window.file_field.files)
            console.log('window.file_field.files[0]', window.file_field.files[0]);

        if (isPass) {
            let fd = new FormData(document.form);
            if (window.file_field && window.file_field.files)
                fd.append('info_image', window.file_field.files[0]);
            fd.add
            fetch('add_note_api.php', {
                    method: 'POST',
                    body: fd,
                })
                .then(r => r.json())
                .then(data => {
                    console.log(data);
                    if (data.success) {
                        alert("upload success!")
                        location.href = "http://localhost/nomad/notebook.php";
                    }
                })
        }

    }




    (function($) {
        $(document).ready(function() {


            uploadImage()
            resetButton()


            function uploadImage() {
                var button = $('.images .pic')
                var uploader = $('<input type="file" name="info_image" id="info_image" accept="image/*" />')
                var images = $('.images')

                button.on('click', function() {
                    uploader.click()
                })

                uploader.on('change', function() {
                    var reader = new FileReader()
                    reader.onload = function(event) {
                        images.prepend('<div class="img" style="background-image: url(\'' +
                            event.target.result + '\');" rel="' + event.target.result +
                            '"><span>remove</span></div>')
                    }
                    window.file_field = uploader[0];
                    reader.readAsDataURL(uploader[0].files[0])
                    images.show();
                    button.hide();
                })

                images.on('click', '.img', function() {
                    $(this).hide()
                    button.show();
                })


            }


            function resetButton() {
                var resetbtn = $('#reset')
                resetbtn.on('click', function() {
                    reset()
                })
            }

            function reset() {
                $('#diarytitle').val('')
                var topic = $('#topic').val('')
                var text_infor = $('#text_infor').val('')
                var section = $('.sections').val('')

            }

        })
    })(jQuery)

    $(".close").on("click", function() {
        $(".close, .wrapper").removeClass("active");
        $("body").css('overflow-y', 'auto');
        $('.webmodal').removeClass("active");
    })

    let mybutton = document.getElementById("scroll_edit");
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 250) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    };




    let view = function() {

        return Math.floor(Math.random() * 600);


    }

    let like = function() {
        return Math.floor(Math.random() * 600);
    }




    function myFunction() {
        var copyText = document.getElementById("linktext");

        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");

        // alert("Copied the link:" + copyText.value);
    }





    const shareDialog = document.querySelector('.share_dialog');
    const closeButton = document.querySelector('.close_button');
    const share_links = document.querySelectorAll('.share_link');



    closeButton.addEventListener('click', event => {
        shareDialog.classList.remove('is-open');
    });

    $(".share_link").on("click", function() {
        $("body").css("overflow-y", 'hidden');
        $('.webmodal').addClass("active");
    });

    $(".close_button").on("click", function() {
        $("body").css('overflow-y', 'auto');
        $('.webmodal').removeClass("active");
    })


    const noticeModal = document.querySelector('.notice-modal');
    const confirmBtn = document.querySelector('.notice-modal .confirm-btn');
    const noticeCard = document.querySelector('.notice-modal .notice-card');
    // const wrapper=document.querySelector('.wrapper');

    confirmBtn.addEventListener('click', () => {
        noticeModal.classList.remove('open');
        noticeCard.classList.remove('open');
        setTimeout(() => {
            location.href = 'signUp.php#form2';
        }, 500)
    })


    function checkLogin() {
        $.get('post-api.php', function(data) {
            if (data.success) {
                $(".wrapper").addClass("active");
                $("body").css('overflow-y', 'hidden');
                $('.webmodal').addClass("active");
            } else {
                noticeModal.classList.add('open');
                noticeCard.classList.add('open');
                $('.webmodal').removeClass("active");
            }
        }, 'json')
    }
    </script>


    <?php include __DIR__ . '/parts-php/html-endingTag.php'; ?>