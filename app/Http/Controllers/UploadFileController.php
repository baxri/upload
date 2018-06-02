<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UploadFileController extends Controller
{
    public function upload(Request $request)
    {
        $images = $request->file('images');
        $realm = $request->file('realm');
        $device = $request->header('haccp-device');
        $name = $request->header('name');
        $bundle = $device . '-' . time();

        if (empty($realm) || empty($device) || empty($bundle)) {
            return;
        }

        $path = public_path() . '/uploads/' . $bundle;
        File::makeDirectory($path, $mode = 0777, true, true);

        $filename = $realm->getClientOriginalName();
        $realmBackup = Upload::create(['device' => $device, 'filename' => $filename, 'bundle' => $bundle, 'name' => $name]);
        $realm->move($path, $filename);

        if(!empty($images)){
            foreach ($images as $image) {
                $filename = $image->getClientOriginalName();
                Upload::create(['parent_id' => $realmBackup->id, 'device' => $device, 'filename' => $filename, 'bundle' => $bundle, 'name' => $name]);
                $image->move($path, $filename);
            }
        }
    }
}
