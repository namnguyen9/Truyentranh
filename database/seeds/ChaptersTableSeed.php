<?php

use App\Chapters;
use Illuminate\Database\Seeder;

class ChaptersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $chapter = new App\Chapters();
        $chapter->chapter = 1;
        $chapter->title = 'ok';
        $chapter->content = 'ok';
        $chapter->manga_id = 1;
        $chapter->save();

    }
}
