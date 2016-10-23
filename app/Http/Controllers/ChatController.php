<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\Message;
use Auth;

class ChatController extends Controller
{
    /**
   * Display a listing of chats with last chat message.
   *
   * @return Response
   */
  public function index(Request $request)
  {
<<<<<<< HEAD
      $query = Chat::with('user')->with('lastMessage');
=======
      $query = Chat::chatHistory();
>>>>>>> More

      if ($request->q) {
          $query->where('chats.name', 'LIKE', '%'.$request->q.'%');
      }

      $chatHistory = $query->simplePaginate(10);

      return response()->json(['success' => true, 'data' => $chatHistory])
        ->header('Content-Type', 'application/json; charset=utf-8');

  }

  /**
   * Create a new chat then display chat information.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $chat = new Chat();
      $chat->user_id = Auth::user()->id;
      $chat->name = $request->name;

      $chat->save($request->all());

      $chat = Chat::where('id',$chat->id)->with('user')->with('lastMessage')
          ->get();
      return response()->json(['success' => true, 'data' => $chat]);
  }
}
