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
                'value' => '<p>Suporte</p>'
            ],
            [
                'key' => 'page_privacy',
                'value' => '<p>Política de Privacidade</p>'
            ],
            [
                'key' => 'terms',
                'value' => '<p>Termos e Condições</p>'
            ],
            [
                'key' => 'cancel',
                'value' => '<p>Política de Cancelamento</p>'
            ]
        ]);
    }
}
