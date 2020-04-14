<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stand;

class StandsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:api");
    }

    public function index(Request $request)
    {
        $stands = [];

        if ($request->search && $request->search == true) {
            if ($request->input) {
                $stands = Stand::where("name", "ilike", "%" . $request->input . "%")
                    ->orWhere("description", "ilike", "%" . $request->input . "%")
                    ->orWhere("slogan", "ilike", "%" . $request->input . "%")
                    ->with("fairs")->paginate(5);
            }
            if ($request->stars > 0) {
                $stands = Stand::whereBetween('stars', [floor($request->stars), floor($request->stars) + 0.99])
                    ->with("fairs")->paginate(5);
            }
        } else {
            $stands = Stand::with("fairs")->paginate(5);
        }

        $length_pagination = ceil($stands->total() / $stands->perPage());

        $response = [
            "data" => $stands->items(),
            "pagination" => [
                "length_pagination" => $length_pagination,
                "current_page" => $stands->currentPage(),
                "total" => $stands->total(),
                "per_page" => $stands->perPage(),
                "next_page_url" => $stands->nextPageUrl(),
                "prev_page_url" => $stands->previousPageUrl(),
            ],
        ];

        return $response;
    }
}
