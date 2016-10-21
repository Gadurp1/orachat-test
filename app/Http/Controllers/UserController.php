<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Chat;
use App\Message;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Auth;

class UserController extends Controller {

  /**
   * Display a listing of chats with last chat message.
   *
   * @return Response
   */
  public function index()
  {
      $user=Auth::user()->toArray();
      $token= JWTAuth::getToken();
      $token = array('token'=>''.$token.'');
      $result=array_merge($user,$token);

      return response()->json(['success'=>true,'data'=>$result]);
  }

  /**
   * Display a listing of chats with last chat message.
   *
   * @return Response
   */
  public function store(Request $request)
  {

  }

  /**
   * Display a listing of chats with last chat message.
   *
   * @return Response
   */
  public function update(Request $request)
  {
      $user= Auth::user()->response;
      $user->update($request->all());
      $token= JWTAuth::getToken();
      $token = array('token'=>''.$token.'');

      $userData=array_merge($user->toArray(),$token);

      return response()->json(['success'=>true,'data'=>$userData]);
  }
}
