<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(array(
            'name'        => 'Nintendo Switch',
            'image'       => 'imgs/nintendoSwitch.jpg',
        	'description' => 'Articulos nuevos de la Nintendo Switch.'
        ));
        Category::create(array(
            'name'        => 'Wii U',
            'image'       => 'imgs/wiiU.jpg',
        	'description' => 'Articulos nuevos de la Nintendo Wii U.	'
        ));
        Category::create(array(
            'name'        => 'Xbox One',
            'image'       => 'imgs/xboxOne.jpg',
        	'description' => 'Articulos nuevos del Xbox One.	'
        ));
    }
}
