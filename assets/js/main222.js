/***собираем в один ***/

//@prepros-append header.js


/**** ф-я скрыть / открыть *****/
function div_hide(id) {
   x = document.getElementById(id);
   if (x.style.display == 'block') {

      //   document.getElementById(id).innerHTML = 'function div_hide!'; //document.getElementById('xx').style.display = 'none'; 
      x.style.display = 'none';
   } else {
      x.style.display = 'block';
   }
}
// выбор города
$(function () {

   if (localStorage.getItem("myKey")) {
      var stored_select = localStorage.getItem("myKey");
      $('#' + stored_select).prop("selected", true);
      $('.' + stored_select).show();
   } else {
      $('.pusto').show();
   }
});

$(document).ready(function () {


   // end выбор города

   function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      var expires = "expires=" + d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
      console.log(document.cookie); // 
      location.reload();
   }


   $("#selectItem").change(function () {
      //    $('.containerss').find('div').hide();
      var selected = $('#selectItem option:selected').attr('id');
      var name = $('#selectItem option:selected').attr('name');
      console.log('selected ' + selected); //
      localStorage.setItem("myKey", selected);
      $('.' + selected).show();
      setCookie('city', name);
   });

   //




   /****** кнопка вверх ********/
   $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
         $('.but__backToTop').fadeIn();
      } else {
         $('.but__backToTop').fadeOut();
      }
   });

   $('.but__backToTop').click(function () {
      $("html, body").animate({
         scrollTop: 0
      }, 600);
      return false;
   });
   /****** end кнопка вверх ********/

   /******** передача данных ссылку в форму********/
   /*
       $("a.zakaz").click(function() {
           $('#zvonok input[name="zakaz"]').val($(this).attr("data-zakaz"));
           $(".d_zakaz").show();
           div_hide('openModal');
       })

       $("a.tools_button").click(function() {
           $('#zvonok input[name="zakaz"]').val($(this).attr("data-zakaz"));
           $(".d_zakaz").hide();
           div_hide('openModal');
       })

       /******** спойлер ***********/
   /*   $(".spolireHead").on("click", function() {
          if ($(this).hasClass('openSpoler')) {
              $(this).removeClass('openSpoler').children().html('Свернуть')
          } else {
              $(this).addClass('openSpoler').children().html('Раскрыть весь список')
          }


          $(this).prev().slideToggle();

          // roditel = $(this).parent();
          // $(roditel).find($(".NoneNovMob")).toggleClass("NoneFix");


      });
      /******** end спойлер ***********/

   /********  reviews ***********/
   /*    $(function() {

           $('.user-slides').slick({
               prevArrow: $('.user-left'),
               nextArrow: $('.user-right'),
               slidesToShow: 3,
               cssEase: 'linear',
               autoplay: true,
               autoplaySpeed: 3000,
               responsive: [{
                   breakpoint: 767, //breakpoint — это ширина при которой следует включать настройки.
                   settings: {
                       slidesToShow: 1, //сколько слайдов показывать в карусели
                       //    slidesToScroll: 3 // сколько слайдов прокручивать за раз
                   }
               }]
           });
           /******** end reviews ***********/
   /*        $('.like-post').one('click', function() { // при клике на любой элемент с классом like-post
               // one('click' -  единоразово срабатывающий обработчик события 
               var $span = $(this); //

               var data = { // отпраляем данные на сервер
                   action: 'likepost', // экшен до кот можно достучаться до зарегистрированного  прописан в function.php
                   id: $span.data('id') // id поста
               };

               $.post(_PHP.ajaxUrl, data, function(res) { // $.post - функция будет обращатся на адресс _PHP.ajaxUrl
                   // data - второй параметр,
                   //function(res) - ф-я обработчик ответа кот принимает результат
                   $span.fadeOut(200).prev().html(res);
                   // вернулся результат с сервера $span.fadeOut(200) - span который позволяет лайнуть скроем
                   // .prev() - перейдем к предыдущему span и зададим 
               });
           });

       });

   */
})

var header = $('#header');
var heightHeader = header.height;
/*
if (window.matchMedia('(max-width: 768px)').matches) {
   $('.site-header').css({
      top: '0px',
   })
}
*/
window.onscroll = function () {

   /*
      if (window.matchMedia('(min-width: 940px)').matches) {
         */
   if (window.pageYOffset == 0) {
      $('.site-header').css({
         //   top: '55px',
         position: 'absolute',
      });

   } else {
      $('.site-header').css({
         top: '0px',
         position: 'fixed',
      });
   }
   /*
} else {
   $('.site-header').css({
      top: '0px',
   });

}
*/
};