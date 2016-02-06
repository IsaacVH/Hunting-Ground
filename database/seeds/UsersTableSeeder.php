<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$admin_users = [
    		"isaac" => [
    			'id' => 1,
    			'name' => 'Isaac Van Houten',
    			'email' => 'isaac.vanh@gmail.com',
    			'password' => bcrypt('the1saacvh'),
    			'created_at' => date('Y-m-d H:i:s'),
    			'updated_at' => date('Y-m-d H:i:s')
    		],
    		"aaron" => [
    			'id' => 2,
    			'name' => 'Aaron Retter',
    			'email' => 'retteramj@gmail.com',
    			'password' => bcrypt('retter'),
    			'created_at' => date('Y-m-d H:i:s'),
    			'updated_at' => date('Y-m-d H:i:s')
    		]
    	];

    	$this->command->info('Seeding Admin users...');
    	foreach ($admin_users as $current_user) {
    		$existing_user = DB::table('users')->where('id', $current_user['id']);
    		if($existing_user->count() > 0) {
    			$existing_user->update($current_user);
    		} else {
    			DB::table('users')->insert($current_user);
    		}
    	}
    	
    }
}
