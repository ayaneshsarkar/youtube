<?php namespace App\Controllers;

  use CodeIgniter\Controller;
  use App\Models\Studio\VideoModel;
  use App\Models\User\UserModel;
  use App\Models\ViewModel;
  use App\Models\SubscribeModel;
  use CodeIgniter\API\ResponseTrait;

  class Subscribers extends Controller {

    use ResponseTrait;

    public function subscribers($channelId) {

      $userModel = new UserModel();
      $videoModel = new VideoModel();
      $subscribeModel = new SubscribeModel();

      $data['username'] = $userModel->where('channel_id', $channelId)->first()['username'];
      $data['channelId'] = $channelId;

      $channelName = $userModel->where('channel_id', $channelId)->first()['username'];

      $channel_id = $userModel->where('channel_id', $channelId)->first()['id'];
      $data['subscribers'] = $subscribeModel->where('channel_id', $channel_id)->where('subscribed', 1)->countAllResults('channel_id');

      $data['videos'] = 
        $videoModel->select('videos.id, videos.thumbnail, videos.title, videos.video_slug, videos.video_name, videos.description, users.username AS name, users.channel_id AS channel, videos.created_at, videos.tags')
      ->join('users', 'users.id = videos.user_id')
      ->orderBy('videos.updated_at', 'DESC')
      ->where('users.channel_id', $channelId)
      ->findAll();

      $data['title'] = 'subscriber';
      $data['pageTitle'] = "Subscribe: {$channelName}";

      echo view('home/subscribe', $data);

    }

    
    public function subscribe($channelId) {

      $session = \Config\Services::session();

      helper('url');

      if ($session->get('user_id') == NULL) {
        $session->setFlashdata('auth', 'You need to be logged in to visit this page.');
        $auth = ['previous' => "subscribe/{$channelId}", 'way' => 'channel page'];
        $session->set($auth);
        return redirect()->route('users/users/login');
      }

      $userModel = new UserModel();
      $subscribeModel = new SubscribeModel();

      $userId = $session->get('user_id');
      $channel_id = $userModel->where('channel_id', $channelId)->first()['id'];

      $findSubscribe = $subscribeModel->where('user_id', $userId)->where('channel_id', $channel_id)->first();

      if($this->request->isAJAX()) {

        $subscribeStatus = $this->request->getPost('subscribe_value');

        if(!$findSubscribe) {

          if ($subscribeStatus == 1) {

            $data = [
              'user_id' => $userId,
              'channel_id' => $channel_id,
              'subscribed' => 1,
              'not_subscribed' => 0
            ];

            $subscribeModel->save($data);

            $data['subscribers'] = $subscribeModel->where('channel_id', $channel_id)->where('subscribed', 1)->countAllResults('channel_id');

            return $this->response->setJSON($data);

          }

        } else {

          $id = $subscribeModel->where('user_id', $userId)->where('channel_id', $channel_id)->first()['id'];

          $subscribeStatus = $this->request->getPost('subscribe_value');

          $subscribeStatusDB = $subscribeModel->where('user_id', $userId)->where('channel_id', $channel_id)->first()['subscribed'];

          if ($subscribeStatusDB == 1) {

            if ($subscribeStatus == 1) {

              $subscribeModel->delete($id);

              $data = [
                'subscribed' => 0,
                'not_subscribed' => 0
              ];

              $data['subscribers'] = $subscribeModel->where('channel_id', $channel_id)->where('subscribed', 1)->countAllResults('channel_id');

              return $this->response->setJSON($data);

            }

          }

        }

      }
    
    }

  }