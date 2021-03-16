console.log('Работает !');

(function ($) {
   var defaultImg = $('#profile-user-img').attr('data-src');
   //обрабатываем клик по кнопке Select Image
   $('.user_image_button').on('click', function (event) {

      var image = wp.media({
            title: 'Upload Image',
            // Параметр mutiple: true необходим, если нужно загрузить несколько файлов за раз
            // в нашем случае нужно единственное изображение, поэтому: 
            multiple: false
         }).open()
         .on('select', function (e) {
            // Возвращаем выбранное в медиа-загрузчике изображение как объект
            var uploaded_image = image.state().get('selection').first();
            // Конвертируем загруженное изображение в объект JSON для более простого доступа к нему
            // Проверяем в консоли наличие загруженного изображения
            console.log(uploaded_image);
            // получаем url загруженного изображения
            var image_url = uploaded_image.toJSON().url;
            // Выводим url изображения в текстовом поле, а саму картинку вместо дефолтного изображения
            $('#userimg').val(image_url);
            $('#profile-user-img').attr('src', image_url);
         });
      return false;

   });
   //удаляем данные после клика на кнопке "x"
   $('.remove-user-image').on('click', function (event) {
      $('#userimg').val('');
      $('#profile-user-img').attr('src', defaultImg);
   });

})(jQuery);