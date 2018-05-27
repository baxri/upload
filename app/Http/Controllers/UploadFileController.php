<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{
    public function upload(Request $request)
    {
        $dbfiles = $request->file('dbfile');
        $device = $request->header('haccp-device');
        $bundle = $device.'-'.time();

        if (empty($device) || empty($bundle) || empty($dbfiles)) {
            return;
        }

        $path = public_path().'/uploads/'.$bundle;
        File::makeDirectory($path, $mode = 0777, true, true);

        foreach ($dbfiles as $dbfile) {
            $ext = $dbfile->extension();
            $filename = $dbfile->getClientOriginalName();

            if($ext == 'realm'){
                Upload::create(['device' => $device, 'filename' => $filename,]);
            }else{
                Upload::create(['device' => $device, 'filename' => $filename,]);
            }

            $dbfile->move($path, $filename);
        }
    }
}
