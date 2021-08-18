<?php include(APPPATH . 'Views/templates/view/header.php'); ?>
<?php include(APPPATH . 'Views/inc/functions.php'); ?>
<?php 
$session = \Config\Services::session();
  use App\Models\ViewModel;
  use App\Models\LikeModel;
  $viewModel = new ViewModel();
  $likeModel = new LikeModel();

  $isLiked = $likeModel->where('user_id', $session->get('user_id'))->where('video_id', $video['id'])->first()['is_liked'] ?? '';

  $isDisliked = $likeModel->where('user_id', $session->get('user_id'))->where('video_id', $video['id'])->first()['is_disliked'] ?? '';

  $videoId = $likeModel->where('user_id', $session->get('user_id'))->where('video_id', $video['id'])->first()['video_id'] ?? '';
?>

    <div class="row px-4 mb-5 mt-4 pb-5">
      <div class="col-lg-8 col-md-12 align-items-center mb-5">
        <div class="embed-responsive embed-responsive-16by9 mb-3">
          <video id="video" class="embed-responsive-item videoWidth" poster="<?= (!empty($video['thumbnail'])) ? base_url('assets/thumbnails/thumbs/'.$video['thumbnail']) : ''; ?>" controls="controls">
            <source src="<?= base_url('assets/uploads/'.$video['video_name']); ?>"></source>
          </video>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-2 likeContainer">
          <div class="mt-1">
            <h1 class="color-black video_text mt-1" style="font-size: 1.8rem"><?= $video['title']; ?></h1>
            <p class="text-muted mb-1" style="font-zixe: 13px">
            <?= ($viewes == 1) ? $viewes." View" : $viewes." Viewes"; ?> • <?= date('F j, Y', strtotime($video['created_at'])); ?>
            </p>
            <a href="<?= base_url("subscribe/{$video['channel']}"); ?>" class="text-muted">
              <p class="channel_text lead"><?= $video['name']; ?></p>
            </a>

            <p class="text-muted align-self-end mb-0" style="font-size: 13px">
              <span class="mr-2" id="likeCount">LIKES <?= $likes; ?></span>
              <span id="dislikeCount">DISLIKES <?= $dislikes; ?></span>
            </p>
          </div>

          <div class="likes d-flex jusify-content-center align-items-center">
            <form action="" method="post" id="ajaxForm">
              <input type="hidden" name="video_id" id="videoId" value="<?= $video['id']; ?>">
              <input type="hidden" name="video_slug" id="videoSlug" value="<?= $video['video_slug']; ?>">

              <input type="hidden" name="user_id" id="userId" value="<?= ($session->get('user_id')) ? $session->get('user_id') : 'undefined'; ?>">

              <button name="like" type="submit" value="1" 
              class="likeaction btn <?= ($isLiked == 1 && $isDisliked == 0 && $videoId == $video['id']) ? 'btn-primary' : 'btn-outline-secondary'; ?>" 
              id="like">
                <i class="fas fa-thumbs-up" id="likeId"></i>
              </button>
              <button name="dislike" type="submit" value="2" 
              class="likeAction btn <?= ($isDisliked == 1 && $isLiked == 0 && $videoId == $video['id']) ? 'btn-primary' : 'btn-outline-secondary'; ?>" 
              id="dislike">
                <i class="fas fa-thumbs-down" id="dislikeId"></i>
              </button>
            </form>
          </div>
        </div>
        <hr>

        <p class="color-black mt-2 mb-5 video_desc">
          <?= $video['description']; ?>
        </p>
        <hr>
      </div>

      

      <div class="col-lg-4 col-md-12 justify-content-start align-items-center">
      <?php foreach($similarVideos as $similarVideo): ?>
      <?php if ($similarVideo['video_slug'] != $video['video_slug']): ?>
        <div class="media">
          <a href="<?= $similarVideo['video_slug']; ?>">
            <div class="embed-responsive embed-responsive-16by9 mb-3 similarVideo mr-3">
              <video id="video" class="embed-responsive-item" poster="<?= (!empty($similarVideo['thumbnail'])) ? base_url('assets/thumbnails/thumbs/'.$similarVideo['thumbnail']) : ''; ?>">
                <source src="<?= base_url('assets/uploads/'.$similarVideo['video_name']); ?>"></source>
              </video>
            </div>
          </a>

          <div class="media-body">
            <h5 class="mt-0 color-black mb-1" style="font-size: 19px; font-weight: 400;">
              <?php $str = $similarVideo['title']; 
                $str = str_replace('.', ' ', $str);
                $str = str_replace('-', ' ', $str);
                $str = str_replace('_', ' ', $str);
                $str = str_replace('@', ' ', $str);
                $str = str_replace('&', ' ', $str);
              ?>
              <?= word_limiter($str, 3); ?>
            </h5>
            <a href="#" class="text-muted">
              <p class="mb-1" style="font-size: 16px; font-weight: 400;"><?= $similarVideo['name']; ?></p>
            </a>
            <p class="text-muted mt-0" style="font-size: 13px">
            <?php $viewes = $viewModel->where('video_id', $similarVideo['id'])->countAllResults('video_id'); ?>
            <?= ($viewes == 1) ? $viewes." View" : $viewes." Viewes"; ?> • <?= date('F j, Y', strtotime($similarVideo['created_at'])); ?>
            </p>
          </div>
        </div>
      <?php endif; ?>
      <?php endforeach; ?>

      </div>
    </div>


<?php include(APPPATH . 'Views/templates/view/footer.php'); ?>