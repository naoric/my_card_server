<?php 

class CardSeeder extends Seeder {
	public function run() {
		DB::table('cards')->delete();
		DB::table('images')->delete();

		$image = Image::create(array(
			'image' => file_get_contents(app_path() . '/data/hamashbir.jpg'),
			'mime' => 'image/jpeg'
		));

		Card::create(array(
			'name' 		=> 'Ha Mashbir la Zarhan',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae nobis officia modi voluptate quia dignissimos odit dicta sequi voluptas reprehenderit quod quas voluptatibus quisquam mollitia architecto incidunt harum perferendis minus.',
			'image_id' => $image->id
		));
		
		
	}
}
