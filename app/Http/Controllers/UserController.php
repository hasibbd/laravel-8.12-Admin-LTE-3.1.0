<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password)
        ]);
        return response()->json([
            'message' => 'Registration done'
        ],200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function forget(Request $request)
    {
        $token = Str::random(32);
      $st =   User::where('email',$request->email)->update([
            'remember_token' => $token
        ]);
      if ($st){
          (new User)->forceFill([
              'email' => $request->email,
          ])->notify(new PasswordReset($token));
          return response()->json([
              'message' => 'Password reset link is send to your email'
          ],200);
      }else{
          return response()->json([
              'message' => 'No user found'
          ],420);
      }

    }
    public function reset(Request $request)
    {
        $st =  User::find($request->id);
        if ($st){
           User::where('id',$request->id)->update([
                'remember_token' => null,
                'password' => Hash::make($request->password)
            ]);
            return response()->json([
                'message' => 'Password reset successfully'
            ],200);
        }else{
            return response()->json([
                'message' => 'Expired'
            ],4200);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
