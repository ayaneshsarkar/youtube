<?php namespace App\Controllers;

  use CodeIgniter\Controller;
  use App\Models\Studio\VideoModel;
  use App\Models\ViewModel;
  use CodeIgniter\I18n\Time;

  class Home extends Controller {

    public function view($page) {

      helper('date');

      $videoModel = new VideoModel();
      $viewModel = new ViewModel();

      if ($page == FALSE) {
        $page = 'home';
      }

      if (!is_file(APPPATH.'Views/home/'.$page.'.php')) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
      }

      $data['videos'] =
       $videoModel->select('videos.id, videos.thumbnail, videos.title, videos.video_slug, videos.video_name, users.username AS name, videos.created_at')
      ->join('users', 'users.id = videos.user_id')
      ->where('videos.is_published', 1)
      ->orderBy('videos.updated_at', 'DESC')
      ->findAll();

      //$data['viewes'] = $viewModel->where('video_id', $data['videos']['id'])->countAllResults('video_id');

      $data['title'] = 'Home';
      $data['pageTitle'] = 'Welcome To YouTube!';

      echo view("home/{$page}", $data);

    }

  }