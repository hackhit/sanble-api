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

    public function index(Request $request)
    {
        $fairs = [];

        if ($request->search && $request->search == true) {
            if ($request->input) {
                $fairs = Fair::where("is_active", "=", true)
                    ->where("name", "ilike", "%" . $request->input . "%")
                    ->orWhere("description", "ilike", "%" . $request->input . "%")
                    ->orWhere("location", "ilike", "%" . $request->input . "%")
                    ->with("photographies")->paginate(5);
            }
            if ($request->type) {
                $fairs = Fair::where("is_active", "=", true)
                    ->where("type", "=", $request->type)
                    ->with("photographies")->paginate(5);
            }
            if ($request->stars > 0) {
                $fairs = Fair::where("is_active", "=", true)
                    ->whereBetween('stars', [floor($request->stars), floor($request->stars) + 0.99])
                    ->with("photographies")->paginate(5);
            }
        } else {
            $fairs = Fair::where("is_active", "=", true)->with("photographies")->paginate(5);
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
