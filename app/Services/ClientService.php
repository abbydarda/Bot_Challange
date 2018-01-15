<?php
namespace App\Services;

/**
 *
 */
class ClientService
{
  public function client($param)
  {
    $headers = array(
      'Accept'=>'application/json',
      'Content-Type'=>'application/json',
      'Authorization'=>'Bearer 838951d5370a48169574b471c408ebff',// Bisa pakai token masing-masing//
    );
    $query = http_build_query(
      array(
      "v" => 20170712,
      "query" => $param,
      "lang" => "en",
      "sessionId" => "c4485a6c-763d-4e0b-bde5-17dc3247b96a",
      "timezone" => "Asia/Jakarta",
    )
    );
    // dd($query);
    $url = "https://api.dialogflow.com/v1/query?".$query;
    $response = \Requests::get($url,$headers);
    $response = $response->body;
    $response = json_decode($response);
    return $response->result->fulfillment->speech;
  }
}
