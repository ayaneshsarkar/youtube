<?php namespace App\Controllers\Studio;

  use CodeIgniter\Controller;
  use App\Models\User\UserModel;
  use App\Models\Studio\VideoModel;
  use App\Models\ViewModel;
  use App\Models\LikeModel;
  use App\Models\SubscribeModel;

  class Dashboard extends Controller {

    public function index() {
      $session = \Config\Services::session();
      if (!$session->get('user_id')) {
        $session->setFlashdata('auth', 'You need to be logged in to visit this page.');
        $auth = ['previous' => 'dashboard', 'way' => ''];
        $session->set($auth);
        return redirect()->route('users/users/login');
      }


      $userModel = new UserModel();
      $videoModel = new VideoModel();
      $viewModel = new ViewModel();
      $likeModel = new LikeModel();
      $subscribeModel = new SubscribeModel();

      $data['video'] = 
        $userModel->select('users.id as userId')
      ->join('videos', 'videos.user_id = users.id')
      ->select('videos.id, videos.thumbnail, videos.title, videos.video_slug, videos.video_name, users.username AS name, videos.created_at')
      ->where('videos.user_id', $session->get('user_id'))
      ->orderBy('videos.updated_at', 'DESC')
      ->first();

      $data['viewes'] = $viewModel->where('video_id', $data['video']['id'])->countAllResults('video_id');

      $data['likeCount'] = $likeModel->where('video_id', $data['video']['id'])->where('is_liked', 1)->countAllResults('video_id');

      $data['subscribers'] = $subscribeModel->where('channel_id', $session->get('user_id'))->where('subscribed', 1)->countAllResults('channel_id');

      $data['subscriberList'] = 
        $subscribeModel->select('user_id')
      ->join('users', 'users.id = subscribers.user_id')
      ->select('users.username', 'users.id')
      ->where('subscribers.channel_id', $session->get('user_id'))
      ->where('subscribed', 1)
      ->findAll(5);

      $data['totalViewes'] = 
        $viewModel->select('video_id')
      ->join('videos', 'videos.id = viewes.video_id')
      ->join('users', 'users.id = videos.user_id')
      ->where('users.id', $session->get('user_id'))
      ->countAllResults('video_id');

      $data['title'] = 'Dashboard';
      $data['pageTitle'] = 'Dashboard';

      echo view('studio/dashboard', $data);
    }

  }