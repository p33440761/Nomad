 
</script>
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
  $('path').click(function() {
    $('.weather_box').css('display', 'block')
  })
  const inputField = document.querySelector('.chosen-value');
  const dropdown = document.querySelector('.value-list');
  const dropdownArray = [...document.querySelectorAll('.form_mountain li')];
  console.log(typeof dropdownArray)
  dropdown.classList.add('open');
  inputField.focus(); // Demo purposes only
  let valueArray = [];
  dropdownArray.forEach(item => {
    valueArray.push(item.textContent);
  });

  const closeDropdown = () => {
    dropdown.classList.remove('open');
  }

  inputField.addEventListener('input', () => {
    dropdown.classList.add('open');
    let inputValue = inputField.value.toLowerCase();
    let valueSubstring;
    if (inputValue.length > 0) {
      for (let j = 0; j < valueArray.length; j++) {
        if (!(inputValue.substring(0, inputValue.length) === valueArray[j].substring(0, inputValue.length).toLowerCase())) {
          dropdownArray[j].classList.add('closed');
        } else {
          dropdownArray[j].classList.remove('closed');
        }
      }
    } else {
      for (let i = 0; i < dropdownArray.length; i++) {
        dropdownArray[i].classList.remove('closed');
      }
    }
  });

  dropdownArray.forEach(item => {
    item.addEventListener('click', (evt) => {
      inputField.value = item.textContent;
      dropdownArray.forEach(dropdown => {
        dropdown.classList.add('closed');
      });
    });
  })

  inputField.addEventListener('focus', () => {
    inputField.placeholder = 'search';
    dropdown.classList.add('open');
    dropdownArray.forEach(dropdown => {
      dropdown.classList.remove('closed');
    });
  });

  inputField.addEventListener('blur', () => {
    inputField.placeholder = 'Select';
    dropdown.classList.remove('open');
  });

  document.addEventListener('click', (evt) => {
    const isDropdown = dropdown.contains(evt.target);
    const isInput = inputField.contains(evt.target);
    if (!isDropdown && !isInput) {
      dropdown.classList.remove('open');
    }
  });

$('.form_mountain li').click(function(){

  console.log('hi',$(this).text());
  let searchmountain = $(this).text();
  $('.weather_box').css('display', 'block')
  //設定searchmountain為你所點到的值
  // console.log('hey',searchmountain);
//先定義一個function並塞入一個參數，讓function中的動作知道要抓取哪裏的資料，再傳回呼叫這函示的地方
$.get('/nomad/weather_api.php', 
  //先確定路徑資料夾有沒有錯誤，也記得console.log找錯誤
  {searchmountain},function (data) {
    //這屬於jquery中去抓取data的方式，funtion中還有function。
    //{searchmountain}裡面放值才可以回傳值回去，所以先設定變數
    console.log('data',data)
    //不知道哪邊錯的時候就console.log data
    changeWeatherView(data)
    //上面有一個定義這個的function
  
  }, 'json');
  $('#mountain_name').text(searchmountain);
  //mountain_nmae為你所點到的名字
  
  //data.rows.high_tem
  
})

