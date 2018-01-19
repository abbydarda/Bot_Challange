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
        return "hello, what can i do for you?";
      }else {
        $response = $client->client($command);
        $x = preg_match_all('/\./',$response->action);
        if ($response->action=="input.unknown") {
          return "Maaf kata yang dimasukan salah";
        }elseif ($x==2) {
          return $response->fulfillment->speech;
        }elseif ($x==1) {
          // set controler dan method
          [$controller, $method] = explode('.',$response->action);
          $controller = $this->setController($controller);
          $param = $response->parameters;
          $a = [];

          if ($response->actionIncomplete==true) {
            return $response->fulfillment->speech;
          }

          foreach ($param as $key => $value) {
            $a[$key] = $value;
          }
          // dd($a);
          $response = $controller->$method($a);
          return $response;

          // set controller dan method
        }
        return "Maaf kata yang dimasukan salah";
      }

    }

    public function setController($param)
    {
      $controller = "App\Http\Controllers\\".$param."Controller";
      $controller = new $controller;
      return $controller;
    }
}
