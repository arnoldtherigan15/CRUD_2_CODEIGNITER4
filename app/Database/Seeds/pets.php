<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Pets extends Seeder
{
	public function run()
	{
		$datas = [
			[
				"name" => "Purrsloud",
				"species" => "Cat",
				"birth_year" => 2016,
				"photo" => "cat.jpg",
				"created_at" => Time::now(),
				"updated_at" => Time::now()
			],
			[
				"name" => "Barksalot",
				"species" => "Dog",
				"birth_year" => 2008,
				"photo" => "dog.jpg",
				"created_at" => Time::now(),
				"updated_at" => Time::now()
			],
			[
				"name" => "Meowsalot",
				"species" => "Cat",
				"birth_year" => 2012,
				"photo" => "cat2.jpg",
				"created_at" => Time::now(),
				"updated_at" => Time::now()
			]
		];

		foreach ($datas as $data) {
			// insert semua data ke tabel
			$this->db->table('pets')->insert($data);
		}
	}
}
