<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyUsersTable extends Migration
{
	public function up()
	{
		$forge = \Config\Database::forge();
		helper('text');

		$fields = [
			'channel_id' => [ 
				'type' => 'VARCHAR',
				'constraint' => 255,
				'default' => NULL,
				'after' => 'id'
			]
		];

		$forge->addColumn('users', $fields);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
