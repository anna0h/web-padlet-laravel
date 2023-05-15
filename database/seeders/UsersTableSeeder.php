<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User;
        $user->firstName = "Anna";
        $user->lastName = "Hornbachner";
        $user->email = "anna@test.at";
        $user->password = "secret";
        $user->image = "https://i.pinimg.com/originals/ba/d4/5a/bad45a40fa6e153ef8d1599ba875102c.png";
        $user->save();

        $user2 = new \App\Models\User;
        $user2->firstName = "fN2";
        $user2->lastName = "lN2";
        $user2->email = "zwei@test.at";
        $user2->password = "secret";
        $user2->image = "https://i.pinimg.com/originals/ba/d4/5a/bad45a40fa6e153ef8d1599ba875102c.png";
        $user2->save();

        $user3 = new \App\Models\User;
        $user3->firstName = "fN3";
        $user3->lastName = "lN3";
        $user3->email = "drei@test.at";
        $user3->password = "secret";
        $user3->image = "https://i.pinimg.com/originals/ba/d4/5a/bad45a40fa6e153ef8d1599ba875102c.png";
        $user3->save();
    }
}
