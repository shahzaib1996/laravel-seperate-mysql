<!DOCTYPE html>
<html>
<head>
  <title>test</title>
</head>
<body>

  @if (count($table_data) > 0)
  <section class="articles">
    @include('ajax.show')
  </section>
  @endif

  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <script type="text/javascript">

    $(function() {
      $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        $('#load a').css('color', '#dfecf6');
        $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

        var url = $(this).attr('href');
        getArticles(url);
        window.history.pushState("", "", url);
      });

      function getArticles(url) {
        $.ajax({
          url : url
        }).done(function (data) {
          $('.articles').html(data);
        }).fail(function () {
          alert('Data could not be loaded.');
        });
      }
    });
  </script>

</body>
</html>