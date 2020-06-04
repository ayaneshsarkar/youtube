<?php namespace App\Controllers\Studio;

  use CodeIgniter\Controller;
  use App\Models\Studio\VideoModel;
  use App\Models\User\UserModel;

  class Update extends Controller {

    public function update($slug) {

      $session = \Config\Services::session();
      $userModel = new UserModel();
      $videoModel = new VideoModel();
      $rightUser = $videoModel->where('video_slug', $slug)->first()['user_id'];
      
      if (!$session->get('user_id') || $session->get('user_id') != $rightUser) {
        $session->setFlashdata('auth', 'You need to be logged in to visit this page.');
        $auth = ['previous' => "studio/update/update/{$slug}", 'way' => 'to'];
        $session->set($auth);
        return redirect()->route('users/users/login');
      }

      helper('text');

      $data['video'] = $videoModel->where('video_slug', $slug)->first();
      $oldFile = $videoModel->where('video_slug', $slug)->first()['thumbnail'];
      $data['error'] = '';

      $val = null; $data['error'] = '';
      $data['title'] = 'Update';
      $data['pageTitle'] = 'Welcome! Update Your Video';

      if($this->request->getPost()) {
        $val = $this->validate([
          'title' => ['label' => 'Title', 'rules' => 'required|min_length[1]'],
          'description' => ['label' => 'description', 'rules' => 'required'],
          'thumbnail' => ['label' => 'Thumbnail', 'rules' => 'is_image[thumbnail]|max_size[thumbnail, 50000]'],
          'status' => ['label' => 'Status', 'rules' => 'required'],
          'tags' => ['label' => 'Tags', 'rules' => 'required|min_length[1]']
        ]);
      }

      if (!$val) {
        if($this->request->getPost()) {
          $data['video'] = [
            'video_slug' => $videoModel->where('video_slug', $slug)->first()['video_slug'],
            'video_name' => $videoModel->where('video_slug', $slug)->first()['video_name'],
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'thumbnail' => '',
            'status' => $this->request->getVar('status'),
            'tags' => $this->request->getVar('tags'),
            'is_unlisted' => $videoModel->where('video_slug', $slug)->first()['is_unlisted'],
            'is_published' => $videoModel->where('video_slug', $slug)->first()['is_published']
          ];
        }
        echo view('studio/update', $data, ['validation' => $this->validator]);
      } else {

        $dataUpdate = [
          'title' => $this->request->getVar('title'),
          'description' => $this->request->getVar('description'),
          'tags' => $this->request->getVar('tags'),
          'is_published' => ($this->request->getVar('status') == 2 ? '1' : 0),
          'is_unlisted' => ($this->request->getVar('status') == 1 ? '1' : 0)
        ];

        $newFile = $this->request->getFile('thumbnail');

        if ($oldFile!=NULL && file_exists('./assets/thumbnails/thumbs/'.$oldFile) && !empty($newFile) && $newFile->isValid()) 
        {
          $path = getcwd().'./assets/thumbnails/thumbs/'.$oldFile;
          unlink('./assets/thumbnails/thumbs/'.$oldFile);
        }

        if (!file_exists('./assets/thumbnails/'.$this->request->getFile('thumbnail'))) {
          $file = $this->request->getFile('thumbnail');
          $newName = $file->getRandomName();
          $file->move('./assets/thumbnails/thumbs', $newName);
          $dataUpdate['thumbnail'] = $newName;

          if (!$file->hasMoved()) {
            $data['error'] = 'Could Not Move File, Please Try Again.';
            echo view('studio/update', $data);
            exit;
          }
        }

        $id = $videoModel->where('video_slug', $slug)->first()['id'];
        $videoModel->update($id, $dataUpdate);

        return redirect()->route('videos');

      }

    }

  }