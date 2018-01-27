<?php

use App\Permission;
use App\Role;
use App\User;

use Faker\Generator as Faker;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seed.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        $permissions = Permission::all();
        $permissions_for_admin = collect([]);
        $permissions_for_student = collect([]);
        foreach ($permissions as $permission) {
            if(starts_with($permission->name, 'admin')) {
                $permissions_for_admin->push($permission);
            }
            else if(starts_with($permission->name, 'student')) {
                $permissions_for_student->push($permission);
            }
        }
        $role_admin = Role::where('name', 'admin')->get()->first();
        foreach ($permissions_for_admin as $permission_for_admin) {
            $role_admin->attachPermission($permission_for_admin);
        }
        $role_student = Role::where('name', 'student')->get()->first();
        foreach ($permissions_for_student as $permission_for_student) {
            $role_student->attachPermission($permission_for_student);
        }

        $admins = [
            [
                'name' => 'Pen Griffey',
                'email' => 'pengriffey@gmail.com',
                'password' => bcrypt('pengriffey'),
                'phone' => '+221-77-777-77-77',
                'cin' => 'pengriffey221',
                'matriculation' => 'pengriffey221',
                'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
                'confirmed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Block Director',
                'email' => 'blockdirector@gmail.com',
                'password' => bcrypt('blockdirector'),
                'phone' => '+221-78-888-88-88',
                'cin' => 'blockdirector',
                'matriculation' => 'blockdirector221',
                'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
                'confirmed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Concierge 1',
                'email' => 'concierge-1@gmail.com',
                'password' => bcrypt('concierge'),
                'phone' => '+221-79-999-99-91',
                'cin' => 'concierge-1-221',
                'matriculation' => 'concierge-1-221',
                'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
                'confirmed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Concierge 2',
                'email' => 'concierge-2@gmail.com',
                'password' => bcrypt('concierge'),
                'phone' => '+221-79-999-99-92',
                'cin' => 'concierge-2-221',
                'matriculation' => 'concierge-2-221',
                'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
                'confirmed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Concierge 3',
                'email' => 'concierge-3@gmail.com',
                'password' => bcrypt('concierge'),
                'phone' => '+221-79-999-99-93',
                'cin' => 'concierge-3-221',
                'matriculation' => 'concierge-3-221',
                'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
                'confirmed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Concierge 4',
                'email' => 'concierge-4@gmail.com',
                'password' => bcrypt('concierge'),
                'phone' => '+221-79-999-99-94',
                'cin' => 'concierge-4-221',
                'matriculation' => 'concierge-4-221',
                'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
                'confirmed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Concierge 5',
                'email' => 'concierge-5@gmail.com',
                'password' => bcrypt('concierge'),
                'phone' => '+221-79-999-99-95',
                'cin' => 'concierge-5-221',
                'matriculation' => 'concierge-5-221',
                'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
                'confirmed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Concierge 6',
                'email' => 'concierge-6@gmail.com',
                'password' => bcrypt('concierge'),
                'phone' => '+221-79-999-99-96',
                'cin' => 'concierge-6-221',
                'matriculation' => 'concierge-6-221',
                'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
                'confirmed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        foreach ($admins as $key => $value) {
            $admin = User::create($value);
            $admin->attachRole($role_admin);
        }

        $students = [];
        for ($i = 0; $i < 30; $i++) {
            $student = [
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'password' => bcrypt('passer1234'),
                'phone' => $faker->phoneNumber,
                'cin' => str_shuffle(trim($faker->text(20))),
                'matriculation' => str_shuffle(trim($faker->text(20))),
                'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
                'confirmed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            array_push($students, $student);
            $student = User::create($student);
            $student->attachRole($role_student);
        }
    }
}
