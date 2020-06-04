<?php namespace App\Controllers;

  use CodeIgniter\Controller;
  use App\Models\LikeModel;
  use CodeIgniter\API\ResponseTrait;

class Likes extends Controller {

  use ResponseTrait;
  
  public function create($slug) {

    $session = \Config\Services::session();

    helper('url');

    if ($session->get('user_id') == NULL) {
      $session->setFlashdata('auth', 'You need to be logged in to visit this page.');
      $auth = ['previous' => "view/{$slug}", 'way' => 'view page'];
      $session->set($auth);
      return redirect()->route('users/users/login');
    }
    
    $likeModel = new LikeModel();

    if ($this->request->isAJAX()) {
      
      $userId = $session->get('user_id');
      $videoIdPost = $this->request->getPost('video_id');
      
      $likeDislike = $likeModel->where('user_id', $userId)->where('video_id', $videoIdPost)->first()['video_id'];

      if (!$likeDislike) {
        if ($this->request->getPost('like') == 1) {

          $data = [
            'is_liked' => 1,
            'is_disliked' => 0,
            'user_id' => $userId,
            'video_id' => $videoIdPost
          ];
          $likeModel->save($data);

          $data['likeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_liked', 1)->countAllResults('video_id');

          $data['dislikeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_disliked', 1)->countAllResults('video_id');

          return $this->respondCreated($data);

        } else {

          $data = [
            'is_liked' => 0,
            'is_disliked' => 1,
            'user_id' => $userId,
            'video_id' => $videoIdPost
          ];
          $likeModel->save($data);

          $data['likeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_liked', 1)->countAllResults('video_id');
          $data['dislikeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_disliked', 1)->countAllResults('video_id');

          return $this->respondCreated($data);

        }
      } else {
        $id = $likeModel->where('user_id', $userId)->where('video_id', $videoIdPost)->first()['id'];

        $likeStatus = $likeModel->where('user_id', $userId)->where('video_id', $videoIdPost)->first()['is_liked'];
        $dislikeStatus = $likeModel->where('user_id', $userId)->where('video_id', $videoIdPost)->first()['is_disliked'];
        
        $likePost = $this->request->getPost('like');
        $dislikePost = $this->request->getPost('dislike');

        if ($likeStatus == 1) {
          if($likePost == 1) {

            $likeModel->delete($id);
            $data = [
              'is_liked' => 0,
              'is_disliked' => 0
            ];

            $data['likeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_liked', 1)->countAllResults('video_id');
            $data['dislikeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_disliked', 1)->countAllResults('video_id');

            return $this->response->setJSON($data);

          } elseif($dislikePost == 2) {

            $data = [
              'is_liked' => 0,
              'is_disliked' => 1
            ];
            $likeModel->update($id, $data);

            $data['likeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_liked', 1)->countAllResults('video_id');
            $data['dislikeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_disliked', 1)->countAllResults('video_id');

            return $this->response->setJSON($data);

          }

        } elseif($dislikeStatus == 1) {

          if($dislikePost == 2) {

            $likeModel->delete($id);

            $data = [
              'is_liked' => 0,
              'is_disliked' => 0
            ];

            $data['likeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_liked', 1)->countAllResults('video_id');
            $data['dislikeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_disliked', 1)->countAllResults('video_id');

            return $this->response->setJSON($data);

          } elseif($likePost == 1) {
            $data = [
              'is_liked' => 1,
              'is_disliked' => 0
            ];
            $likeModel->update($id, $data);

            $data['likeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_liked', 1)->countAllResults('video_id');
            $data['dislikeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_disliked', 1)->countAllResults('video_id');

            return $this->response->setJSON($data);
          }

        } elseif($likeStatus == 0) {
          if ($likePost == 1) {
            $data = [
              'is_liked' => 1,
              'is_disliked' => 0
            ];
            $likeModel->update($id, $data);

            $data['likeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_liked', 1)->countAllResults('video_id');
            $data['dislikeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_disliked', 1)->countAllResults('video_id');

            return $this->response->setJSON($data);
            
          } elseif($dislikePost == 2) {

            $data = [
              'is_liked' => 0,
              'is_disliked' => 1
            ];
            $likeModel->update($id, $data);

            $data['likeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_liked', 1)->countAllResults('video_id');
            $data['dislikeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_disliked', 1)->countAllResults('video_id');

            return $this->response->setJSON($data);

          }

        } elseif($dislikeStatus == 0) {
          if($dislikePost == 2) {
            $data = [
              'is_liked' => 0,
              'is_disliked' => 1
            ];
            $likeModel->update($id, $data);

            $data['likeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_liked', 1)->countAllResults('video_id');
            $data['dislikeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_disliked', 1)->countAllResults('video_id');

            return $this->response->setJSON($data);

          } elseif($likePost == 1) {

            $data = [
              'is_liked' => 1,
              'is_disliked' => 0
            ];
            $likeModel->update($id, $data);

            $data['likeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_liked', 1)->countAllResults('video_id');
            $data['dislikeCount'] = $likeModel->where('video_id', $videoIdPost)->where('is_disliked', 1)->countAllResults('video_id');

            return $this->response->setJSON($data);

          }
        }

      }

    }

  }

}