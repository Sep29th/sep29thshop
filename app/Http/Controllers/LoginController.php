<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function userLogin(Request $request)
    {
        $phone_number = $request->phone_number;
        $password = $request->password;
        $remember = $request->remember;
        $user = User::where('phone_number', $phone_number)->first();
        if ($user == null) {
            return response()->json([
                'message' => 'This account does not exist.',
            ]);
        } else if ($user->password != $password) {
            return response()->json([
                'message' => 'Wrong password !',
            ]);
        } else {
            if ($remember) {
                $response = new Response('Remember');
                $response->withCookie(cookie('user_id', $user->id, 259200));
                session(['user_id' => $user->id]);
                return $response;
            }
            session(['user_id' => $user->id]);
        }
    }
    public function userRegis(Request $request)
    {
        $phone_number = $request->phone_number;
        $password = $request->password;
        $repass = $request->repass;
        $user = User::where('phone_number', $phone_number)->first();
        if ($user != null) {
            return response()->json([
                'message' => 'The phone number is already registered !',
            ]);
        } else if ($password != $repass) {
            return response()->json([
                'message' => 'The password are not the same !',
            ]);
        } else {
            DB::insert('insert into users(name, date_of_birth, address, phone_number, password) values(?, ?, ?, ?, ?)', [$request->name, $request->date_of_birth, $request->address, $phone_number, $password]);
            $response = new Response('Remember');
            $user = User::where('phone_number', $phone_number)->first();
            $response->withCookie(cookie('user_id', $user->id, 259200));
            session(['user_id' => $user->id]);
            return $response;
        }
        // if ($user == null) {
        //     return response()->json([
        //         'message' => 'This account does not exist',
        //     ]);
        // } else if ($user->password != $password) {
        //     return response()->json([
        //         'message' => 'Wrong password',
        //     ]);
        // } else {
        //     if ($remember) {
        //         $response = new Response('Remember');
        //         $response->withCookie(cookie('user_id', $user->id, 259200));
        //         session(['user_id' => $user->id]);
        //         return $response;
        //     }
        //     session(['user_id' => $user->id]);
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
