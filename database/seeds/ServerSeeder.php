<?php

use Illuminate\Database\Seeder;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servers = [
            [
                'email' => 'raheelwp@gmail.com',
                'slack_token' => 'token',
                'slack_channel' => '#devops',
                'slack_user' => 'bot'
            ]
        ];

        foreach ($servers as $server) {
            DB::table('servers')->insert([
                'email' => $server['email'],
                'slack_token' => $server['slack_token'],
                'slack_channel' => $server['slack_channel'],
                'slack_user' => $server['slack_user'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
