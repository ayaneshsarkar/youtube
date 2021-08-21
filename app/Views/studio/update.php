<?php include(APPPATH . 'Views/templates/studio/header.php'); ?>
<?php $validation = \Config\Services::validation(); ?>

  <div class="col-lg-9 col-md-12 mb-5 update" id="studioFlex">
    <div class="container">
    <div class="row">
      <div class="col-md-8 align-items-center">
        <h3 class="display-4 mb-4">Update Video</h3>

        <?= form_open_multipart('studio/update/update/' . $video['video_slug']); ?>
          <!-- Video Title -->
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($validation->getError('title'))) ? 'is-invalid' : ''; ?>" value="<?= $video['title']; ?>">
            <span class="invalid-feedback"><?php echo $validation->getError('title'); ?></span>
          </div>
          <!-- Description -->
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" rows="5" class="form-control form-control-lg <?php echo (!empty($validation->getError('description'))) ? 'is-invalid' : ''; ?>"><?= (!empty($video['description'])) ? $video['description'] : ''; ?></textarea>
            <span class="invalid-feedback"><?php echo $validation->getError('description'); ?></span>
          </div>
          <!-- Thumbnail -->
          <div class="custom-file mb-4">
            <input type="file" name="thumbnail" class="custom-file-input" id="videoThumbnail">
            <label class="custom-file-label" for="thumbnail" id="videoThumbnailLabel">
              <?= 
                (!empty($video['thumbnail'])) ? $video['thumbnail'] : 'Choose Thumbnail Image'; 
              ?>
            </label>
            <span class="invalid-feedback d-block"><?php echo $validation->getError('thumbnail'); ?></span>
            <span class="invalid-feedback d-block"><?= (!empty($error)) ? $error : ''; ?></span>
          </div>
          <!-- Tags -->
          <div class="form-group">
            <label for="tags">Tags <span class="color-red"><sup>* Separate by commas</sup></span></label>
            <input data-role="tagsinput" type="text" name="tags" class="form-control form-control-lg <?php echo (!empty($validation->getError('tags'))) ? 'is-invalid' : ''; ?>" value="<?= (!empty($video['tags'])) ? $video['tags'] : ''; ?>" id="tags" />
            <span class="invalid-feedback"><?php echo $validation->getError('tags'); ?></span>
          </div>

          <?php echo form_submit('mysubmit', 'Update', ['class' => 'btn btn-success']) ?>
      </div>

      <div class="col-md-4 align-items-center mt-3 mb-5">
        <div class="video_props mb-4">
          <!-- Video -->
          <div id="video_cont" class="embed-responsive embed-responsive-16by9 mt-lg-5 mb-3">
            <video id="video" class="embed-responsive-item" poster="<?= (!empty($video['thumbnail'])) ? base_url('assets/thumbnails/thumbs/'.$video['thumbnail']) : ''; ?>" controls="controls">
              <source src="<?= base_url('assets/uploads/'.$video['video_name']); ?>"></source>
            </video>
          </div>
          <!-- Open Video -->
          <div class="open_video mb-4 pl-2">
            <p class="text-muted mb-1">Video Link</p>
            <a href="<?= base_url() . "/view/" . $video['video_slug'] ?>" target="_blank">
              Open Video
            </a>
          </div>
          <!-- Video Name -->
          <div class="video_name pl-2">
            <p class="text-muted mb-1">Video Name</p>
            <p class="lead color-black">
            <?php $str = $video['title']; 
              $str = str_replace('.', ' ', $str);
              $str = str_replace('-', ' ', $str);
              $str = str_replace('_', ' ', $str);
              $str = str_replace('@', ' ', $str);
              $str = str_replace('&', ' ', $str);
            ?>
            <?= word_limiter($str, 3); ?>
            </p>
          </div>
        </div>

        <!-- Video Status -->
        <div class="video_status">
          <select name="status" class="form-control form-control-lg">
            <option value="1" 
            <?= ($video['is_unlisted'] == 1) ? 'selected' : ''; ?>>Unlisted</option>

            <option value="2" 
            <?= ($video['is_published'] == 1) ? 'selected' : ''; ?>>Published</option>
          </select>
          <span class="invalid-feedback d-block"><?php echo $validation->getError('status'); ?></span>
        </div>

        </form>
      </div>
    </div>
    </div>
  </div>

<?php include(APPPATH . 'Views/templates/studio/footer.php'); ?>