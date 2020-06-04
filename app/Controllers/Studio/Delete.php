<?php namespace App\Controllers\Studio;

  use CodeIgniter\Controller;
  use App\Models\Studio\VideoModel;
  use App\Models\User\UserModel;

  class Delete extends Controller {

    
    public function delete($slug) {

      $session = \Config\Services::session();
      $userModel = new UserModel();
      $videoModel = new VideoModel();
      $rightUser = $videoModel->where('video_slug', $slug)->first()['user_id'];
      
      if (!$session->get('user_id') || $session->get('user_id') != $rightUser) {
        return redirect()->route('users/users/login');
      }

      $id = $videoModel->where('video_slug', $slug)->first()['id'];
      $video = $videoModel->where('video_slug', $slug)->first()['video_name'];
      $thumbnail = $videoModel->where('video_slug', $slug)->first()['thumbnail'];

      unlink('./assets/uploads/'.$video);
      if (file_exists('./assets/thumbnails/thumbs/'.$thumbnail)) {
        $path = getcwd().'./assets/thumbnails/thumbs/'.$thumbnail;
        unlink('./assets/thumbnails/thumbs/'.$thumbnail);
      }
      $videoModel->delete($id);

      return redirect()->route('videos');

    }

  }