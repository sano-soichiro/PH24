$('#file').on('change', function (e) {
    fileset = $(this).val();
    if (fileset === '') {
      $("#display_img").attr('src', "");
    } 
    else {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#display_img").attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files[0]);
    }
  });