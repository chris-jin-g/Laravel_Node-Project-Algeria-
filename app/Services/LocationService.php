<?php
/**
 * Created by PhpStorm.
 * User: Neto
 * Date: 17/05/2019
 * Time: 15:47
 */

namespace App\Services;

use GuzzleHttp\Client;
use App\City;
use App\State;
use Log;

class LocationService
{

    private $client;
    const RESULT_NOT_FOUND = 'result_not_found';

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getByLatLong($latitude, $longitude)
    {
        $geocode = $this->geocode($latitude, $longitude);
        
        $State = State::where("letter", $geocode['state'])->first();
        $City = City::where("title", $geocode['city'])->where("state_id", $State->id)->first();
        
        return $City->id;
    }
    
    public function geocode($lat, $long){
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng={$lat},{$long}&key=" . config('constants.map_key');
        $content = file_get_contents($url);
        $location = [];

        if ($content) {
            $result = json_decode(file_get_contents($url), true);

            if ($result['status'] === 'OK') {
                foreach ($result['results'][0]['address_components'] as $component) {
                    switch ($component['types']) {
                        case in_array('administrative_area_level_2', $component['types']):
                            $location['city'] = $component['long_name'];
                            break;
                        case in_array('administrative_area_level_1', $component['types']):
                            $location['state'] = $component['short_name'];
                            break;
                        case in_array('country', $component['types']):
                            $location['country'] = $component['long_name'];
                            break;
                    }
                }
            }
        }

        return $location;
    }

}
