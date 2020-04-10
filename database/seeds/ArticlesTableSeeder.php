<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $art = new Article;
        $art->name        = "Luigi Mansion 3";
        $art->description = "Nuevo juego de la nintendo Switch";
        $art->image       = "imgs/luigui3.png";
        $art->user_id     = 1;
        $art->category_id = 1;
        $art->save();

        $art = new Article;
        $art->name        = "Pokemon Espada";
        $art->image       = "imgs/pespada.png";
        $art->description = "Nuevo juego de la nintendo Switch";
        $art->user_id     = 1;
        $art->category_id = 1;
        $art->save();

    }
}
