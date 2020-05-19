<?php include(APPPATH . 'Views/templates/studio/header.php'); ?>
<?php $session = \Config\Services::session(); ?>

<div class="col-lg-10 col-md-12 my-5 pr-lg-5 pr-sm-0 pr-xs-0 mb-5 pb-5">
  <?php if (!empty($session->getFlashdata('loginSuccess'))): ?>
    <div class="mx-2 alert alert-success alert-dismissible fade show" role="success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <?php echo $session->getFlashdata('loginSuccess')?></div>
  <?php endif; ?>
    
  <div class="d-flex flex-wrap justify-content-end align-items-stretch dashboard">

    <div class="card m-2 customCardWidth w-md-100 w-sm-100" style="min-height: 23rem !important">

    <?php if(!empty($video)): ?>
    
      <a href="<?= base_url("view/{$video['video_slug']}"); ?>" class="card-img card-img-top">
        <div id="video_cont" class="embed-responsive embed-responsive-16by9">
          <video id="video" class="embed-responsive-item" poster="<?= (!empty($video['thumbnail'])) ? base_url('assets/thumbnails/thumbs/'.$video['thumbnail']) : ''; ?>">
            <source src="<?= base_url('assets/uploads/'.$video['video_name']); ?>"></source>
          </video>
        </div>
      </a>
      <div class="card-body">
        <h5 class="card-title mb-3"><?= $video['title']; ?></h5>
        <p class="card-text mb-1">Viewes: <span><?= $viewes; ?></span></p>
        <p class="card-text mb-3">Likes: <span><?= $likeCount; ?></span></p>
        <a href="<?= base_url("studio/update/update/{$video['video_slug']}"); ?>" class="btn btn-primary">Edit</a>
      </div>

    <?php else: ?> 
      <p class="lead mt-4">
        No Videos Yet
      </p>
    <?php endif; ?>

    </div>

    <div class="card m-2 customCardWidth w-md-100 w-sm-100" id='card' style="border-radius: 2px !important">
      <div class="card-body">
        <p class="lead color-black mb-4" style="font-size: 1.2rem; font-weight: 400">Total Viewes</p>
        <h1 class="display-4"><?= $totalViewes; ?></h1>
      </div>
    </div>

    <div class="card m-2 customCardWidth w-md-100 w-sm-100" id='card' style="border-radius: 2px !important">
      <div class="card-body">
        <p class="lead color-black mb-4" style="font-size: 1.2rem; font-weight: 400">Total Subscribers</p>
        <h1 class="display-4"><?= $subscribers; ?></h1>
      </div>
    </div>

    <div class="card m-2 customCardWidth w-md-100 w-sm-100" id='card' style="border-radius: 2px !important">
      <div class="card-body">
        <p class="lead color-black mb-4" style="font-size: 1.2rem; font-weight: 400">Latest Subscribers</p>
        
        <?php foreach($subscriberList as $subs): ?>
          <p class="card-text"><?= $subs['username']; ?></p>
        <?php endforeach; ?>
        
      </div>
    </div>
  </div>


<?php include(APPPATH . 'Views/templates/studio/footer.php'); ?>