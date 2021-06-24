<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="./js/nomad.js"></script>

<script>
var area = '';
var level = '';
var diffString = '';
var areaString = '';
$(document).ready(function() {
    $(".dropdown.d1 p").click(function() {
        var ul = $(".dropdown.d1 ul");
        if (ul.css("display") == "none") {
            ul.slideDown("fast");
        } else {
            ul.slideUp("fast");
        }
    });

    $(".dropdown.d1 ul li a").click(function() {
        level = $(this).text();
        console.log('level', level);
        $('.landmark_all div').hide();

        if (level === "A") {
            diffString = ".diffA"
        } else if (level === "B") {
            diffString = ".diffB"
        } else if (level === "C") {
            diffString = ".diffC"
        } else {
            diffString = "";
        }




        if (areaString !== "") {
            const finalString = diffString + areaString;
            $(areaString).hide();
            $(finalString).show();
        } else if (diffString !== "" && areaString === "") {
            $(diffString).show();
        } else {
            $('.landmark_all div').show();
        }

        $.get('/nomad/levelAndarea_api.php', {
            level,
            area
        }, function(data) {

            var e = document.querySelector(".dropdown.d3 ul");
            var e1 = document.querySelectorAll(".dropdown.d3 ul li");
            // e.firstElementChild can be used.
            var child = e.lastElementChild;
            while (child) {
                console.log(child);
                e.removeChild(child);
                child = e.lastElementChild;
            }
            for (i = 0; i < data.rows.length; i++) {
                var newElement = document.createElement("li");
                e.appendChild(newElement);
                var e1 = document.querySelectorAll(".dropdown.d3 ul li");
                var newElement1 = document.createElement("a");
                newElement1.textContent = data.rows[i].main_mountain;
                newElement1.setAttribute('href', "#");
                e1[e1.length - 1].appendChild(newElement1);


                // console.log(data.rows[i].main_mountain);
            }

        }, 'json');


        $(".dropdown.d1 p").html(level);
        $(".dropdown.d1 ul").hide();
    });


});
$(document).ready(function() {
    $(".dropdown.d2 p").click(function() {
        var ul = $(".dropdown.d2 ul");
        if (ul.css("display") == "none") {
            ul.slideDown("fast");
        } else {
            ul.slideUp("fast");
        }
    });

    $(".dropdown.d2 ul li a").click(function() {
        area = $(this).text();
        console.log('area', area);


        $('.landmark_all div').hide();

        if (area === "北") {
            areaString = ".areaN"
        } else if (area === "中") {
            areaString = ".areaM"
        } else if (area === "南") {
            areaString = ".areaS"
        } else if (area === "東") {
            areaString = ".areaE"
        } else {
            areaString = "";
        }

        //  if(area === "北"){
        //   areaString = ".areaN"
        //  }else if(area === "中"){
        //   areaString = ".areaM"
        //  }else if(area === "南"){
        //   areaString = ".areaS"
        //  }else if(area === "東"){
        //   areaString = ".areaE"
        //  }else{
        //   areaString = "";
        // }

        if (diffString !== "") {
            const finalString = diffString + areaString;
            $(diffString).hide();
            $(finalString).show();
        } else if (diffString === "" && areaString !== "") {
            $(areaString).show();
        } else {
            $('.landmark_all div').show();
        }





        $.get('/nomad/levelAndarea_api.php', {
            level,
            area
        }, function(data) {
            // data.foreach();


            var e = document.querySelector(".dropdown.d3 ul");
            var e1 = document.querySelectorAll(".dropdown.d3 ul li");
            // e.firstElementChild can be used.
            var child = e.lastElementChild;
            while (child) {
                console.log(child);
                e.removeChild(child);
                child = e.lastElementChild;
            }
            for (i = 0; i < data.rows.length; i++) {
                var newElement = document.createElement("li");
                e.appendChild(newElement);
                var e1 = document.querySelectorAll(".dropdown.d3 ul li");
                var newElement1 = document.createElement("a");
                newElement1.textContent = data.rows[i].main_mountain;
                newElement1.setAttribute('href', "#");
                e1[e1.length - 1].appendChild(newElement1);


                // console.log(data.rows[i].main_mountain);
            }
            // const idList = data.map(item => object.vlues(item)[0]);
            // console.log(data);
        }, 'json');


        $(".dropdown.d2 p").html(area);
        $(".dropdown.d2 ul").hide();

    });
});

