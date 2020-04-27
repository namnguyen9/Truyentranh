<?php

use Illuminate\Database\Seeder;

class MangasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $manga = new \App\Mangas();
        $manga->name ='Tokyo Ghoul';
        $manga->author ='Sui Ishida';
        $manga->content ='ok';
        $manga->status ='đang cập nhật';
        $manga->image ='';
        $manga->save();
    }
}
