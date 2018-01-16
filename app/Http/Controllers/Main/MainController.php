<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ClientService;

class MainController extends Controller
{
    public function index(ClientService $client,$command)
    {
      $response = $client->client($command);

      // set controler dan method
      [$controller, $method] = explode('.',$response->action);
      $param = $response->parameters;
      foreach ($param as $key => $value) {
        $param = [
          "param"=>$response->parameters->$key,
        ];
        $param = $param['param'];
      }
      $controller = $this->setController($controller);
      $response = $controller->$method($param);
      return $response;
      // set controller dan method
    }

    public function setController($param)
    {
      $controller = "App\Http\Controllers\\".$param."Controller";
      $controller = new $controller;
      return $controller;
    }
}
