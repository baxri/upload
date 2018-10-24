<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;

class BackupControler extends Controller
{
    public function list(Request $request)
    {
        $backups = Upload::all();

        return response()->json($backups);
    }

}
