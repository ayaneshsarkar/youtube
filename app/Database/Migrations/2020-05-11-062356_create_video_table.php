<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVideoTable extends Migration
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
			'video_name' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'video_slug' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE
			],
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'description' => [
				'type' => 'TEXT',
				'null' => TRUE
			],
			'thumbnail' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE
			],
			'tags' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE
			]

		]);

		$this->forge->addField('is_published tinyint(1) NOT NULL DEFAULT 0');
		$this->forge->addField('is_unlisted tinyint(1) NOT NULL DEFAULT 1');
		$this->forge->addField('created_at timestamp NOT NULL DEFAULT current_timestamp');
		$this->forge->addField('updated_at timestamp NOT NULL DEFAULT current_timestamp ON UPDATE current_timestamp');

		$this->forge->addKey('id', TRUE);
		$this->forge->addForeignKey('user_id','users','id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('videos');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('videos');
	}
}