function checkIFTwoCondition() {

    if (diffString !== "") {

    }

    if (areaString !== "") {

    }
    let finalString = diffString + areaString

    $(areaString).hide();

    $(finalString).show();
}
$(document).ready(function() {
    $(".dropdown.d3 p").click(function() {
        var ul = $(".dropdown.d3 ul");
        if (ul.css("display") == "none") {
            ul.slideDown("fast");
        } else {
            ul.slideUp("fast");
        }
    });

    $(document).on('click', '.dropdown.d3 ul li a', function() {
        console.log('hi', $(this).text());
        var selectmountain = $(this).text();
        $.get('/nomad/level_api.php', {
            selectmountain,
        }, function(data) {
            console.log('data', data);
            $('#main_mountain').text(data.rows[0].main_mountain);
            $('#other_mountain_1').text(data.rows[0].other_mountain_1);
            $('#other_mountain_2').text(data.rows[0].other_mountain_2);
            $('#other_mountain_3').text(data.rows[0].other_mountain_3);
            $('#info1').text(data.rows[0].info1);
            $('#info2').text(data.rows[0].info2);
            $('#info3').text(data.rows[0].info3);
            $('#high_1').text(data.rows[0].high_1);
            $('#high_2').text(data.rows[0].high_2);
            $('#high_3').text(data.rows[0].high_3);
            $('#detail_area').text(data.rows[0].detail_area);



            const imgN3 = './images/' + data.rows[0].img1_mountain + '/' + data.rows[0]
                .img1_mountain + '_2.jpeg'
            console.log(imgN3);
            const imgN2 = './images/' + data.rows[0].img1_mountain + '/' + data.rows[0]
                .img1_mountain + '_1.jpeg'
            console.log(imgN2);
            const imgN1 = './images/' + data.rows[0].img1_mountain + '/' + data.rows[0]
                .img1_mountain + '.jpeg'
            console.log(imgN1);
            $('#img1_mountain').attr('src', imgN1);
            $('#img2_mountain').attr('src', imgN2);
            $('#img3_mountain').attr('src', imgN3);

            // $('#eq1').attr('src', eq1);

            // const eq1 = './images/big-photo/' + data.p_rows.product_id + '.jpg'



        }, 'json');
        $(".dropdown.d3 p").html(selectmountain);
        $(".dropdown.d3 ul").hide();


    });


    $(document).on('click', '.dropdown.d3 ul li a', function() {
        $('.mountain_box').css('display', 'block')
        console.log('hi', $(this).text());
        var eqImg = $(this).text();
        $.get('/nomad/level_eq_api.php', {
            eqImg,
        }, function(data) {
            console.log('data', data);


            const a1 = 'http://localhost/nomad/product-detail.php?sid=' + data.p_rows[0].sid
            const a2 = 'http://localhost/nomad/product-detail.php?sid=' + data.p_rows[1].sid
            const a3 = 'http://localhost/nomad/product-detail.php?sid=' + data.p_rows[2].sid
            const a4 = 'http://localhost/nomad/product-detail.php?sid=' + data.p_rows[3].sid
            console.log(a1);

            const eq1 = 'big-photo/' + data.p_rows[0].product_id + '.jpg'
            console.log(eq1);
            const eq2 = 'big-photo/' + data.p_rows[1].product_id + '.jpg'
            console.log(eq2);
            const eq3 = 'big-photo/' + data.p_rows[2].product_id + '.jpg'
            console.log(eq3);
            const eq4 = 'big-photo/' + data.p_rows[3].product_id + '.jpg'
            console.log(eq4);

            $('#eq1').attr('src', eq1);
            $('#eq2').attr('src', eq2);
            $('#eq3').attr('src', eq3);
            $('#eq4').attr('src', eq4);

            $('#a1').attr('href', a1);
            $('#a2').attr('href', a2);
            $('#a3').attr('href', a3);
            $('#a4').attr('href', a4);



        }, 'json');
        $(".dropdown.d3 p").html(eqImg);
        $(".dropdown.d3 ul").hide();


    });

});









$('.dropdown.d3 ul li a').click(function() {
    $('.mountain_box').css('display', 'block')
})
$('.close_info').click(function() {
    $('.mountain_box').css('display', 'none')
})
$('.btn-info').click(function() {
    $('.level_light_box').css('display', 'block')
})
$('.close_level').click(function() {
    $('.level_light_box').css('display', 'none')
})
$('.other_mountain_2').click(function() {
    $('.card1').css('display', 'none')
    $('.card3').css('display', 'none')
    console.log('hi')
    $('.card2').css('display', 'block')
    $('.other_mountain_2').addClass('active')
    $('.other_mountain_1').removeClass('active')
    $('.other_mountain_3').removeClass('active')
})
$('.other_mountain_3').click(function() {
    $('.card2').css('display', 'none')
    $('.card1').css('display', 'none')
    console.log('hi')
    $('.card3').css('display', 'block')
    $('.other_mountain_3').addClass('active')
    $('.other_mountain_2').removeClass('active')
    $('.other_mountain_1').removeClass('active')
})
$('.other_mountain_1').click(function() {
    $('.card2').css('display', 'none')
    $('.card3').css('display', 'none')
    console.log('hi')
    $('.card1').css('display', 'block')
    $('.other_mountain_1').addClass('active')
    $('.other_mountain_2').removeClass('active')
    $('.other_mountain_3').removeClass('active')
});
</script>