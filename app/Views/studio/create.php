<?php include(APPPATH . 'Views/templates/studio/header.php'); ?>
<?php $validation = \Config\Services::validation(); ?>
<div class="col-lg-9 col-md-12">
  <main class="py-3">
    <div class="container">
      <h3 class="display-4 mb-2 d-none d-lg-block">Create Video</h3>

      <div class="d-flex flex-column justify-content-center align-items-center py-2">
        <div class="upload_button mb-3"><i class="fas fa-upload"></i></div>
        <p class="lead color-black mb-3">Drag and drop video files to upload</p>
        <p class="color-light-black mb-4">Your videos will be private until you publish them.</p>
        <p class="color-red"><?php if ($error != NULL) { echo $error; } else { echo ''; } ?></p>

        <?php echo form_open_multipart('studio/create/create', ['id' => 'form']); ?>
          <button class="btn btn-lg btn-primary btn-file">
            SELECT FILE
            <input type="file" id="video" name="video">
          </button>
        </form>
      </div>
    </div>
  </main>
</div>


<?php include(APPPATH . 'Views/templates/studio/footer.php'); ?>