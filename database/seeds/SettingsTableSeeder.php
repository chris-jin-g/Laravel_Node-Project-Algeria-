<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();
        DB::table('settings')->insert([
            [
                'key' => 'demo_mode',
                'value' => 0
            ],
            [
                'key' => 'help',
                'value' => '<p>Support</p>'
            ],
            [
                'key' => 'page_privacy',
                'value' => '<p></p>'
            ],
            [
                'key' => 'terms',
                'value' => '<p></p>'
            ],
            [
                'key' => 'cancel',
                'value' => '<p></p>'
            ]
        ]);
    }
}
