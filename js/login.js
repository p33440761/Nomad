const signInBtn = document.getElementById("signIn");
const signUpBtn = document.getElementById("signUp");
const fistForm = document.getElementById("form1");
const secondForm = document.getElementById("form2");
const form_reset_btn_01 = document.getElementById("form_reset_btn_01");
const form_reset_btn_02 = document.getElementById("form_reset_btn_02");
const form_reset_btn_03 = document.getElementById("form_reset_btn_03");
const container = document.querySelector(".container");

$("#signIn").click(function () {
  $(".container").removeClass("right-panel-active");
  $(".reset_sec").addClass("reset");
});

$("#signUp").click(function () {
  $(".container").addClass("right-panel-active");
  $("#reset_sec_01,#reset_sec_02,#reset_sec_03").removeClass("open");
  $("#reset_sec_01,#reset_sec_02,#reset_sec_03").removeClass("moveto_0");
  $(".reset_sec").addClass("reset");
});

fistForm.addEventListener("submit", (e) => e.preventDefault());
secondForm.addEventListener("submit", (e) => e.preventDefault());
form_reset_btn_01.addEventListener("submit", (e) => e.preventDefault());
form_reset_btn_02.addEventListener("submit", (e) => e.preventDefault());
form_reset_btn_03.addEventListener("submit", (e) => e.preventDefault());

$("#forgot_password").click(function () {
  console.log("forgot_password");
  $("#reset_sec_01").addClass("moveto_0");
  $("#reset_sec_01").addClass("open");
});
// $('#reset_btn_01').click(function(){
// 	console.log('reset_btn_01');
// 	$('#reset_sec_02').addClass('moveto_0');
// 	$('#reset_sec_02').addClass('open');
// })
// $('#reset_btn_02').click(function(){
// 	$('#reset_sec_03').addClass('moveto_0');
// 	$('#reset_sec_03').addClass('open');
// })

// $("#have_account").click(function () {
//   //   console.log("555");
//   $(".container.right-panel-active .container--signup").css(
//     "transform",
//     "translateX(-100%)"
//   );
//   $(".container.right-panel-active .container--signin.only").css(
//     "transform",
//     "translateX(0)"
//   );
//   $(".reset_sec").css("transform", "translateX(100%)");
// });

// if ($(window).width()<=375){
// 	$('#forgot_password').click(function(){
// 		// console.log('222')
// 		$('#reset_sec_01').css('transform','translateX(0)')
// 		$('.container.right-panel-active .container--signin.only').css('transform','translateX(-100%)');
// 		$('#reset_btn_01').click(function(){
// 			$('#reset_sec_02').css('transform','translateX(0)');
// 		})
// 		$('#reset_btn_02').click(function(){
// 			$('#reset_sec_03').css('transform','translateX(0)');
// 		})

// 	})
// }
