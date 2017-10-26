<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()  {
      // DB::statement('SET FOREIGN_KEY_CHECK=0');
      // DB::truncate();
      // DB::statement('SET FOREIGN_KEY_CHECK=1');
      DB::table('roles')->insert([
          [
            'id' => 1,
            'namaRule' => 'admin',
          ],
          [
            'id' => 2,
            'namaRule' => 'user',
          ],
        ]
      );

      DB::table('users')->insert([
          [
            'roles_id' => 1,
            'username' => 'tuah',
            'email' => 'tuah@gmail.com',
            'name' => 'tuah oktorino',
            'password' => bcrypt('12345'),
          ],
          [
            'roles_id' => 1,
            'username' => 'ochin',
            'email' => 'ochin@gmail.com',
            'name' => 'kalyca oucktrin syazalfa',
            'password' => bcrypt('12345'),
          ],
          [
            'roles_id' => 2,
            'username' => 'achie',
            'email' => 'achie@gmail.com',
            'name' => 'asri larasati puspitasari',
            'password' => bcrypt('12345'),
          ],
          [
            'roles_id' => 2,
            'username' => 'orin',
            'email' => 'orin@gmail.com',
            'name' => 'lauta soarin laksmita ramadhani',
            'password' => bcrypt('12345'),
          ],
          [
            'roles_id' => 2,
            'username' => 'chilo',
            'email' => 'chilo@gmail.com',
            'name' => 'chilo is my cat',
            'password' => bcrypt('12345'),
          ],
          //SDO_DAS_DataFactory
          [
            'roles_id' => 1,
            'username' => 'uke',
            'email' => 'uke@gmail.com',
            'name' => 'uke',
            'password' => bcrypt('12345'),
          ],
          [
            'roles_id' => 2,
            'username' => 'maya',
            'email' => 'maya@gmail.com',
            'name' => 'maya',
            'password' => bcrypt('12345'),
          ],
          [
            'roles_id' => 1,
            'username' => 'sobrin',
            'email' => 'sobrin@gmail.com',
            'name' => 'akhirnya dia tau',
            'password' => bcrypt('12345'),
          ],
          // Sini`
          [
            'roles_id' => 1,
            'username' => 'asgar',
            'email' => 'asgar@gmail.com',
            'name' => 'asgar',
            'password' => bcrypt('12345'),
          ],
          [
            'roles_id' => 2,
            'username' => 'sulis',
            'email' => 'sulis@gmail.com',
            'name' => 'sulistia wati',
            'password' => bcrypt('12345'),
          ],
        ]
      );





    }
}
