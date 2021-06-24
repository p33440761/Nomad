let sid2 = 0;

$(".comment").click(function (event) {
  window.clickedCommentBtn = $(this);
  $(".yc_modal").addClass("yc_open");
  let me = $(event.currentTarget);
  let card = me.closest(".member_purchase_wrap_box_product");
  let sid = card.attr("data-sid");

  sid2 = sid;

  $("#yc_modal_img").attr(
    "src",
    card.find(".member_favorite_img img").attr("src")
  );
});

$(".yc_modal_delete,.submit").click(function () {
  console.log("hiiii");
  $("#modal_comment,#modal_selecttime,#modal_edit").removeClass("yc_open");
});
$(".adj_time").click(function () {
  console.log("hi22");
  $("#modal_selecttime").addClass("yc_open");
});
$("#modify_info").click(function () {
  $("#cover").addClass("rotate_180");
  $("#back").css("transform", "rotateY(0deg)");
});
$("#modify_info_submit").click(function () {
  console.log("cancle");
  $("#cover").removeClass("rotate_180");
  $("#back").css("transform", "rotateY(-180deg)");
});
$(".member_content_btn.member_content_btn_delete").click(function () {
  console.log("cancle");
  $("#cover").removeClass("rotate_180");
  $("#back").css("transform", "rotateY(-180deg)");
});

// navbar
$(window).on("scroll", function () {
  const $win = $(window),
    winH = $win.height(),
    current_pos = $win.scrollTop();

  $(".section").each(function () {
    const section = $(this);
    const num = section.attr("data-scroll-target");

    if (
      section.offset().top < current_pos + winH / 2 &&
      current_pos + winH / 2 < section.offset().top + section.outerHeight()
    ) {
      $('.member_nav_item [data-scroll-trigger="' + num + '"]').addClass(
        "text_active"
      );
    } else {
      $('.member_nav_item [data-scroll-trigger="' + num + '"]').removeClass(
        "text_active"
      );
    }
  });
});
$(".member_nav_link").click(function (e) {
  e.preventDefault();
  const target = $($(this).attr("href"));
  if (target.length) {
    const scrollTo = target.offset().top;
    $("body, html").animate({ scrollTop: scrollTo + "px" }, 500);
  }
});

//   tabs  待改

let tabHeader = document.getElementsByClassName("member_tab_header")[0];
let tabIndicator = document.getElementsByClassName("member_tab_indicator")[0];
let tabBody = document.getElementsByClassName("member_tab_body");
let tabsPane = tabHeader.getElementsByTagName("div");
// console.log(tabsPane)
let tabHeader02 = document.getElementsByClassName("member_tab_header")[1];
let tabIndicator02 = document.getElementsByClassName("member_tab_indicator")[1];
let tabsPane02 = tabHeader02.getElementsByTagName("div");

if ($(window).width() > 992) {
  for (let i = 0; i < tabsPane.length; i++) {
    tabsPane[i].addEventListener("click", function () {
      tabHeader
        .getElementsByClassName("member_active")[0]
        .classList.remove("member_active");
      tabsPane[i].classList.add("member_active");
      tabIndicator.style.left = `calc(calc(100%/3)*${i})`;
    });
  }

  $("#favorite_product").click(function () {
    $("#favorite").css("transform", "translateX(-685px)");
  });
  $("#favorite_blog").click(function () {
    $("#favorite").css("transform", "translateX(0px)");
    $("#favorite").css("transform", "translateX(-1370px)");
  });
  $("#favorite_schedule").click(function () {
    $("#favorite").css("transform", "translateX(0px)");
    $("#favorite").css("transform", "translateX(0px)");
  });
  for (let i = 0; i < tabsPane02.length; i++) {
    tabsPane02[i].addEventListener("click", function () {
      tabHeader02
        .getElementsByClassName("member_active")[0]
        .classList.remove("member_active");
      tabsPane02[i].classList.add("member_active");
      tabIndicator02.style.left = `calc(calc(100%/2)*${i})`;
    });
  }
  $("#purchase_product").click(function () {
    console.log("click");
    $("#purchase").css("transform", "translateX(-693px)");
  });
  $("#purchase_schedule").click(function () {
    $("#purchase").css("transform", "translateX(0px)");
  });
}
if ($(window).width() <= 375) {
  for (let i = 0; i < tabsPane.length; i++) {
    tabsPane[i].addEventListener("click", function () {
      tabHeader
        .getElementsByClassName("member_active")[0]
        .classList.remove("member_active");
      tabsPane[i].classList.add("member_active");
      tabIndicator.style.left = `calc(calc(100%/3)*${i})`;
    });
  }
  $("#favorite_product").click(function () {
    $("#favorite").css("transform", "translateX(-320px)");
  });
  $("#favorite_blog").click(function () {
    $("#favorite").css("transform", "translateX(0px)");
    $("#favorite").css("transform", "translateX(-640px)");
  });
  $("#favorite_schedule").click(function () {
    $("#favorite").css("transform", "translateX(0px)");
    $("#favorite").css("transform", "translateX(0px)");
  });
  for (let i = 0; i < tabsPane02.length; i++) {
    tabsPane02[i].addEventListener("click", function () {
      tabHeader02
        .getElementsByClassName("member_active")[0]
        .classList.remove("member_active");
      tabsPane02[i].classList.add("member_active");
      tabIndicator02.style.left = `calc(calc(100%/2)*${i})`;
    });
  }
  $("#purchase_product").click(function () {
    console.log("click");
    $("#purchase").css("transform", "translateX(-320px)");
  });
  $("#purchase_schedule").click(function () {
    $("#purchase").css("transform", "translateX(0px)");
  });
}

$(".member_delete").click(function () {
  let delete_sec = $(this).parent("div");
  delete_sec.remove();
});
//stars
let ratedIndex = -1;

$(document).ready(function () {
  resetStarColors();
  // if (localStorage.getItem("ratedIndex") != null)
  //   setStars(parseInt(localStorage.getItem("ratedIndex")));

  $(".fa-star").on("click", function () {
    ratedIndex = parseInt($(this).data("index"));
    localStorage.setItem("ratedIndex", ratedIndex); //重整畫面仍記得星星數(不要刪他)
  });
  //https://www.youtube.com/watch?v=i04U0C-v_to&t=1001s&ab_channel=CodingPassiveIncome

  $(".fa-star").mouseover(function () {
    // console.log('in');
    resetStarColors();
    var currentIndex = parseInt($(this).data("index"));

    setStars(currentIndex);
  });
  $(".fa-star").mouseleave(function () {
    // console.log('out');
    resetStarColors();
    if (ratedIndex != -1) {
      setStars(ratedIndex);
    }
  });
});

function setStars(max) {
  for (let i = 0; i <= max; i++) {
    $(".fa-star:eq(" + i + ")").css("color", "#f0a500");
  }
}
function resetStarColors() {
  $(".fa-star").css("color", "white");
}
