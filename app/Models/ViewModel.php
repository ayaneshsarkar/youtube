<?php namespace App\Models;
  use CodeIgniter\Database\ConnectionInterface;
  use CodeIgniter\Model;

  class ViewModel extends Model {

    protected $table = 'viewes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'user_id', 'video_id', 'updated_at'];

  }