<?php namespace App\Controllers\Studio;

  use CodeIgniter\Controller;
  use App\Models\Studio\VideoModel;
  use App\Models\User\UserModel;

  class Create extends Controller {

    public function create() {

      $session = \Config\Services::session();
      
      if (!$session->get('user_id')) {
        $session->setFlashdata('auth', 'You need to be logged in to visit this page.');
        $auth = ['previous' => 'studio/create/create', 'way' => ''];
        $session->set($auth);
        return redirect()->route('users/users/login');
      }

      $val = null; $data['error'] = ''; $data['activeClass'] = 'active-list';
      helper(['text', 'url']);
      $videoModel = new VideoModel();
      $userModel = new UserModel();

      $data['title'] = 'Create';
      $data['pageTitle'] = 'Create Your Video';

      // Creating File Validation
      $file = $this->request->getFile('video');
      if ($file) {
        $type = $file->getClientMimeType('video'); 
        if ($type && $type != 'video/mp4') {
          $data['error'] = 'Invalid File';
        } else if ($file->getSize() > 2048000000000) {
          $data['error'] = 'File Too Big';
        } else {
          $val = TRUE;
        }
    
      }

      // Making Action Based On Validation
      if (!$val) {
        echo view('studio/create', $data);
      } else {

        // Moving The File
        $newName = $file->getRandomName();
        $file->move('./assets/uploads', $newName);

        // Action Based On The Movement Of The File
        $slug = random_string('alnum', 10);

        if ($file->hasMoved()) {
          $videoData = [
            'video_name' => $newName,
            'video_slug' => $slug,
            'title' => $file->getClientName('video'),
            'user_id' => $session->get('user_id')
          ];

          $videoModel->save($videoData);
          return redirect()->to(base_url("/studio/update/update/$slug"));
        } else {
          $data['error'] = 'Could Not Move File!';
          echo view('studio/create', $data);
        }

      }
      
    }

  }
