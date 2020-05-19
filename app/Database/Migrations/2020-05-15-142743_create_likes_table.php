<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLikesTable extends Migration
{
	public function up()
	{
		
		$this->forge->addField([
			
			'id' => [
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'user_id' => [
				'type' => 'INT',
				'unsigned' => TRUE
			],
			'video_id' => [
				'type' => 'INT',
				'unsigned' => TRUE
			],
			'is_liked' => [
				'type' => 'tinyint',
				'constraint' => 1,
				'default' => 0
			],
			'is_disliked' => [
				'type' => 'tinyint',
				'constraint' => 1,
				'default' => 0
			]
			
		]);

		$this->forge->addField('created_at timestamp NOT NULL DEFAULT current_timestamp');
		$this->forge->addField('updated_at timestamp NOT NULL DEFAULT current_timestamp ON UPDATE current_timestamp');

		$this->forge->addKey('id', TRUE);
		$this->forge->addForeignKey('user_id','users','id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('video_id', 'videos', 'id', 'CASCADE', 'CASCADE');

		$this->forge->createTable('likes');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('likes');
	}
}
