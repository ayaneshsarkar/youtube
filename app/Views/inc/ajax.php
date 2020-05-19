<script>
  $('#ajaxForm').submit(function(e) {

    e.preventDefault();

    const videoId = $('#videoId').val();
    const like = $('#like').val();
    const dislike = $('#dislike').val();
    const videoSlug = $('#videoSlug').val();
    const userId = $('#userId').val();

    <?php 
      if(isset($_POST['like']) || isset($_POST['dislike'])) {
        $session->setFlashdata('auth', 'You need to be logged in to visit this page.');
      }
    ?>
    
    if(userId == 'undefined') {
      window.location.replace(`<?= base_url(); ?>/users/users/login`);
    }

    $.ajax({

      type: 'post',
      data: {
        video_id: videoId,
        like: like,
        dislike: dislike
      },
      dataType: 'json',
      url: `<?= base_url(); ?>/likes/${videoSlug}`,

      success: function(data) {
        console.log(data);
        if(data.is_liked == 1 && data.is_disliked == 0) {

          if($('#like').hasClass('btn-outline-secondary')) {
            $('#like').removeClass('btn-outline-secondary');
          } 
          $('#like').addClass('btn-primary');

          if($('#dislike').hasClass('btn-primary')) {
            $('#dislike').removeClass('btn-primary');
          }
          $('#dislike').addClass('btn-outline-secondary');


        } else if(data.is_disliked == 1 && data.is_liked == 0) {

          if($('#dislike').hasClass('btn-outline-secondary')) {
            $('#dislike').removeClass('btn-outline-secondary');
          }
          $('#dislike').addClass('btn-primary');

          if($('#like').hasClass('btn-primary')) {
            $('#like').removeClass('btn-primary');
          } 
          $('#like').addClass('btn-outline-secondary');

        } else if(data.is_liked == 0 && data.is_disliked == 0) {

          if($('#like').hasClass('btn-primary')) {
            $('#like').removeClass('btn-primary');
          }
          $('#like').addClass('btn-outline-secondary');

          if($('#dislike').hasClass('btn-primary')) {
            $('#dislike').removeClass('btn-primary');
          }
          $('#dislike').addClass('btn-outline-secondary');

        }

        $('#likeCount').text(`LIKES ${data.likeCount}`);
        $('#dislikeCount').text(`DISLIKES ${data.dislikeCount}`);

      }
      
    });

  });
</script>