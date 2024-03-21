<footer class="footer">
  <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
      <div class="col-12 col-sm-auto text-center">
          <p class="mb-0 text-600">Thank you for creating<span class="d-none d-sm-inline-block">| 
            </span>
            <br class="d-sm-none"> 2022 © <a href="https://aashatech.com">AashaTech</a></p>
      </div>
  </div>
</footer>

{{-- <script src="{{ asset('summernote/summernote-lite.min.js') }}"></script>
<script>
  $(document).ready(function() {
      $('#summernote').summernote({height:400});
  });
</script> --}}

<script>
  tinymce.init({
    selector: '#summernote',
    // plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ]
  });
</script>
