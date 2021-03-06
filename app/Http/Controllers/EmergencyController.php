<?php

namespace App\Http\Controllers;

use App\Models\Emergency;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Emergency::create($request->all());
    }

}
