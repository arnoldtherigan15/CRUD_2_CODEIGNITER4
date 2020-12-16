<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pets extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'species' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'birth_year' => [
				'type'			 => 'VARCHAR',
				'constraint'     => '255'
			],
			'photo' => [
				'type'			 => 'VARCHAR',
				'constraint'     => '255'
			],
			'created_at' => [
				'type'			 => 'DATETIME',
				'null'           => true,
			],
			'updated_at' => [
				'type'			 => 'DATETIME',
				'null'           => true,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('pets');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pets');
	}
}
