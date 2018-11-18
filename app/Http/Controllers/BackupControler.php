<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;

class BackupControler extends Controller
{
    public function list(Request $request)
    {
        $backups = Upload::where('parent_id', null)->orderBy('id', 'desc')->get();
        return response()->json($backups);
    }

}
