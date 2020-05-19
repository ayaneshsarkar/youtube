<?php include(APPPATH . 'Views/templates/users/header.php'); ?>
<?php $validation = \Config\Services::validation(); ?>

<div class="col-md-12 mb-5">
  <h3 class="display-4 mb-4">Sign Up</h3>

  <div class="form py-3 my-3">
    <?= form_open(); ?>
      <div class="form-group">
        <label for="username">Username <sup>*</sup></label>
        <input type="text" name="username" class="form-control form-control-lg <?= (!empty($validation->getError('username'))) ? 'is-invalid' : ''; ?>" value="<?= set_value('username'); ?>">
        <span class="invalid-feedback"><?php echo $validation->getError('username'); ?></span>
      </div>

      <div class="form-group">
        <label for="email">Email <sup>*</sup></label>
        <input type="email" name="email" class="form-control form-control-lg <?= (!empty($validation->getError('email'))) ? 'is-invalid' : ''; ?>" value="<?= set_value('email'); ?>">
        <span class="invalid-feedback"><?php echo $validation->getError('email'); ?></span>
        <span class="invalid-feedback d-block"><?= (!empty($error)) ? $error : ''; ?></span>
      </div>
      
      <div class="form-group">
        <label for="password">Password <sup>*</sup></label>
        <input type="password" name="password" class="form-control form-control-lg <?= (!empty($validation->getError('password'))) ? 'is-invalid' : ''; ?>" value="<?= set_value('password'); ?>">
        <span class="invalid-feedback"><?php echo $validation->getError('password'); ?></span>
      </div>

      <div class="form-group mb-3">
        <label for="confirm_password">Confirm Password <sup>*</sup></label>
        <input type="password" name="confirm_password" class="form-control form-control-lg <?= (!empty($validation->getError('confirm_password'))) ? 'is-invalid' : ''; ?>" value="<?= set_value('confirm_password'); ?>">
        <span class="invalid-feedback"><?php echo $validation->getError('confirm_password'); ?></span>
      </div>

      <div class="d-flex mt-3 justify-content-between">
        <?php echo form_submit('mysubmit', 'Sign Up', ['class' => 'btn btn-success']) ?>
        <a href="<?= base_url('/users/users/login'); ?>" class="btn btn-dark">Already Have An Account? Login...</a>
      </div>
    <?= form_close(); ?>
  </div>
</div>


<?php include(APPPATH . 'Views/templates/users/footer.php'); ?>