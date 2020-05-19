<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSubscribersTable extends Migration
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
				'unsigned' => TRUE,
				'null' => FALSE
			],
			'channel_id' => [
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => FALSE
			],
			'subscribed' => [
				'type' => 'tinyint',
				'constraint' => 1,
				'default' => 0
			],
			'not_subscribed' => [
				'type' => 'tinyint',
				'constraint' => 1,
				'default' => 1
			]

		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->addField('created_at timestamp NOT NULL DEFAULT current_timestamp');
		$this->forge->addField('updated_at timestamp NOT NULL DEFAULT current_timestamp ON UPDATE current_timestamp');

		$this->forge->addForeignKey('channel_id','users','id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('subscribers');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('subscribers');
	}
}
