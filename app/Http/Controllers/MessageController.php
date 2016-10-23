<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Message;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Auth;

class MessageController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(Request $request,$chat_id)
  {
      $query = Message::messageHistory()->where('chat_id',$chat_id);

      // Check for search parameter
      if($request->limit){
        $query->take($request->limit);
      }

      $messageHistory = $query->paginate(10);
      
      return response()->json(['success' => true, 'data' => $messageHistory])
          ->header('Content-Type', 'application/json; charset=utf-8');

  }

  /**
   * Create a new chat message.
   *
   * @return Response
   */
  public function store(Request $request,$chat_id)
  {
      $this->validate($request, [
          'message' => 'required',
        ]);

      // Create new message
      $message = new Message;
      $message->user_id=Auth::user()->id;
      $message->chat_id = $chat_id;
      $message->message = $request->message;
      $message->save();

      // Create new message
      $newMessage = $message->where('chat_id',$chat_id)->messageHistory()->first();

      return response()->json(['success' => true, 'data' => $newMessage])
          ->header('Content-Type', 'application/json; charset=utf-8');
  }

}
