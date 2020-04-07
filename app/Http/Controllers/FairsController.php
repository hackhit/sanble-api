<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fair;

class FairsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:api");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fairs = Fair::where("is_active", "=", true)->with("reviews")->get()->map(function ($fair) {
            $totalStars = 0;

            for ($i = 0; $i < count($fair->reviews); $i++) {
                $totalStars = $totalStars + $fair->reviews[$i]->start;
            }

            return [
                "uuid" => $fair->uuid,
                "name" => $fair->name,
                "description" => $fair->description,
                "email" => $fair->email,
                "phone" => $fair->phone,
                "is_active" => $fair->is_active,
                "location" => $fair->location,
                "lat" => $fair->lat,
                "long" => $fair->long,
                "start_date" => $fair->start_date,
                "end_date" => $fair->end_date,
                "created_at" => $fair->created_at,
                "updated_at" => $fair->updated_at,
                "stars" => round($totalStars / count($fair->reviews), 2),
            ];
        });
        return $fairs;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
