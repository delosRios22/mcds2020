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
        $art->name        = "Super Mario Bros";
        $art->description = "Nuevo juego de nintendo Switch";
        $art->image       = "imgs/mariobros.png";
        $art->user_id     = 1;
        $art->category_id = 1;
        $art->save();

        $art = new Article;
        $art->name        = "Luigi Mansion";
        $art->image       = "imgs/luigi.jpg";
        $art->description = "Nuevo juego de la nintendo Switch";
        $art->user_id     = 1;
        $art->category_id = 1;
        $art->save();

        $art = new Article;
        $art->name        = "Sonic Racong";
        $art->image       = "imgs/sonic.jpg";
        $art->description = "Nuevo juego de la nintendo Switch";
        $art->user_id     = 1;
        $art->category_id = 1;
        $art->save();

        $art = new Article;
        $art->name        = "Zelda";
        $art->image       = "imgs/zelda.jpg";
        $art->description = "Nuevo juego de la nintendo Switch";
        $art->user_id     = 1;
        $art->category_id = 1;
        $art->save();

        $art = new Article;
        $art->name        = "Party";
        $art->image       = "imgs/party.jpg";
        $art->description = "Nuevo juego de la Wii U";
        $art->user_id     = 1;
        $art->category_id = 2;
        $art->save();

        $art = new Article;
        $art->name        = "San Andreas";
        $art->image       = "imgs/sanAndreas.jpg";
        $art->description = "Nuevo juego de la Wii U";
        $art->user_id     = 1;
        $art->category_id = 2;
        $art->save();

        $art = new Article;
        $art->name        = "Donkey Country";
        $art->image       = "imgs/donkey.jpg";
        $art->description = "Nuevo juego de la Wii U";
        $art->user_id     = 1;
        $art->category_id = 2;
        $art->save();

        $art = new Article;
        $art->name        = "Call of Duty";
        $art->image       = "imgs/callduty.jpg";
        $art->description = "Nuevo juego del Xbox One";
        $art->user_id     = 1;
        $art->category_id = 3;
        $art->save();

    }
}
