<!-- SweetAlert2 -->
<script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Toastr -->
<script src="assets/plugins/toastr/toastr.min.js"></script>

<!-- Select2 -->
<script src="assets/plugins/select2/js/select2.full.min.js"></script>

<!-- Summernote -->
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>

<!-- dropzonejs -->
<script src="assets/plugins/dropzone/min/dropzone.min.js"></script>
<script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
  $(document).ready(function () {
    // Inisialisasi Select2
    $('.select2').select2({
      placeholder: "Please select here",
      width: "100%"
    });

    window.start_load = function () {
      // Menambahkan preloader ke body
      $('body').prepend('<div id="preloader2"></div>')
    }

    window.end_load = function () {
      // Menghilangkan preloader
      $('#preloader2').fadeOut('fast', function () {
        $(this).remove();
      })
    }

    window.viewer_modal = function ($src = '') {
      start_load()
      var t = $src.split('.')
      t = t[1]
      var view = (t == 'mp4') ?
        $("<video src='" + $src + "' controls autoplay></video>") :
        $("<img src='" + $src + "' />")

      // Mengganti konten modal dengan gambar atau video
      $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
      $('#viewer_modal .modal-content').append(view)
      $('#viewer_modal').modal({
        show: true,
        backdrop: 'static',
        keyboard: false,
        focus: true
      })
      end_load()
    }

    window.uni_modal = function ($title = '', $url = '', $size = "") {
      start_load()
      $.ajax({
        url: $url,
        error: err => {
          console.log()
          alert("An error occured")
        },
        success: function (resp) {
          if (resp) {
            $('#uni_modal .modal-title').html($title)
            $('#uni_modal .modal-body').html(resp)
            if ($size != '') {
              $('#uni_modal .modal-dialog').addClass($size)
            } else {
              $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
            }
            $('#uni_modal').modal({
              show: true,
              backdrop: 'static',
              keyboard: false,
              focus: true
            })
            end_load()
          }
        }
      })
    }

    window._conf = function ($msg = '', $func = '', $params = []) {
      // Menampilkan modal konfirmasi
      $('#confirm_modal #confirm').attr('onclick', $func + "(" + $params.join(',') + ")")
      $('#confirm_modal .modal-body').html($msg)
      $('#confirm_modal').modal('show')
    }

    window.alert_toast = function ($msg = 'TEST', $bg = 'success', $pos = '') {
      // Menampilkan pesan toast
      var Toast = Swal.mixin({
        toast: true,
        position: $pos || 'top-end',
        showConfirmButton: false,
        timer: 5000
      });

      Toast.fire({
        icon: $bg,
        title: $msg
      })
    }

    $(function () {
      // Inisialisasi bsCustomFileInput
      bsCustomFileInput.init();

      // Inisialisasi Summernote
      $('.summernote').summernote({
        height: 300,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
          ['fontname', ['fontname']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ol', 'ul', 'paragraph', 'height']],
          ['table', ['table']],
          ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
        ]
      })
    })
  });
</script>

<!-- Bootstrap -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
