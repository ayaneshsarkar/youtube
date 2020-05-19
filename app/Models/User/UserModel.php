<?php namespace App\Models\User;
  use CodeIgniter\Database\ConnectionInterface;
  use CodeIgniter\Model;

  class UserModel extends Model {

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['channel_id', 'username', 'email', 'password', 'verify_key', 'verified'];

  }