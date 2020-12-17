<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Users extends Seeder
{
	public function run()
	{
		$faker = \Faker\Factory::create('id_ID');
		$user_data = [];
		for ($i = 1; $i <= 100; $i++) {
			$user_data[] = [
				"name" => $faker->name,
				"address" => $faker->address,
				"created_at" => Time::createFromTimestamp($faker->unixTime()),
				"updated_at" => Time::now()
			];
		}
		foreach ($user_data as $data) {
			// insert semua data ke tabel
			$this->db->table('users')->insert($data);
		}
	}
}
