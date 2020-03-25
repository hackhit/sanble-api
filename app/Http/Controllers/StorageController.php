<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    function getAvatar($file)
    {
        $public_path = public_path();
        $url = $public_path . '/storage/avatars/' . $file;

        if (Storage::exists($file)) {
            return response()->download($url);
        }

        abort(404);
    }
}
