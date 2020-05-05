<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->truncate();
        DB::table('promocodes')->truncate();
        DB::table('promocode_usages')->truncate();
        DB::table('provider_devices')->truncate();
        DB::table('provider_documents')->truncate();
        DB::table('provider_profiles')->truncate();
        DB::table('provider_services')->truncate();
        DB::table('provider_cards')->truncate();
        DB::table('provider_wallet')->truncate();
        DB::table('request_filters')->truncate();
        DB::table('request_waiting_time')->truncate();
        DB::table('user_request_payments')->truncate();
        DB::table('user_request_ratings')->truncate();
        DB::table('user_requests')->truncate();
        DB::table('user_wallet')->truncate();
        DB::table('user_request_disputes')->truncate();
        DB::table('user_request_lost_items')->truncate();
        DB::table('custom_pushes')->truncate();
        DB::table('favourite_locations')->truncate();
        DB::table('payment_logs')->truncate();
        DB::table('payu_payments')->truncate();
        DB::table('peak_hours')->truncate();
        DB::table('referral_earnings')->truncate();
        DB::table('referral_histroy')->truncate();
        DB::table('users')->truncate();
        DB::table('users')->insert([[
            'first_name' => 'User',
            'last_name' => 'Demo',
            'email' => 'User@demo.com',
            'password' => bcrypt('123456'),
            'country_code' => '+73',
            'mobile' => '998020787',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'picture' => 'http://lorempixel.com/512/512/business/Moob',
        ]]);

        DB::table('providers')->truncate();
        DB::table('providers')->insert([[
            'first_name' => 'Driver',
            'last_name' => 'Demo',
            'email' => 'driver@demo.com',
            'password' => bcrypt('123456'),
            'country_code' => '+73',
            'mobile' => '998020787',
            'status' => 'approved',
            'latitude' => '-17.5460868',
            'longitude' => '-39.7394917',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'avatar' => 'http://lorempixel.com/512/512/business/Moob',
        ]]);

        DB::table('provider_services')->truncate();
        DB::table('provider_services')->insert([[
            'provider_id' => 1,
            'service_type_id' => 1,
            'status' => 'active',
            'service_number' => 'jss-0987',
            'service_model' => 'Siena Fire',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]]);
    }
}