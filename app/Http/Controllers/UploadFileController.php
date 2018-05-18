<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function upload(Request $request)
    {
        $dbfile = $request->file('dbfile');
        $device = $request->header('haccp-device');

        if(empty($device)){
            return;
        }

        $filename = $device.'-'.time().'.realm';

        Upload::create([
            'device' => $device,
            'filename' => $filename,
        ]);

        $destinationPath = 'uploads';
        $dbfile->move($destinationPath, $filename);
    }
}
