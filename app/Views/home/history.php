<?php include(APPPATH . 'Views/templates/home/header.php'); ?>
<?php include(APPPATH . 'Views/inc/functions.php'); ?>
<?php helper('date'); ?>
<?php 
  use App\Models\ViewModel;
  $viewModel = new ViewModel();
?>

  <div id="home" class="my-5 py-4">
    <div class="container" id="homeContainer">
      <div class="row" id="homeRow">
        <div class="col-lg-12 col-md-12" id="homeRowFirst">
          <div class="d-flex flex-wrap justify-content-start align-items-center homeRowItem">
            <?php if(!empty($videos)): ?>
            <?php foreach($videos as $video): ?>
              <div class="card m-2 cardWidth w-md-100">

              <a href="<?= base_url("view/{$video['video_slug']}"); ?>" class="videoLink">
                <div id="video_cont" class="embed-responsive embed-responsive-16by9 video_cont">
                  <video id="video" class="embed-responsive-item" poster="<?= (!empty($video['thumbnail'])) ? base_url('assets/thumbnails/thumbs/'.$video['thumbnail']) : ''; ?>">
                    <source src="<?= base_url('assets/uploads/'.$video['video_name']); ?>"></source>
                  </video>
                </div>
              </a>


                <div class="card-body p-2">
                  <h6 class="card-title m-0 color-black">
                    <?php $str = $video['title']; 
                      $str = str_replace('.', ' ', $str);
                      $str = str_replace('-', ' ', $str);
                      $str = str_replace('_', ' ', $str);
                      $str = str_replace('@', ' ', $str);
                      $str = str_replace('&', ' ', $str);
                    ?>
                    <?= word_limiter($str, 3); ?>
                  </h6>
                  <a href="<?= base_url("/subscribe/{$video['channel']}") ?>" class="text-muted card-text m-0">
                    <?= $video['name']; ?>
                  </a>
                  
                  <p class="text-muted card-text m-0">
                    <?php $viewes = $viewModel->where('video_id', $video['id'])->countAllResults('video_id'); ?>
                    <?= ($viewes == 1) ? $viewes." View" : $viewes." Viewes"; ?> • <?= timeago($video['created_at']); ?>
                  </p>
                </div>
              </div>
            <?php endforeach; ?>
            <?php else: ?>
              <p class="lead">You Have To Watch Some Videos First Son, This is a History Page!</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include(APPPATH . 'Views/templates/home/footer.php'); ?>