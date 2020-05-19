<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE
			],
			'verify_key' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE
			]
		]);

		$this->forge->addField('verified tinyint(1) NOT NULL DEFAULT 0');
		$this->forge->addField('created_at timestamp NOT NULL DEFAULT current_timestamp');
		$this->forge->addField('updated_at timestamp NOT NULL DEFAULT current_timestamp ON UPDATE current_timestamp');

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
