<?php namespace App\Models\Studio;
  use CodeIgniter\Database\ConnectionInterface;
  use CodeIgniter\Model;

  class VideoModel extends Model {

    protected $table = 'videos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'video_name', 'video_slug', 'title', 'description', 'thumbnail', 'tags', 'is_published', 'is_unlisted', 'updated_at'];
    

  }