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
        $images = $request->file('images');
        $realm = $request->file('realm');
        $device = $request->header('haccp-device');
        $bundle = $device . '-' . time();

        if (empty($realm) || empty($device) || empty($bundle) || empty($images)) {
            return;
        }

        $path = public_path() . '/uploads/' . $bundle;
        File::makeDirectory($path, $mode = 0777, true, true);

        $filename = $realm->getClientOriginalName();
        $realmBackup = Upload::create(['device' => $device, 'filename' => $filename, 'bundle' => $bundle]);
        $realm->move($path, $filename);

        foreach ($images as $image) {
            $filename = $image->getClientOriginalName();
            Upload::create(['parent_id' => $realmBackup->id, 'device' => $device, 'filename' => $filename, 'bundle' => $bundle]);
            $image->move($path, $filename);
        }
    }
}
