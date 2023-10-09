<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	*/
	public function run() {
		// \App\Models\User::factory(10)->create();
		$this->call([
			// DropdownSeeder::class,
			// PagesSeeder::class,
			// CitiesSeeder::class,
			// CountiesSeeder::class,
			// CountriesTableSeeder::class,
			// DropdownsSeeder::class,
			// JobFunctionsSeeder::class,
			// JobIndustriesSeeder::class,
			// JobLocationsSeeder::class,
			// SkillsSeeder::class,
			RolesSeeder::class,
			AdminsSeeder::class,
			// PermissionsSeeder::class,
		]);
	}
}
