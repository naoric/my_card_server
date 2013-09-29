<?php 

class CardSeeder extends Seeder {
	public function run() {
		DB::table('cards')->delete();
		
		Card::create([
			'name' => 'Ha Mashbir la Zarhan',
			'address' => 'Jabotinsky 14',
			'description' => 'Shithole',
			'image' => file_get_contents(app_path() . '/data/hamashbir.jpg')
		]);
		
		
	}
}
