<?php

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->truncate();

        \DB::table('users')->insert(array(
            0 =>
                array(
                    'id' => 4,
                    'username' => 'Test',
                    'role_id' => 0,
                    'email' => 'juergen.berg@gmail.com',
                    'password' => '$2y$10$Ifsru8qdYP.6q0afg1kSPOv7au2MI55Gsfq0rk7K56tOk/4bIhp3e',
                    'confirmation_code' => 'c27c30113d121dbb96bfe3b35f462bac',
                    'confirmed' => 1,
                    'remember_token' => '',
                    'last_login' => '0000-00-00 00:00:00',
                    'settings' => '',
                    'created_at' => '2014-06-11 11:43:21',
                    'updated_at' => '2014-06-11 11:43:21',
                ),
        ));
    }

}
