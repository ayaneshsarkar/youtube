<?php namespace App\Models;
  use CodeIgniter\Database\ConnectionInterface;
  use CodeIgniter\Model;

  class LikeModel extends Model {

    protected $table = 'likes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['is_liked', 'is_disliked', 'user_id', 'video_id'];

  }