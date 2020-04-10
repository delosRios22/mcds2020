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
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus.	'
        ));
        Category::create(array(
        	'name'        => 'Play Station 4',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus.	'
        ));
        Category::create(array(
        	'name'        => 'Xbox One',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus.	'
        ));
    }
}
