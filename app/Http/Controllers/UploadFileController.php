<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function upload(Request $request)
    {
        $dbfile = $request->file('dbfile');
        $device = $request->header('haccp-device');
        $destinationPath = 'uploads';
        $dbfile->move($destinationPath, $device.'.realm');
        
    }
}
