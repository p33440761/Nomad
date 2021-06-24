<?php include __DIR__.'/parts-php/config.php';?>
<?php
$title="登山記事細節頁";
$pageName="notelist";

$sid=isset($_GET['sid']) ? intval($_GET['sid']):1;

$n_sql = "SELECT note.*, members.`profile_image`, members.`nickname` FROM note JOIN members ON note.member_id=members.id AND note.sid = $sid";

$stmt=$pdo->query($n_sql);
$row=$stmt->fetch();

$heart_sql = "SELECT * FROM `favorites`";
$h_stmt = $pdo->query($heart_sql);
$h_rows = $h_stmt->fetchAll();


$where = 'WHERE 1';

if (!empty($_SESSION['user'])) {
    $nid = intval($_SESSION['user']['id']);
    $where .= " AND f.`type`=3 AND f.`member_id`= $nid";
    //f代表favorites的縮寫

    $f_sql = sprintf("SELECT f.target_id FROM note
    LEFT JOIN favorites f ON f.target_id = note.sid
    $where");
    $favorites = $pdo->query($f_sql)->fetchAll();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/open_notebook.css">
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
    <div class="webmodal"></div>
    <div class="notice-modal">
        <div class="container">
            <div class="notice-card">
                <p class="text ff-noto">請先登入會員</p>
                <p class="confirm-btn ff-noto">確認</p>
            </div>
        </div>
    </div>
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
    <div class="background container hero-section">
        <div class="wrapper">
            <form action="" method="post" id="comment_form" name="form" novalidate onsubmit="checkForm();return false;">
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
                    <div class="profile" id="profile"
                        value="<?= empty($_SESSION['user']['profile_image']) ? '' : $_SESSION['user']['profile_image'] ?>">
                        <img class="profilenew"
                            src="./images/<?= empty($_SESSION['user']['profile_image']) ? 'Ellipse 17.png' : $_SESSION['user']['profile_image'] ?>"
                            alt="">
                    </div>
                    <div class="ponamedate">
                        <span class="editor" id="poname"><?= $_SESSION['user']['nickname'] ?></span>
                        <span id="podate" class="date"><?= date("Y/m/d")?></span>
                    </div>
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


        <div class="mask">
            <div class="webclose" id="webclose" onclick="javascript:location.href='./notebook.php'">
                <svg class="webclose" version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                    viewBox="0 0 20 20">
                    <title>webclose</title>
                    <path
                        d="M10 8.586l-7.071-7.071-1.414 1.414 7.071 7.071-7.071 7.071 1.414 1.414 7.071-7.071 7.071 7.071 1.414-1.414-7.071-7.071 7.071-7.071-1.414-1.414-7.071 7.071z">
                    </path>
                </svg>
                </a>
            </div>
            <span class="title">登山記事</span>
            <div class="notification"></div>
            <button class="btn btn-primary addnote">
                <img class="edit_note" src="./notebook-image/edit_note_black_24dp.png" alt="">
                <div class="btn_text" id="myPopup" onclick="checkLogin()">新增話題</div>
            </button>
            <button class="web_edit" id="scroll_edit" onclick="checkLogin()">
                <img class="edit_btn" src="./notebook-image/edit_note_black_24dp.png" alt="">
            </button>
            <div class="open_note">
                <div class="card" data-sid="<?= $row['sid']?>">
                    <div class="card_nav">
                        <img class="profile" src="<?= WEB_ROOT?>/images/<?=$row['profile_image']?>" alt="">
                        <span class="name_date ff-noto" id="name"> <?= $row['nickname']?> ·</span>
                        <span class="name_date ff-raleway" id="date"><?=$row['date']?></span>
                        <!-- <div class="view">
                        <svg class="eye" version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                            viewBox="0 0 20 20">
                            <title>eye</title>
                            <path
                                d="M0.2 10c1.86-3.592 5.548-6.004 9.8-6.004s7.94 2.412 9.771 5.943l0.029 0.061c-1.86 3.592-5.548 6.004-9.8 6.004s-7.94-2.412-9.771-5.943l-0.029-0.061zM10 14c2.209 0 4-1.791 4-4s-1.791-4-4-4v0c-2.209 0-4 1.791-4 4s1.791 4 4 4v0zM10 12c-1.105 0-2-0.895-2-2s0.895-2 2-2v0c1.105 0 2 0.895 2 2s-0.895 2-2 2v0z">
                            </path>
                        </svg>
                        <span class="view_num"> 0 瀏覽次數</span>
                    </div> -->
                        <!-- <div class="web_like">
                        <svg class="web_like_heart" version="1.1" xmlns="http://www.w3.org/2000/svg" width="25"
                            height="25" viewBox="0 0 512 512">
                            <title></title>
                            <g id="icomoon-ignore">
                            </g>
                            <path
                                d="M377.594 32c-53.815 0-100.129 43.777-121.582 89.5-21.469-45.722-67.789-89.5-121.608-89.5-74.191 0-134.404 60.22-134.404 134.416 0 150.923 152.25 190.497 256.011 339.709 98.077-148.288 255.989-193.603 255.989-339.709 0-74.196-60.215-134.416-134.406-134.416z">
                            </path>
                        </svg>
                        <span class="web_like_num">0 按讚人數</span>
                    </div> -->
                    </div>
                    <div class="info_img">
                        <img src="<?= WEB_ROOT?>/notebook-image/<?=$row['info_image']?>" alt="">
                    </div>
                    <div class="info_title">
                        <span class="ff-noto"><?= $row['diarytitle']?></span>
                        <div class="svg1">
                            <svg class="share_link" version="1.1" xmlns="http://www.w3.org/2000/svg" width="23"
                                height="23" viewBox="0 0 512 512">
                                <title></title>
                                <g id="icomoon-ignore">
                                </g>
                                <path
                                    d="M432 352c-22.58 0-42.96 9.369-57.506 24.415l-215.502-107.751c0.657-4.126 1.008-8.353 1.008-12.664s-0.351-8.538-1.008-12.663l215.502-107.751c14.546 15.045 34.926 24.414 57.506 24.414 44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80c0 4.311 0.352 8.538 1.008 12.663l-215.502 107.752c-14.546-15.045-34.926-24.415-57.506-24.415-44.183 0-80 35.818-80 80 0 44.184 35.817 80 80 80 22.58 0 42.96-9.369 57.506-24.414l215.502 107.751c-0.656 4.125-1.008 8.352-1.008 12.663 0 44.184 35.817 80 80 80s80-35.816 80-80c0-44.182-35.817-80-80-80z">
                                </path>
                            </svg>
                            <div class="webheart heart-id-<?= $row['sid']?>" onclick="onHeartclick(event)">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="25"
                                    viewBox="0 0 512 512">
                                    <title></title>
                                    <g id="icomoon-ignore"></g>
                                    <path
                                        d="M377.594 32c-53.815 0-100.129 43.777-121.582 89.5-21.469-45.722-67.789-89.5-121.608-89.5-74.191 0-134.404 60.22-134.404 134.416 0 150.923 152.25 190.497 256.011 339.709 98.077-148.288 255.989-193.603 255.989-339.709 0-74.196-60.215-134.416-134.406-134.416z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="detail_text">
                            <p>
                                <?= $row['text_infor']?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mob_card" data-sid="<?= $row['sid']?>">
            <div class="mobclose_note">
                <svg class="mobclose_note" version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    viewBox="0 0 20 20" onclick="javascript:location.href='./notebook.php'">
                    <title>mobclose_note</title>
                    <path
                        d="M10 8.586l-7.071-7.071-1.414 1.414 7.071 7.071-7.071 7.071 1.414 1.414 7.071-7.071 7.071 7.071 1.414-1.414-7.071-7.071 7.071-7.071-1.414-1.414-7.071 7.071z">
                    </path>
                </svg>
            </div>
            <div class="card_nav">
                <img class="profile" src="<?= WEB_ROOT?>/images/<?=$row['profile_image']?>" alt="">
                <span class="name_date ff-noto" id="name"> <?= $row['nickname']?></span>
                <span class="name_date ff-raleway" id="date"><?=$row['date']?></span>
            </div>
            <div class="mob_svg">
                <svg class="share_link" version="1.1" xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                    viewBox="0 0 512 512">
                    <title></title>
                    <g id="icomoon-ignore">
                    </g>
                    <path
                        d="M432 352c-22.58 0-42.96 9.369-57.506 24.415l-215.502-107.751c0.657-4.126 1.008-8.353 1.008-12.664s-0.351-8.538-1.008-12.663l215.502-107.751c14.546 15.045 34.926 24.414 57.506 24.414 44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80c0 4.311 0.352 8.538 1.008 12.663l-215.502 107.752c-14.546-15.045-34.926-24.415-57.506-24.415-44.183 0-80 35.818-80 80 0 44.184 35.817 80 80 80 22.58 0 42.96-9.369 57.506-24.414l215.502 107.751c-0.656 4.125-1.008 8.352-1.008 12.663 0 44.184 35.817 80 80 80s80-35.816 80-80c0-44.182-35.817-80-80-80z">
                    </path>
                </svg>
                <div class="heart heart-id-<?= $row['sid']?>" onclick="onMoHeartclick(event)">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="31" height="25" viewBox="0 0 512 512">
                        <title></title>
                        <g id="icomoon-ignore">
                        </g>
                        <path
                            d="M377.594 32c-53.815 0-100.129 43.777-121.582 89.5-21.469-45.722-67.789-89.5-121.608-89.5-74.191 0-134.404 60.22-134.404 134.416 0 150.923 152.25 190.497 256.011 339.709 98.077-148.288 255.989-193.603 255.989-339.709 0-74.196-60.215-134.416-134.406-134.416z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="mobinfo_image">
                <img src="<?= WEB_ROOT?>/notebook-image/<?=$row['info_image']?>" alt="">
            </div>
            <div class="mobinfo_title"><?= $row['diarytitle']?></div>
            <div class="mobdetail_info">
                <p>
                    <?= $row['text_infor']?>
                </p>
            </div>
            <button id="edit" onclick="checkLogin()">
                <img class="edit_btn" src="./notebook-image/edit_note_black_24dp.png" alt="">
            </button>
            <div class="notification"></div>
        </div>
    </div>
    <?php include __DIR__ . '/parts-php/html-footer.php'; ?>
    <div class="spaceForFixed-mobile"></div>
    <?php include __DIR__ . '/parts-php/html-fixedBar.php'; ?>
    <?php include __DIR__ . '/parts-php/html-scripts.php'; ?>
    <script>
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


    getHearts();

    function getHearts() {
        $.get('notebook_api.php', function(data) {
            nData = data;

            if (nData.favorites && nData.favorites.length) {
                nData.favorites.forEach(o => {
                    $('.webheart-id-' + o.target_id).addClass('fill')
                });
                nData.favorites.forEach(a => {
                    $('.heart-id-' + a.target_id).addClass('fill')
                });
            }
        }, 'json');
    }



    const mData = <?= isset($_SESSION['user']) ? json_encode($_SESSION['user']) : 'false'?>;

    const onHeartclick = function(e) {
        if (!mData) {
            noticeModal.classList.add('open');
            noticeCard.classList.add('open');
            return;
        }
        const webheart = $(e.currentTarget);
        const card = webheart.closest('.card');
        const nid = card.attr('data-sid');
        console.log('nid:', nid);
        const type = 3;

        $.get('favorites3-api.php', {
            action: 'add',
            nid,
            type
        }, function(data) {
            if (data.addOrDel === 'add') {
                webheart.addClass('fill');
            } else {
                webheart.removeClass('fill');
            }
        }, 'json');
    }

    const onMoHeartclick = function(e) {
        if (!mData) {
            noticeModal.classList.add('open');
            noticeCard.classList.add('open');
            return;
        }
        const heart = $(e.currentTarget);
        const mob_card = heart.closest('.mob_card');
        const nid = mob_card.attr('data-sid');
        console.log('nid:', nid);
        const type = 3;

        $.get('favorites3-api.php', {
            action: 'add',
            nid,
            type
        }, function(data) {
            if (data.addOrDel === 'add') {
                heart.addClass('fill');
            } else {
                heart.removeClass('fill');
            }
        }, 'json');
    }







    // let heart= $('.mob_svg svg');

    // $('.mob_svg').on('click', 'svg', function(){
    //     $(this).toggleClass('open');
    // });

    // let webheart= $('.svg svg');

    // $('.svg').on('click', 'svg', function(){
    //     $(this).toggleClass('open');
    // });

    $(".close").on("click", function() {
        $(".close, .wrapper").removeClass("active");
        $("body").css('overflow-y', 'auto');
        $('.webmodal').removeClass("active");
    });

    const shareDialog = document.querySelector('.share_dialog');
    const closeButton = document.querySelector('.close_button');
    const share_links = document.querySelectorAll('.share_link');
    share_links.forEach(share_link => {
        share_link.addEventListener('click', event => {
            if (navigator.share) {
                navigator.share({
                        title: 'WebShare API Demo',
                        url: 'https://codepen.io/ayoisaiah/pen/YbNazJ'
                    }).then(() => {
                        console.log('Thanks for sharing!');
                    })
                    .catch(console.error);
            } else {
                shareDialog.classList.add('is-open');
            }
        });
    })

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

    function myFunction() {
        var copyText = document.getElementById("linktext");

        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");

        // alert("Copied the link:" + copyText.value);
    }

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
    </script>
    <?php include __DIR__. '/parts-php/html-endingTag.php';?>