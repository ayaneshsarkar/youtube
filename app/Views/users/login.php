<?php include(APPPATH . 'Views/templates/users/header.php'); ?>
<?php $validation = \Config\Services::validation(); ?>
<?php $session = \Config\Services::session(); ?>

  <div class="col-md-12 mb-5">

  <?php if (!empty($session->getFlashdata('userSuccess'))): ?>
    <div class="alert alert-success alert-dismissible fade show" role="success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <?php echo $session->getFlashdata('userSuccess')?></div>
  <?php endif; ?>

  <?php if (!empty($session->getFlashdata('verifyFailed'))): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <?php echo $session->getFlashdata('verifyFailed')?></div>
  <?php endif; ?>

  <?php if (!empty($session->getFlashdata('verifySucess'))): ?>
    <div class="alert alert-success alert-dismissible fade show" role="success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <?php echo $session->getFlashdata('verifySucess')?></div>
  <?php endif; ?>

  <?php if (!empty($session->getFlashdata('verifyExist'))): ?>
    <div class="alert alert-success alert-dismissible fade show" role="success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <?php echo $session->getFlashdata('verifyExist')?></div>
  <?php endif; ?>

  <?php if (!empty($session->getFlashdata('unverified'))): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <?php echo $session->getFlashdata('unverified')?></div>
  <?php endif; ?>

  <?php if (!empty($session->getFlashdata('loginFailed'))): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <?php echo $session->getFlashdata('loginFailed')?></div>
  <?php endif; ?>

  <?php if (!empty($session->getFlashdata('auth'))): ?>
    <div class="alert alert-success alert-dismissible fade show" role="success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <?php echo $session->getFlashdata('auth')?></div>
  <?php endif; ?>

    <h3 class="display-4 mb-4">Login</h3>

    <div class="form py-3 my-3">
      <?= form_open(); ?>
        <div class="form-group">
          <label for="username">Username <sup>*</sup></label>
          <input type="text" name="username" class="form-control form-control-lg <?= (!empty($validation->getError('username'))) ? 'is-invalid' : ''; ?>" value="<?= set_value('username'); ?>">
          <span class="invalid-feedback"><?php echo $validation->getError('username'); ?></span>
        </div>
        
        <div class="form-group">
          <label for="password">Password <sup>*</sup></label>
          <input type="password" name="password" class="form-control form-control-lg <?= (!empty($validation->getError('password'))) ? 'is-invalid' : ''; ?>" value="<?= set_value('password'); ?>">
          <span class="invalid-feedback"><?php echo $validation->getError('password'); ?></span>
        </div>

        <div class="d-flex mt-3 justify-content-between">
          <?php echo form_submit('mysubmit', 'Login', ['class' => 'btn btn-success']) ?>
          <a href="<?= base_url('users/users/signup'); ?>" class="btn btn-dark">Don't Have An Account? Sign Up...</a>
        </div>
      <?= form_close(); ?>
    </div>
  </div>






<?php include(APPPATH . 'Views/templates/users/footer.php'); ?>