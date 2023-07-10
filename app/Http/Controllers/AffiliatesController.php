<?php

namespace App\Http\Controllers;

use App\Actions\GetAffiliatesAction;
use Illuminate\View\View;

class AffiliatesController extends Controller
{
    public function show(GetAffiliatesAction $affiliates): View
    {
        return view('affiliates', ['affiliates' => $affiliates()]);
    }
}
