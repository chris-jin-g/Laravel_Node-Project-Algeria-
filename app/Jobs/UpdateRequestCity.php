<?php

namespace App\Jobs;

use App\UserRequests;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\LocationService;

class UpdateRequestCity implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        $rides = UserRequests::whereNull('city_id')->orderBy('id','desc')->get();
        $locationService = new LocationService();

        foreach ($rides as $ride) {
            $idCity = $locationService->getByLatLong($ride->d_latitude, $ride->d_longitude);
            UserRequests::find($ride->id)->update(['city_id' => $idCity]);
        }
    }
}
