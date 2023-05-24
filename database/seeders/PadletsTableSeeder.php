<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Rating;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class PadletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $padlet = new \App\Models\Padlet;
        $padlet->name="1. Padlet";
        $padlet->is_public=false;
        $padlet->user_id=1;
        $padlet->save();

        //add entries to padlet
        $entrie = new \App\Models\Entrie;
        $entrie->user_id = 1;
        $entrie->title = "1. Entry";
        $entrie->content ="Entry-Inhalt";

        $entrie1 = new \App\Models\Entrie;
        $entrie1->user_id = 2;
        $entrie1->title = "2. Entry";
        $entrie1->content ="Entry-Inhalt";
        $padlet->entries()->saveMany([$entrie, $entrie1]);
        $padlet->save();


        $padlet2 = new \App\Models\Padlet;
        $padlet2->name="2. Padlet";
        $padlet2->is_public=true;
        $padlet2->user_id=1;
        $padlet2->save();

        $padlet3 = new \App\Models\Padlet;
        $padlet3->name="3. Padlet";
        $padlet3->is_public=true;
        $padlet3->user_id=2;
        $padlet3->save();

        //comments und ratings zu den entries dazu geben
        $comment1 = new Comment();
        $comment1->user_id = 1;
        $comment1->entrie_id = 1;
        $comment1->comment = 'Ein Kommentar für Entry 1';
        $comment1->save();

        $rating1 = new Rating();
        $rating1->user_id = 1;
        $rating1->entrie_id = 1;
        $rating1->rating = 4;
        $rating1->save();

        $entrie->comments()->saveMany([$comment1]);
        $entrie->ratings()->saveMany([$rating1]);
        $entrie->save();
    }
}
