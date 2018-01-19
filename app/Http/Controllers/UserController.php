<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $users = $users->map(function($data){
            return [
                "kategori" => "user",
                    "id" => $data->id,
                    "name" => $data->name,
                    "username" => $data->username,
                    "email" => $data->email,
                    "address" =>[
                        "street" => $data->street,
                        "suite" => $data->suite,
                        "city" => $data->city,
                        "zipcode" => $data->zipcode,
                            "geo" =>[
                                "lat" => $data->lat,
                                "lng" => $data->lng,
                            ],
                    ],
                    "phone" => $data->phone,
                    "website" => $data->website,
                    "company" => $data->company,
                ];
        });

        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $key = array_keys($id);
        $id = $id [$key[0]];
        $user = User::find($id);
        $user = [
            "kategori" => "user",
            "id" => $user->id,
                    "name" => $user->name,
                    "username" => $user->username,
                    "email" => $user->email,
                    "address" =>[
                        "street" => $user->street,
                        "suite" => $user->suite,
                        "city" => $user->city,
                        "zipcode" => $user->zipcode,
                            "geo" =>[
                                "lat" => $user->lat,
                                "lng" => $user->lng,
                            ],
                    ],
                    "phone" => $user->phone,
                    "website" => $user->website,
                    "company" => $user->company,
                ];

                return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
