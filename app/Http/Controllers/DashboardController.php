<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function all(Request $request)
    {
        $backups = Upload::all();
        return response()->json($backups);
    }
}
