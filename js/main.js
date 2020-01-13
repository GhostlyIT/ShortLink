$(document).ready(function() {
    $('#submit').click(function(){
      if($('#input').val() != '') {  
        $.ajax({
            url: '../ShortLink.php',
            type: "POST",
            data: {
                'link': $('#input').val()
            },
            cache: false,
            success: function(result) {  
                var host = document.domain; 
                $('#result-form').html('<div class="mt-3">Your short URL: <a href="/?url=' + result + '">' + host + '/?url=' + result + '</a></div>');
            }
        })
      } else {
          alert('You did not enter the link');
      }
    })

    $('.delete').click(function(){
        var parent = $(this).parent().parent();
        $.ajax({
            url: '../delete.php',
            type: 'POST',
            data: {
                'id': $('.delete').val()
            },
            cache: false,
            success: function() {
                parent.remove();
            }
        })
    })
})