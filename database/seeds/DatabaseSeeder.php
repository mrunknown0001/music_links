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
        DB::table('genres')->insert([
        		[
        			'name' => 'Rock',
        			'description' => 'Rock and Roll',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'Alternative',
        			'description' => 'Althernative Musics',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'Blues',
        			'description' => 'Blues Musics',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'Classical',
        			'description' => 'Classical Musics',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'Comedy',
        			'description' => 'Comedy Music',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'Country',
        			'description' => 'Country Music',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'Electronic',
        			'description' => 'Electronic Music',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'Folk',
        			'description' => 'Folk Music',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'Holiday',
        			'description' => 'Holiday Music',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'International',
        			'description' => 'International Music',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'Jazz',
        			'description' => 'Jazz Music',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'Latin',
        			'description' => 'Latin Music',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'New Age',
        			'description' => 'New Age Music',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'Pop',
        			'description' => 'Pop Music',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'R&B',
        			'description' => 'Rhthm and Blues Music',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'Rap',
        			'description' => 'Rap Music',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'Reggea',
        			'description' => 'Reggea Music',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'Religious',
        			'description' => 'Religious Music',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'Stage',
        			'description' => 'Stage Music',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'Vocal',
        			'description' => 'Vocal Music',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		],
        		[
        			'name' => 'Other',
        			'description' => 'Other Genre of Music',
        			'created_at' => date("Y-m-d H:i:s"),
        			'updated_at' => date("Y-m-d H:i:s")
        		]
        	]);

    }
}
