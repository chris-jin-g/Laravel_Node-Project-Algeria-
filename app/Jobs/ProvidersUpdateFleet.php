<?php

namespace App\Jobs;

use App\Fleet;
use App\Provider;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class ProvidersUpdateFleet implements ShouldQueue
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
     */
    public function handle()
    {
        $fleets = Fleet::all();

        foreach ($fleets as $fleet) {

            Provider::where('city_id','=',$fleet->city->id)
                ->update(['fleet' => $fleet->id]);
        }
    }
}