function changeWeatherView(data) {
  $('#high_tem').text(data.rows[0].high_tem+'℃');
    //因為是抓t_sql的資料，所以要從row抓，而資料只有一筆，會去抓index，而第一筆資料index為0，再抓第一筆中所要的數值
    $('#low_tem').text(data.rows[0].low_tem+'℃');
    $('#tem').text(data.rows[0].tem+'℃');
    $('#wind').text(data.rows[0].wind+'mph');
    $('#rain').text(data.rows[0].rain);
    $('#sunrise').text(data.rows[0].sunrise);
    $('#sunset').text(data.rows[0].sunset);

    $('#three_am_tem').text(data.rows[0].three_am_tem+'℃');

    $('#six_am_tem').text(data.rows[0].six_am_tem+'℃');
    $('#nine_am_tem').text(data.rows[0].nine_am_tem+'℃');
    $('#twelve_pm_tem').text(data.rows[0].twelve_pm_tem+'℃');
    $('#three_pm_tem').text(data.rows[0].three_pm_tem+'℃');
    $('#six_pm_tem').text(data.rows[0].six_pm_tem+'℃');

    $('#nextd1_low').text(data.rows[0].nextd1_low+'℃');
    $('#nextd1_high').text(data.rows[0].nextd1_high+'℃');
    $('#nextd1_wind').text(data.rows[0].nextd1_wind+'mph');
    $('#nextd1_rain').text(data.rows[0].nextd1_rain+'%');

    $('#nextd2_low').text(data.rows[0].nextd2_low+'℃');
    $('#nextd2_high').text(data.rows[0].nextd2_high+'℃');
    $('#nextd2_wind').text(data.rows[0].nextd2_wind+'mph');
    $('#nextd2_rain').text(data.rows[0].nextd2_rain+'%');
    
    $('#nextd3_low').text(data.rows[0].nextd3_low+'℃');
    $('#nextd3_high').text(data.rows[0].nextd3_high+'℃');
    $('#nextd3_wind').text(data.rows[0].nextd3_wind+'mph');
    $('#nextd3_rain').text(data.rows[0].nextd3_rain+'%');
    
    $('#nextd4_low').text(data.rows[0].nextd4_low+'℃');
    $('#nextd4_high').text(data.rows[0].nextd4_high+'℃');
    $('#nextd4_wind').text(data.rows[0].nextd4_wind+'mph');
    $('#nextd4_rain').text(data.rows[0].nextd4_rain+'%');
    
    $('#nextd5_low').text(data.rows[0].nextd4_low+'℃');
    $('#nextd5_high').text(data.rows[0].nextd4_high+'℃');
    $('#nextd5_wind').text(data.rows[0].nextd4_wind+'mph');
    $('#nextd5_rain').text(data.rows[0].nextd4_rain+'%');
    

  

    const rainPercent = +data.rows[0].rain;
    const rainPercent3Am = +data.rows[0].three_am_icon;
    const rainPercent6Am = +data.rows[0].six_am_icon;
    const rainPercent9Am = +data.rows[0].nine_am_icon;
    const rainPercent12Pm = +data.rows[0].twelve_pm_icon;
    const rainPercent3Pm = +data.rows[0].three_pm_icon;
    const rainPercent6Pm = +data.rows[0].six_pm_icon;

    const rainPercentn1 = +data.rows[0].nextd1_rain;
    const rainPercentn2 = +data.rows[0].nextd2_rain;
    const rainPercentn3 = +data.rows[0].nextd3_rain;
    const rainPercentn4 = +data.rows[0].nextd4_rain;
    const rainPercentn5 = +data.rows[0].nextd5_rain;
    
    $('.icon_tem img').attr('src', changeWeatherIcon(rainPercent));
    $('#three_am_icon').attr('src', changeWeatherIcon(rainPercent3Am));
    $('#six_am_icon').attr('src', changeWeatherIcon(rainPercent6Am));
    $('#nine_am_icon').attr('src', changeWeatherIcon(rainPercent9Am));
    $('#twelve_pm_icon').attr('src', changeWeatherIcon(rainPercent12Pm));
    $('#three_pm_icon').attr('src', changeWeatherIcon(rainPercent3Pm));
    $('#six_pm_icon').attr('src', changeWeatherIcon(rainPercent6Pm));

    $('#weather_icon_mn1').attr('src', changeWeatherIcon(rainPercentn1));
    $('#weather_icon_mn2').attr('src', changeWeatherIcon(rainPercentn2));
    $('#weather_icon_mn3').attr('src', changeWeatherIcon(rainPercentn3));
    $('#weather_icon_mn4').attr('src', changeWeatherIcon(rainPercentn4));
    $('#weather_icon_mn5').attr('src', changeWeatherIcon(rainPercentn5));

    $('#weather_icon_dn1').attr('src', changeWeatherIcon(rainPercentn1));
    $('#weather_icon_dn2').attr('src', changeWeatherIcon(rainPercentn2));
    $('#weather_icon_dn3').attr('src', changeWeatherIcon(rainPercentn3));
    $('#weather_icon_dn4').attr('src', changeWeatherIcon(rainPercentn4));
    $('#weather_icon_dn5').attr('src', changeWeatherIcon(rainPercentn5));
}

function changeWeatherIcon(rainPercent) {
  let imgSrc = '';
    if(rainPercent > 79){
      imgSrc ='./icomoon/svg/rain.svg';
    }
    else if (rainPercent > 39){
      imgSrc = './icomoon/svg/cloudy.svg';
    }
    else{
      imgSrc = './icomoon/svg/sun.svg'
    }

    return imgSrc;
    //因為是給定規則，而不是每個都相同，因此傳入一項回傳值，將需求傳回去
    //callback function
}


$('.landmark_all .north').click(function(){
  // console.log('hi',$(this).text().trim());

  const searchmountain = $(this).text().trim();

$.get('/nomad/weather_api.php', 
  
  {searchmountain},function (data) {

    console.log('data',data)
 
    changeWeatherView(data)
 
  
  }, 'json');
  $('#mountain_name').text(searchmountain);
  
;
  
  //先給一個function
  //再去抓一個參數
  
});

