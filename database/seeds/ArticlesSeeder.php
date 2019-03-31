<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::insert('INSERT INTO `articles` (`name`, `text`, `img`) VALUES(?,?,?)',
                [
                    'Blog post',
                    '<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>',
                    'pic1.jpg'
                ]);
    
        DB::table('articles')->insert(
            [
                [
                    'name'=>'Blog post 1',
                    'text'=>'<p>1 Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>',
                    'img'=>'pic2.jpg'
                ],
                [
                    'name'=>'Blog post 2',
                    'text'=>'<p>2 Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>',
                    'img'=>'pic3.jpg'
                ]

            ]
        );
        Article::create(
            [
                'name'=>'Blog post 4',
                'text'=>'<p>4 Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>',
                'img'=>'pic4.jpg'   
            ]
        );

    }
}
