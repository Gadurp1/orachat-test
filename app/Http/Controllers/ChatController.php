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
      $query = Chat::where('user_id', Auth::user()->id)
          ->with('user')
          ->with('lastMessage');

      if ($request->q) {
          $query->where('chats.name', 'LIKE', '%'.$request->q.'%');
      }

      $chatHistory = $query->simplePaginate(10);

      return response()->json(['success' => true, 'data' => $chatHistory]);
  }

  /**
   * Display a listing of chats with last chat message.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $chat = new Chat();
      $chat->user_id = Auth::user()->id;
      $chat->save($request->all());
  }
}
