<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;

function d($str)
{
    echo '<pre>';
    print_r($str);
    echo '</pre>';
    die;
}

class BackupControler extends Controller
{
    public function list(Request $request)
    {
        $backups = Upload::where('parent_id', null)->orderBy('id', 'desc')->get();
        return response()->json($backups);
    }

    public function realm(Request $request)
    {
        $url = $request->input('url');
//        $url = 'http://178.128.246.80:8080?document=Controle&realm_path=../haccp/public/uploads/375a3892440333de-1537388138/haccp-db-8.realm';
        $url = base64_decode($url);
        $output = file_get_contents($url);
        return $output;
    }

}
