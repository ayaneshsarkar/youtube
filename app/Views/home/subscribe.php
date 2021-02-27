<?php include(APPPATH . 'Views/templates/subscribers/header.php'); ?>
<?php include(APPPATH . 'Views/inc/functions.php'); ?>
<?php 
  $session = \Config\Services::session();
  
  use App\Models\ViewModel;
  use App\Models\SubscribeModel;
  use App\Models\User\UserModel;

  $viewModel = new ViewModel();
  $subscribeModel = new SubscribeModel();
  $userModel = new UserModel();

  $userId = $session->get('user_id');
  $thisChannel_id = $userModel->where('channel_id', $channelId)->first()['id'];

  $subscribed = $subscribeModel->where('user_id', $userId)->where('channel_id', $thisChannel_id)->first()['subscribed'] ?? 0;
?>

<div class="jumbotron w-100">
  <h1 class="display-4 color-black"><?= $username; ?></h1>
  <hr class="my-4">
  <p class="lead mt-3">
    <form action="" id="subscribeForm" method="post">
      <input type="hidden" value="<?= $channelId; ?>" id="channelId">
      <input type="hidden" value="<?= (!empty($userId)) ? $userId : 'undefined'; ?>" id="userId">
      <?php if($subscribed == 0): ?>

        <button name="subscribeButton" type="submit" class="btn btn-danger btn-lg mr-2" value="1" id="subscribeButton">Subscribe</button>

      <?php elseif($subscribed == 1): ?>

        <button name="subscribeButton" type="submit" class="btn btn-secondary btn-lg mr-2" value="1" id="subscribeButton">Unsubscribe</button>
        
      <?php endif; ?>
        <span id="subscribers" style='line-height: 2rem; font-size: 1.3rem'><?= $subscribers; ?></span>
    </form>
  </p>
</div>

<div class="col-12">
  <div class="d-flex flex-wrap justify-content-start align-items-center mb-5 pb-5">
    <?php foreach($videos as $video): ?>
      <div class="card m-2 cardWidth w-md-100">

      <a href="<?= base_url("view/{$video['video_slug']}"); ?>">
      <div id="video_cont" class="embed-responsive embed-responsive-16by9">
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
          <a href="#" class="text-muted card-text m-0"><?= $video['name']; ?></a>
          
          <p class="text-muted card-text m-0">
            <?php $viewes = $viewModel->where('video_id', $video['id'])->countAllResults('video_id'); ?>
            <?= ($viewes == 1) ? $viewes." View" : $viewes." Viewes"; ?> • <?= timeago($video['created_at']); ?>
          </p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>



<?php include(APPPATH . 'Views/templates/subscribers/footer.php'); ?>