// function  startSerach(searchmountain) { 
//   //先定義一個function並塞入一個參數，讓function中的動作知道要抓取哪裏的資料，再傳回呼叫這函示的地方
//   $.get('/nomad_emily/weather_api.php', 
//   //先確定路徑資料夾有沒有錯誤，也記得console.log找錯誤
//   {searchmountain},function (data) {
//     //這屬於jquery中去抓取data的方式，funtion中還有function。
//     //{searchmountain}裡面放值才可以回傳值回去，所以先設定變數
//     console.log('data',data)
//     //不知道哪邊錯的時候就console.log data
//     changeWeatherView(data)
//     //上面有一個定義這個的function
  
//   }, 'json');
//   $('#mountain_name').text(searchmountain);
//   //mountain_nmae為你所點到的名字
  
//   //data.rows.high_tem
// }

// const rain = document.querySelector('#three_am_icon');


   
  
//   }, 'json');


// if($_GET['rain'] >'40' or $_GET['3am_icon']>'40'){
//     $city=$_POST['city'];
//     $sex=$_POST['sex'];
//     $data=mysql_query("select * from member where memCity like '%$city%' and memSex like '$sex'"); 
//    }else{
//     $data=mysql_query("select * from member");

















// $('.area-list li').click(function(){
//   console.log(this);
//   const area_id = $(this).attr('data-sid');

