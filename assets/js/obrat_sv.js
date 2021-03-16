$(document).ready(function () {

   // обработка вида связи в обратной форме 
   var vid_svyaz = $('#vid_svyaz');
   console.log('vid_svyaя = ' + vid_svyaz); // 


   var vid_sv = document.querySelector('[name=vid_sv]');


   vid_sv.onchange = function () {
      // console.log(this.value);
      // Получить текст option можно так
      // console.log(this.options[this.selectedIndex].text);

      // this.options[this.selectedIndex].foo();
      if (this.value == 'Электронная почта') {
         $('.form_tel').removeClass('form_req');
         $('.form_mail').addClass('form_req');

         $("[name='tel_kl']").each(function (index, element) {
            element.removeAttribute("aria-required");
         });
         $("[name='your-email']").attr('aria-required', 'true');
         //  $('.form_mail').classList.add("form_req");
         //  console.log(this.value, this.text);
      } else {
         $('.form_tel').addClass('form_req');
         $('.form_tel').addClass('wpcf7-validates-as-required');
         $('.form_mail').removeClass('form_req')
         //     $.getAttribute('tel_kl').attr('aria-required', 'true');
         $("[name='your-email']").each(function (index, element) {
            element.removeAttribute("aria-required");
         });
         $("[name='tel_kl']").attr('aria-required', 'true');
         $("[name='tel_kl']").attr('aria-required', 'true');

      }
   };

   // end обработка вида связи в обратной форме 

})