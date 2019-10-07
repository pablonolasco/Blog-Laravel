<?php

use Illuminate\Database\Seeder;
use App\Forum;
use App\Posts;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //semillero cuando se ejecute el comando migrate se crearan en automatico los datos
        factory(User::class, 50)->create();
        factory(Forum::class, 20)->create();
        factory(Posts::class, 100)->create();
    }
}
