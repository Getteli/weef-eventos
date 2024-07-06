<?php

namespace Database\Seeders;

use App\Models\Eventos;
use Illuminate\Database\Seeder;

class EventosSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Eventos::factory(8)->create();
	}
}
