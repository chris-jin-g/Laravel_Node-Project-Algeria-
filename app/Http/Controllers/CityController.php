<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private $stateModel;

    public function __construct(State $state)
    {
        $this->stateModel = $state;
    }

    public function getCities($stateId)
    {
        $state = $this->stateModel->find($stateId);
        $cities = $state->cities()->getQuery()->get(['id', 'title']);
        return response()->json($cities);
    }
}
