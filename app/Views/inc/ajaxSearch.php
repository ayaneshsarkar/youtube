<script>
  // $('#search').keyup(function(e) {

  //   e.preventDefault();

  //   const search = $('#search').val();

  //   $.ajax({

  //     type: 'post',
  //     data: {
  //       search: search
  //     },
  //     dataType: 'json',
  //     url: `<?php// base_url(); ?>/searchajax`,

  //     success: function(data) {

  //       function truncate(str, no_words) {
  //         return str.split(" ").splice(0,no_words).join(" ")+'...';
  //       }

  //       const loopOverItems = (item, index) => {
          
          
  //         console.log(item);

  //         const title = item.title.replace(/[^\w\s]/gi, '');

  //         $('#videoLink').attr('href', `<?php// base_url(); ?>/view/${item.video_slug}`);
  //         $('.videoPoster').attr('poster', `<?= base_url() ?>/assets/thumbnails/thumbs/${item.thumbnail}`);
  //         $('#source').attr('src', `<?php// base_url(); ?>/assets/uploads/${item.video_name}`);
  //         $('#cardTitle').text(truncate(title, 3));
  //         $('#userName').text(item.name);
  //         $('#videoTime').text('dxhBSHxc');


  //       }

  //       data.videos.forEach(loopOverItems);
  //     }

  //   });
    

  // });
</script>