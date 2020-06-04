<?php namespace App\Controllers;

  use CodeIgniter\Controller;
  use App\Models\User\UserModel;
  use App\Models\Studio\VideoModel;
  use App\Models\ViewModel;

class Search extends Controller {


  public function search($search) {


    // if($search == 'search') {
    //   $search = $this->request->getVar('search');
    // }

    $videoModel = new VideoModel();
    $userModel = new UserModel();
    
    $search = strtolower($this->request->getVar('search'));

    $data['videos'] = 
      $videoModel->select('videos.id, videos.thumbnail, videos.title, videos.video_slug, videos.video_name, videos.description, users.username AS name, videos.created_at, videos.tags')
    ->join('users', 'users.id = videos.user_id')
    ->like('LOWER(videos.title)', $search)
    ->orLike('videos.tags', $search)
    ->orLike('LOWER(videos.description)', $search)
    ->orderBy('videos.title', 'DESC')
    ->findAll();

    $data['title'] = 'Home';
    $data['pageTitle'] = "Search: {$search}";

    echo view('home/home', $data);

  }

  // public function searchajax() {

  //   $videoModel = new VideoModel();
  //   $userModel = new UserModel();
  //   $viewModel = new ViewModel();

  //   $search = $this->request->getPost('search');

  //   if($this->request->isAJAX()) {

  //     $data['videos'] = 
  //       $videoModel->select('videos.id, videos.thumbnail, videos.title, videos.video_slug, videos.video_name, videos.description, users.username AS name, videos.created_at, videos.tags')
  //     ->join('users', 'users.id = videos.user_id')
  //     ->like('videos.title', $search)
  //     ->orLike('videos.tags', $search)
  //     ->orLike('videos.description', $search)
  //     ->orderBy('videos.title', 'DESC')
  //     ->findAll();

  //     $data['nothingFound'] = 'Nothing Found';

  //     if(empty($data['videos'])) {
  //       return $this->response->setJSON($data['nothingFound']);
  //     } else {
  //       return $this->response->setJSON($data);
  //     }
      

  //   }

  // }


}