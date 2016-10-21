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

class ChatController extends Controller {

  /**
   * Display a listing of chats with last chat message.
   *
   * @return Response
   */
  public function index()
  {
      $chatHistory = Chat::where('user_id',Auth::user()->id)
          ->with('user')
          ->with('lastMessage')
          ->paginate(10);

      return response()->json(['success'=>true,'data'=>$chatHistory]);

  }

  /**
   * Display a listing of chats with last chat message.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $chat= new Chat;
      $chat->user_id=Auth::user()->id;
      $chat->save($request->all());
  }
}
