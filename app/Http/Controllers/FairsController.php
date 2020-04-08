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
        $fairs = Fair::where("is_active", "=", true)->with("reviews")->with("photographies")->paginate(5);

        for ($i = 0; $i < count($fairs->items()); $i++) {
            $totalStars = 0;
            $stars = 0;
            if (count($fairs->items()[$i]->reviews) > 0) {
                for ($j = 0; $j < count($fairs->items()[$i]->reviews); $j++) {
                    $totalStars = $totalStars + $fairs->items()[$i]->reviews[$j]->start;
                }
                $stars = round($totalStars / count($fairs->items()[$i]->reviews), 2);
            }
            $fairs->items()[$i]->stars = $stars;
        }

        $length_pagination = ceil($fairs->total() / $fairs->perPage());

        $response = [
            "data" => $fairs->items(),
            "pagination" => [
                "length_pagination" => $length_pagination,
                "current_page" => $fairs->currentPage(),
                "total" => $fairs->total(),
                "per_page" => $fairs->perPage(),
                "next_page_url" => $fairs->nextPageUrl(),
                "prev_page_url" => $fairs->previousPageUrl(),
            ],
        ];

        return $response;
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