//   $('.mountain-list li').each(function(){
//     if($(this).attr('data-a')!=area_id){
//       $(this).addClass('closed');
//     } else {
//       $(this).removeClass('closed');
//     }
//   })
// });




        $('path').click(function () {
            $('.weather_box').css('display', 'block')
        })
        

        // 宜蘭區域 mouseenter
        $('.yilan_country').mouseenter(function () {
          $('.yilan_country').css('fill','#B99362');
            $('.yilan_country_location').addClass('show')
        })
        $('.yilan_country').mouseleave(function () {
          $('.yilan_country').css('fill','white');
            $('.yilan_country_location').removeClass('show')
        })

        // 宜蘭區域景點 mouseenter
        $('.yilan_country_location').mouseenter(function () {
            $('.yilan_country').css('fill','#B99362').css('transform','translate(-5px, -5px)');
            $('.yilan_country_location').addClass('show');
        })
        $('.yilan_country_location').mouseleave(function () {
            $('.yilan_country').css('fill','white').css('transform','translate(0px, 0px)');
            $('.yilan_country_location').removeClass('show');
           
        })
        // 新竹區域 mouseenter
        $('.hsinchu_country').mouseenter(function () {
          $('.hsinchu_country').css('fill','#B99362').css('transform','translate(-5px, -5px)');
            $('.hsinchu_country_location').addClass('show')
        })
        $('.hsinchu_country').mouseleave(function () {
          $('.hsinchu_country').css('fill','white').css('transform','translate(0px, 0px)');
            $('.hsinchu_country_location').removeClass('show')
        })

        // 新竹區域景點 mouseenter
        $('.hsinchu_country_location').mouseenter(function () {
            $('.hsinchu_country_location').addClass('show');
            $('.hsinchu_country').css('fill','#B99362').css('transform','translate(-5px, -5px)');
            
        })

        $('.hsinchu_country_location').mouseleave(function () {
            $('.hsinchu_country_location').removeClass('show');
            $('.hsinchu_country').css('fill','white').css('transform','translate(0px, 0px)');
        })

        // 苗栗區域 mouseenter
        $('.miaoli_country').mouseenter(function () {
            $('.miaoli_country_location').addClass('show');
            $('.miaoli_country').css('fill','#B99362').css('transform','translate(-5px, -5px)');
        })
        $('.miaoli_country').mouseleave(function () {
            $('.miaoli_country_location').removeClass('show');
            $('.miaoli_country').css('fill','white').css('transform','translate(0px, 0px)');
        })

        // 苗栗區域景點 mouseenter
        $('.miaoli_country_location').mouseenter(function () {
          $('.miaoli_country').css('fill','#B99362').css('transform','translate(-5px, -5px)');
            $('.miaoli_country_location').addClass('show')
            
        })

        $('.miaoli_country_location').mouseleave(function () {
          $('.miaoli_country').css('fill','white').css('transform','translate(0px, 0px)');
            $('.miaoli_country_location').removeClass('show');
            
        })

        // 花蓮區域 mouseenter
        $('.hualien_country').mouseenter(function () {
          $('.hualien_country').css('fill','#B99362').css('transform','translate(-5px, -5px)');
            $('.hualien_country_location').addClass('show')
        })
        $('.hualien_country').mouseleave(function () {
          $('.hualien_country').css('fill','white').css('transform','translate(0px, 0px)');
            $('.hualien_country_location').removeClass('show')
        })

        // 花蓮區域景點 mouseenter
        $('.hualien_country_location').mouseenter(function () {
          $('.hualien_country').css('fill','#B99362').css('transform','translate(-5px, -5px)');
            $('.hualien_country_location').addClass('show')
        })

        $('.hualien_country_location').mouseleave(function () {
          $('.hualien_country').css('fill','white').css('transform','translate(0px, 0px)');
            $('.hualien_country_location').removeClass('show')
        })

        // 台東區域 mouseenter
        $('.taitung_country').mouseenter(function () {
          $('.taitung_country').css('fill','#B99362').css('transform','translate(-5px, -5px)');
            $('.taitung_country_location').addClass('show')
        })
        $('.taitung_country').mouseleave(function () {
          $('.taitung_country').css('fill','white').css('transform','translate(0px, 0px)');
            $('.taitung_country_location').removeClass('show')
        })
        // 台東區域景點 mouseenter
        $('.taitung_country_location').mouseenter(function () {
          $('.taitung_country').css('fill','#B99362').css('transform','translate(-5px, -5px)');
            $('.taitung_country_location').addClass('show')
        })
        $('.taitung_country_location').mouseleave(function () {
          $('.taitung_country').css('fill','white').css('transform','translate(0px, 0px)');
            $('.taitung_country_location').removeClass('show')
        })

        // 南投區域 mouseenter
        $('.nantou_country').mouseenter(function () {
            $('.nantou_country_location').addClass('show')
            $('.nantou_country').css('fill','#B99362').css('transform','translate(-5px, -5px)');
        })
        $('.nantou_country').mouseleave(function () {
            $('.nantou_country_location').removeClass('show')
            $('.nantou_country').css('fill','white').css('transform','translate(0px, 0px)');
        })
        // 南投區域景點 mouseenter
        $('.nantou_country_location').mouseenter(function () {
          $('.nantou_country').css('fill','#B99362').css('transform','translate(-5px, -5px)');
            $('.nantou_country_location').addClass('show')
        })
        $('.nantou_country_location').mouseleave(function () {
          $('.nantou_country').css('fill','white').css('transform','translate(0px, 0px)');
            $('.nantou_country_location').removeClass('show')
        })

        //  台中區域 mouseenter
        $('.taichung_city').mouseenter(function () {
            $('.taichung_city_location').addClass('show')
            $('.taichung_city').css('fill','#B99362').css('transform','translate(-5px, -5px)');
        })
        $('.taichung_city').mouseleave(function () {
          $('.taichung_city').css('fill','white').css('transform','translate(0px, 0px)');
            $('.taichung_city_location').removeClass('show')
        })

        //台中區域景點mouseenter
        $('.taichung_city_location').mouseenter(function () {
          $('.taichung_city').css('fill','#B99362').css('transform','translate(-5px, -5px)');
            $('.taichung_city_location').addClass('show')
        })
        $('.taichung_city_location').mouseleave(function () {
          $('.taichung_city').css('fill','white').css('transform','translate(0px, 0px)');
            $('.taichung_city_location').removeClass('show')
        })
        //  嘉義區域 mouseenter
        $('.chiayi_country').mouseenter(function () {
            $('.chiayi_country_location').addClass('show')
            $('.chiayi_country').css('fill','#B99362').css('transform','translate(-5px, -5px)');
        })
        $('.chiayi_country').mouseleave(function () {
          $('.chiayi_country').css('fill','white').css('transform','translate(0px, 0px)');
            $('.chiayi_country_location').removeClass('show')
        })

        //嘉義區域景點mouseenter
        $('.chiayi_country_location').mouseenter(function () {
          $('.chiayi_country').css('fill','#B99362').css('transform','translate(-5px, -5px)');
            $('.chiayi_country_location').addClass('show')
        })
        $('.chiayi_country_location').mouseleave(function () {
          $('.chiayi_countryy').css('fill','white').css('transform','translate(0px, 0px)');
            $('.chiayi_country_location').removeClass('show')
        })
        //  屏東區域 mouseenter
        $('.pingtung_country').mouseenter(function () {
            $('.pingtung_country_location').addClass('show')
            $('.pingtung_country').css('fill','#B99362').css('transform','translate(-5px, -5px)');
        })
        $('.pingtung_country').mouseleave(function () {
          $('.pingtung_country').css('fill','white').css('transform','translate(0px, 0px)');
            $('.pingtung_country_location').removeClass('show')
        })

        //屏東區域景點mouseenter
        $('.pingtung_country_location').mouseenter(function () {
          $('.pingtung_country').css('fill','#B99362').css('transform','translate(-5px, -5px)');
            $('.pingtung_country_location').addClass('show')
        })
        $('.pingtung_country_location').mouseleave(function () {
          $('.pingtung_country').css('fill','white').css('transform','translate(0px, 0px)');
            $('.pingtung_country_location').removeClass('show')
        })


        $('.close_info').click(function() {
          $('.weather_box').css('display', 'none')
  })




  
  
</script>

