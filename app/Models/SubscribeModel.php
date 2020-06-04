<?php namespace App\Models;
  use CodeIgniter\Database\ConnectionInterface;
  use CodeIgniter\Model;

  class SubscribeModel extends Model {

    protected $table = 'subscribers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['subscribed', 'not_subscribed', 'user_id', 'channel_id'];

  }