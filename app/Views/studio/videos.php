<?php include(APPPATH . 'Views/templates/studio/header.php'); ?>

  <div class="col-lg-9 col-md-12 mb-5" id="studioFlex">
    <main class="pl-3 py-3 mx-md-3">
    <div class="container">
      <h3 class="display-4 mb-3">Videos</h3>
      <a href="<?= base_url('studio/create/create') ?>" class="btn btn-success btn-lg mb-4">Create Video</a>

      <div class="table-responsive">
        <table class="table table-stripped table-bordered">
        <!-- Thead -->
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Status</th>
              <!-- <th scope="col">Created At</th> -->
              <th scope="col">Updated At</th>
              <th></th>
            </tr>
          </thead>

          <!-- Tbody -->
          <tbody>
          <?php $count = 1; ?>
          <?php foreach($videos as $video): ?>
            <tr>
              <th scope="row"><?= $count++; ?></th>
              <td style="min-width: 23rem">

                <div class="media">
                <a href="<?= base_url('view/'.$video['video_slug']); ?>">
                  <img src="<?= (empty($video['thumbnail'])) ? base_url('assets/img/noimage.png') : base_url('assets/thumbnails/thumbs/'.$video['thumbnail']); ?>" class="img-responsive img-thumbnail align-self-center mr-3" alt="...">
                </a> 

                  <div class="media-body align-self-center ml-2">
                    <p class="mt-0 mb-2 color-black" style="font-size: 16px">
                      <?php $str = $video['title']; 
                        $str = str_replace('.', ' ', $str);
                        $str = str_replace('-', ' ', $str);
                        $str = str_replace('_', ' ', $str);
                        $str = str_replace('@', ' ', $str);
                        $str = str_replace('&', ' ', $str);
                      ?>
                      <?= word_limiter($str, 3); ?>
                    </p>
                    <p class="mb-0 color-light-black" style="font-size: 13px">
                      <?= (empty($video['description'])) ? 'No Desc...' : word_limiter($video['description'], 5); ?>
                    </p>
                  </div>
                </div>

              </td>

              <td>
                <?php echo ($video['is_published'] == 1) ? 'Published' : 'Unlisted'; ?>
              </td>
              <!-- <td>
                <?php //date("d/m/Y, g:i a", strtotime($video['created_at'])); ?>
              </td> -->
              <td>
                <?= date("d/m/Y, g:i a", strtotime($video['updated_at'])); ?>
              </td>

              <td>
                <div class="d-flex">
                  <a href="<?= base_url('studio/update/update/'.$video['video_slug']) ?>" class="color-black mr-3"><i class="fas fa-edit editVideo"></i></a>

                  <a href="<?= base_url('studio/delete/delete/'.$video['video_slug']) ?>" class="color-red"><i class="fas fa-trash deleteVideo"></i></a>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>  
    </main>
  </div>



<?php include(APPPATH . 'Views/templates/studio/footer.php'); ?>