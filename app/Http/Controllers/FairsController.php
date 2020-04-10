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
    public function index(Request $request)
    {
        $fairs = [];

        if ($request->search && $request->search == true) {
            if ($request->input) {
                $fairs = Fair::where("is_active", "=", true)
                    ->where("name", "like", "%" . $request->input . "%")
                    ->orWhere("description", "like", "%" . $request->input . "%")
                    ->orWhere("location", "like", "%" . $request->input . "%")
                    ->with("reviews")->with("photographies")->paginate(5);
            }
            if ($request->type) {
                $fairs = Fair::where("is_active", "=", true)
                    ->where("type", "=", $request->type)
                    ->with("reviews")->with("photographies")->paginate(5);
            }
        } else {
            $fairs = Fair::where("is_active", "=", true)->with("reviews")->with("photographies")->paginate(5);
        }

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
}
