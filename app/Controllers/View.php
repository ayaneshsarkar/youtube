<?php namespace App\Controllers;

  use CodeIgniter\Controller;
  use App\Models\Studio\VideoModel;
  use App\Models\ViewModel;

  use App\Models\LikeModel;

  class View extends Controller {

    public function view($slug) {

      $session = \Config\Services::session();

      $videoModel = new VideoModel();
      $viewModel = new ViewModel();
      $likeModel = new likeModel();

      $data['video'] =
       $videoModel->select('videos.id, videos.thumbnail, videos.title, videos.video_slug, videos.video_name, videos.description, users.username AS name, users.channel_id AS channel, videos.created_at, videos.tags')
      ->join('users', 'users.id = videos.user_id')
      ->orderBy('videos.updated_at', 'DESC')
      ->where('videos.video_slug', $slug)->first();

      $data['similarVideos'] = 
        $videoModel->select('videos.id, videos.thumbnail, videos.title, videos.video_slug, videos.video_name, videos.description, users.username AS name, videos.created_at, videos.tags')
      ->join('users', 'users.id = videos.user_id')
      ->where('videos.is_published', 1)
      ->like('videos.tags', $data['video']['tags'])
      ->orLike('videos.title', $data['video']['title'])
      ->orLike('videos.description', $data['video']['description'])
      ->orLike('users.username', $data['video']['name'])
      ->orderBy('videos.title', 'DESC')
      ->findAll();

      if (!empty($session->get('user_id'))) {
        $viewData = [
          'user_id' => $session->get('user_id'),
          'video_id' => $data['video']['id']
        ];

        $viewModel->save($viewData);
      }

      $data['title'] = $data['video']['title'];

      $data['viewes'] = $viewModel->where('video_id', $data['video']['id'])->countAllResults('video_id');
      $data['likes'] = $likeModel->where('video_id', $data['video']['id'])->where('is_liked', 1)->countAllResults('video_id');

      $data['dislikes'] = $likeModel->where('video_id', $data['video']['id'])->where('is_disliked', 1)->countAllResults('video_id');
      
      echo view('home/view', $data);

    }

  }