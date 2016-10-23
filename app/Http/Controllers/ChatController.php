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
      $query = Chat::chatHistory()->with('user')->with('lastMessage');

      if ($request->q) {
          $query->where('chats.name', 'LIKE', '%'.$request->q.'%');
      }

      $chatHistory = $query->paginate(10);
      return response()->json($chatHistory);
  }

  /**
   * Create a new chat then display chat information.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $this->validate($request, [
          'name' => 'required',
      ]);

      $chat = new Chat();
      $chat->user_id = Auth::user()->id;
      $chat->name = $request->name;
      $chat->save();

      $newChat = $chat->chatHistory()->first();
      return response()->json(['success' => true, 'data' => $newChat]);
  }
}
