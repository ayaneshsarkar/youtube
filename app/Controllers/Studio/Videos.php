<?php namespace App\Controllers\Studio;

  use CodeIgniter\Controller;
  use App\Models\Studio\VideoModel;

  class Videos extends Controller {

    public function index() {

      $session = \Config\Services::session();
      
      if (!$session->get('user_id')) {
        $session->setFlashdata('auth', 'You need to be logged in to visit this page.');
        $auth = ['previous' => 'videos', 'way' => ''];
        $session->set($auth);
        return redirect()->route('users/users/login');
      }

      $videoModel = new VideoModel;
      $data['videos'] = 
      $videoModel->where('user_id', $session->get('user_id'))
      ->orderBy('updated_at', 'DESC')
      ->findAll();

      $data['title'] = 'Videos';
      $data['pageTitle'] = 'All of Your Videos';

      echo view('studio/videos', $data);
    }

  }