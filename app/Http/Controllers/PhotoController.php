<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index(){
        $photos = Photo::all();
        $photos = $photos->map(function($data){
            return [
                "kategori" => "photo",
                "albumId" => $data->albumId,
                "id" => $data->id,
                "title" => $data->title,
                "url" => $data->url,
                "thumbnailUrl" => $data->thumbnailUrl,
            ];
        });
        return $photos;
    }

    public function show($id){
        $photo = Photo::find($id);
        $photo = [
            "kategori" => "photo",
            "albumId" => $data->albumId,
            "id" => $data->id,
            "title" => $data->title,
            "url" => $data->url,
            "thumbnailUrl" => $data->thumbnailUrl,
        ];
        return $photo;
    }
}
