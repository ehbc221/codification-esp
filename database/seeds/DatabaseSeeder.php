<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(FormationsTableSeeder::class);
        $this->call(GradesTableSeeder::class);
        $this->call(BlocsTableSeeder::class);
        $this->call(FloorsTableSeeder::class);
        $this->call(LanesTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
    }
}
