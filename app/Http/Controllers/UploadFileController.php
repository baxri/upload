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
        $admin_password = $request->header('admin-password', '');
        $name = $request->header('name');
        $bundle = $device . '-' . time();

        if (empty($realm) || empty($device)) {
            exit('Some parameters are missing');
        }

        $path = public_path() . '/uploads/' . $bundle;
        File::makeDirectory($path, $mode = 0777, true, true);

        $filename = $realm->getClientOriginalName();
        $realmBackup = Upload::create(['device' => $device, 'filename' => $filename, 'admin_password' => $admin_password, 'bundle' => $bundle, 'name' => $name]);
        $realm->move($path, $filename);

        if (!empty($images)) {
            foreach ($images as $image) {
                $filename = $image->getClientOriginalName();
                Upload::create(['parent_id' => $realmBackup->id, 'device' => $device, 'filename' => $filename, 'bundle' => $bundle, 'name' => $name]);
                $image->move($path, $filename);
            }
        }

        exit('200');
    }

    public function uploadZip(Request $request)
    {
        $zip = $request->file('zip');
        $device = $request->header('haccp-device');
        $name = $request->header('name');
        $bundle = $device . '-' . time();

        if (empty($zip)) {
            exit('Some parameters are missing');
        }

        $path = public_path() . '/zips/';
        File::makeDirectory($path, $mode = 0777, true, true);

        $filename = $zip->getClientOriginalName();
        // $realmBackup = Upload::create(['device' => $device, 'filename' => $filename, 'bundle' => $bundle, 'name' => $name]);
        $zip->move($path, $bundle . '.zip');


        exit('Uploaded Successfully Completed!');
    }
}
