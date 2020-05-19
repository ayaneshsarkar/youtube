<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/41aaf3a4bf.js" crossorigin="anonymous"></script>

  <!-- Tagify CSS -->

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">

  <title><?= $pageTitle; ?></title>
</head>
<body>
  <?php helper(['form', 'text', 'url']); 
        $session = \Config\Services::session();
  ?>

  <nav class="navbar navbar-expand-lg sticky-top py-3 shadow navbar-light bg-light" style="z-index: 1">
    <div class="container">
      <a class="navbar-brand color-red" href="<?= base_url(); ?>">YouTube</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <form class="form-inline my-2 my-lg-0 ml-3" action="<?= base_url('search/search'); ?>" method="get" id="searchForm">
          <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" id="search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <ul class="navbar-nav ml-auto">
          <?php if(!$session->get('user_id')): ?>
            <li class="nav-item ml-3"><a href="<?= base_url('users/users/signup') ?>" class="nav-link">Signup</a></li>
            <li class="nav-item ml-3"><a href="<?= base_url('users/users/login'); ?>" class="nav-link">Login</a></li>
          <?php elseif($session->get('user_id')): ?>
            <li class="nav-item ml-3"><a href="<?= base_url() ?>/studio/create/create" class="nav-link">Create</a></li>
            <li class="nav-item ml-3"><a href="<?= base_url('logout'); ?>" class="nav-link">Logout(<?= $session->get('username'); ?>)</a></li>
          <?php endif; ?>
        </ul>
        
      </div>
    </div>
  </nav>

  <nav class="navbar w-100 flex-row fixed-bottom navbar-light bg-light d-lg-none d-md-block d-sm-block">
    <ul class="navbar-nav justify-content-between align-items-center" id="ulNav">
        <li class="nav-item ml-3">
          <a href="<?= base_url(); ?>" class="list-group-item <?= ($title == 'Home') ? 'color-red' : 'color-black'; ?>">
          <i class="fas fa-home"></i></a>
        </li>

        <li class="nav-item ml-3">
          <a href="<?= base_url('history'); ?>" class="list-group-item <?= ($title == 'History') ? 'color-red' : 'color-black'; ?>">
          <i class="fas fa-history mr-2"></i></a>
        </li>

        <li class="nav-item ml-3">
          <a href="<?= base_url() ?>/dashboard" class="list-group-item color-black"><i class="fas fa-tachometer-alt mr-2"></i></a>
        </li>

        <li class="nav-item ml-3">
        <a href="<?= base_url() ?>/videos" class="list-group-item color-black"><i class="fas fa-video mr-2"></i></a>
        </li>
    </ul>
  </nav>

  <!-- Aside -->
    <aside class="shadow-lg d-none d-lg-block" id="homeAside">
      <ul class="list-group">
        <a href="<?= base_url(); ?>" class="list-group-item <?= ($title == 'Home') ? 'active-list color-red' : 'color-black'; ?>">
        <i class="fas fa-home mr-2"></i>Home</a>
        <a href="<?= base_url('history'); ?>" class="list-group-item <?= ($title == 'History') ? 'active-list color-red' : 'color-black'; ?>">
        <i class="fas fa-history mr-2"></i>History</a>
        <a href="<?= base_url() ?>/dashboard" class="list-group-item color-black"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
        <a href="<?= base_url() ?>/videos" class="list-group-item color-black"><i class="fas fa-video mr-2"></i>Videos</a>
      </ul>
    </aside>
 
  


  