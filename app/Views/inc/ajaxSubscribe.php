<script>
  
  $('#subscribeForm').submit(function(e) {

    e.preventDefault();
    
    const subscribeValue = $('#subscribeButton').val();
    const channelId = $('#channelId').val();
    const userId = $('#userId').val();

    <?php 
      if(isset($_POST['subscribeButton'])) {
        $session->setFlashdata('auth', 'You need to be logged in to visit this page.');
      }
    ?>

    if(userId == 'undefined') {
      window.location.replace(`<?= base_url(); ?>/users/users/login`);
    }



    $.ajax({

      type: 'post',
      data: {
        subscribe_value: subscribeValue,
        channel_id: channelId
      },
      dataType: 'json',
      url: `<?= base_url(); ?>/subscribeaction/${channelId}`,

      success: function(data) {
        console.log(data);

        if(data.subscribed == 1 && data.not_subscribed == 0) {

          if($('#subscribeButton').hasClass('btn-danger')) {
            $('#subscribeButton').removeClass('btn-danger');
          }
          $('#subscribeButton').addClass('btn-secondary');
          $('#subscribeButton').text('Unsubscribe');

        } else if(data.subscribed == 0 && data.not_subscribed == 0) {

          if($('#subscribeButton').hasClass('btn-secondary')) {
            $('#subscribeButton').removeClass('btn-secondary');
          }
          $('#subscribeButton').addClass('btn-danger');
          $('#subscribeButton').text('Subscribe');

        }

        $('#subscribers').text(data.subscribers);

      }

    });

  });






</script>