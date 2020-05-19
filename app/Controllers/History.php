<?php namespace App\Controllers;

  use CodeIgniter\Controller;
  use App\Models\Studio\VideoModel;
  use App\Models\User\UserModel;
  use App\Models\ViewModel;


  
  class History extends Controller {

    public function history() {
      $session = \Config\Services::session();

      if (!$session->get('user_id')) {
        $session->setFlashdata('auth', 'You need to be logged in to visit this page.');
        $auth = ['previous' => 'history', 'way' => ''];
        $session->set($auth);
        return redirect()->route('users/users/login');
      }


      $viewModel = new ViewModel();
      $videoModel = new VideoModel();
      $userModel = new UserModel();

      $currentUserId = $viewModel->where('user_id', $session->get('user_id'))->first()['user_id'];

      $data['videos'] = 
          $videoModel->select('videos.id, videos.thumbnail, videos.title, videos.video_slug, videos.video_name, videos.description, videos.created_at, videos.tags')
      ->join('viewes', 'viewes.video_id = videos.id')
      ->join('users', 'users.id = videos.user_id')
      ->select('users.username AS name')
      ->selectMax('viewes.created_at', 'max_date')
      ->where('viewes.user_id', $session->get('user_id'))
      ->where('videos.is_published', 1)
      ->groupBy('viewes.video_id')
      ->orderBy('max_date', 'DESC')
      ->findAll();

      $data['title'] = 'History';
      $data['pageTitle'] = 'History Page';

      echo view('home/history', $data);
    } 

  }