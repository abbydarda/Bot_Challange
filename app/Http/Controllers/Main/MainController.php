<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ClientService;

class MainController extends Controller
{
    public function index(ClientService $client,$command=null)
    {
      if (!$command) {
        return [
          'kategori'=>'salam',
          'data'=>[
            'body'=>'Hello!, What can I do for you?'
          ]
        ];
      }else {
        $response = $client->client($command);
        $x = preg_match_all('/\./',$response->action);
        if ($response->action=="input.unknown") {
          return [
            'kategori'=>'error',
            'data'=>[
              'body'=>'Sorry, Your keyword is wrong'
            ]
          ];
        }elseif ($x==2) {
          return [
            'kategori'=>'salam',
            'data'=>[
              'body'=>$response->fulfillment->speech
            ]
          ];
        }elseif ($x==1) {
          // set controler dan method
          [$controller, $method] = explode('.',$response->action);
          $controller = $this->setController($controller);
          $param = $response->parameters;
          $a = [];

          if ($response->actionIncomplete==true) {
            return [
              'kategori'=>'pertanyaan',
              'data'=>[
                'body'=>$response->fulfillment->speech
              ]
            ];
          }

          foreach ($param as $key => $value) {
            $a[$key] = $value;
          }
          // dd($a);
          $response = $controller->$method($a);
          return $response;

          // set controller dan method
        }
        return [
          'kategori'=>'error',
          'data'=>[
            'body'=>'Sorry, Your keyword is wrong'
          ]
        ];
      }

    }

    public function setController($param)
    {
      $controller = "App\Http\Controllers\\".$param."Controller";
      $controller = new $controller;
      return $controller;
    }
}
