<?php namespace App\Controllers\Users;

  use CodeIgniter\Controller;
  use App\Models\User\UserModel;

  class Users extends Controller {
    private function emailBody($username, $hashedLink) {

      $body = 'Here is your Username and Verification link' . '<br><br>';
      $body .= 'Username: ' . $username . '<br><br>';
      $body .= '<a href=' .'"'.base_url('/verify/'.$hashedLink).'"'. '>Verify Yourself</a>';

      return $body;

    }  
    private function auth($username, $password) {

      $userModel = new UserModel();
      $verifyAuth = $userModel->where('username', $username)->first();

      if ($verifyAuth != NULL) {
        if (password_verify($password, $verifyAuth['password'])) {
          return $verifyAuth['id'];
        }
      }
      
    }

    public function signup() {

      $email = \Config\Services::email();
      $session = \Config\Services::session();

      if ($session->get('user_id')) {
        return redirect()->route('dashboard');
      }

      $userModel = new UserModel();
      helper(['form', 'url', 'text']);
      $val = null;

      $data['title'] = 'signup';
      $data['pageTitle'] = 'SignUp';

      if ($this->request->getPost()) {
        $val = $this->validate([
          'username' => ['label' => 'Username', 'rules' => 'trim|required|min_length[3]|is_unique[users.username]'],
          'email' => ['label' => 'Email', 'rules' => 'trim|required|valid_email|is_unique[users.email]'],
          'password' => ['label' => 'Password', 'rules' => 'trim|required|min_length[5]|matches[confirm_password]'],
          'confirm_password' => ['label' => 'Confirm Password', 'rules' => 'trim|required|min_length[5]|matches[password]']
        ]);
      }

      if (!$val) {
        echo view('users/signup', $data, ['validation' => $this->validator]);
      } else {

        $username = $this->request->getVar('username');
        $userEmail = $this->request->getVar('email');

        $SMTPUser = 'ayaneshsarkar101@gmail.com';

        $verifyKey = random_string('alpha', 10);
        $hashVerifyKey = md5($verifyKey);
        $channelId = random_string('alnum', 12);

        $dataSignup = [
          'channel_id' => $channelId,
          'username' => $username,
          'email' => $userEmail,
          'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
          'verify_key' => $hashVerifyKey
        ];

        $email->setFrom($SMTPUser, 'Ayanesh Sarkar');
        $email->setTo($userEmail);
        $email->setSubject('Verification Email');
        $email->setMessage($this->emailBody($username, $hashVerifyKey));

        if ($email->send()) {
          $userModel->save($dataSignup);
          $session->setFlashdata('userSuccess', 'Verification Mail Sent! Please Check Your Email Inbox.');
          return redirect()->route('users/users/login');
        } else {
          //print_r($dataSignup);
          $data['error'] = 'Could Not Send Email, Please Try Again!';
          echo view('users/signup', $data, ['validation' => $this->validator]);
        }

      }

    }

    public function verify($hashParam) {

      $session = \Config\Services::session();

      if ($session->get('user_id')) {
        return redirect()->route('dashboard');
      }

      $userModel = new UserModel();

      $user = $userModel->where('verify_key', $hashParam)->first();

      if ($user == NULL) {
        $session->setFlashdata('verifyFailed', 'Wrong Varification Token!');
        return redirect()->route('users/users/login');
      } else {
        $id = $user['id'];
        $verifyStatus = $user['verified'];

        if ($verifyStatus == 0) {
          $data = [ 'verified' => 1 ];
          $userModel->update($id, $data);
          $session->setFlashdata('verifySucess', 'Verification Successful. You may now Login.');
          return redirect()->route('users/users/login');
        } else {
          $session->setFlashdata('verifyExist', "Hey! You're already verified. Don't mess with us... :)");
          return redirect()->route('users/users/login');
        }
      }

    }

    
    public function login() {

      $session = \Config\Services::session();

      if ($session->get('user_id')) {
        return redirect()->route('dashboard');
      }

      $userModel = new UserModel();

      $validation = null;
      $data['title'] = 'login';
      $data['pageTitle'] = 'Login';

      $inputFields = [
        'username' => ['label' => 'Username', 'rules' => 'trim|required|min_length[3]'],
        'password' => ['label' => 'Password', 'rules' => 'trim|required|min_length[5]'],
      ];

      if ($this->request->getPost()) {
        $validation = $this->validate($inputFields);
      }

      if(!$validation) {
        echo view('users/login', $data, ['validation' => $this->validator]);
      } else {

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $userId = $this->auth($username, $password);

        if ($userId != NULL) {

          $verifiedStatus = $userModel->where('id', $userId)->first();

          if ($verifiedStatus['verified'] == 0) {
            $session->setFlashdata('unverified', 'You need to Verify youself before you Login.');
            return redirect()->route('users/users/login');
          } else {

            $userData = [
              'user_id' => $userId,
              'username' => $username,
              'logged_in' => TRUE
            ];
  
            // Set Session Data
            $session->set($userData);

            if (!empty($session->get('previous'))) {

              if (!empty($session->get('way'))) {
                return redirect()->to(base_url($session->get('previous')));
                $session->remove('previous');
                $session->remove('way');
              } else {
                return redirect()->route($session->get('previous'));
                $session->remove('previous');
                $session->remove('way');
              }
              
            }
  
            $session->setFlashdata('loginSuccess', 'Welcome! You have just logged in.');
            return redirect()->route('dashboard');

          }

        } else {
          $session->setFlashdata('loginFailed', 'Username or Password might be incorrect.');
          return redirect()->route('users/users/login');
        }

      }
      


      
    }

    public function logout() {

      $session = \Config\Services::session();

      if (!$session->get('user_id')) {
        return redirect()->route('users/users/login');
      }

      $session->remove('logged_in');
      $session->remove('username');
      $session->remove('user_id');
      $session->destroy();

      return redirect()->route('users/users/login');

    }

  }

  