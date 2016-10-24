<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\Message;
use Auth;
use \App\Custom\Pagination\Presenter;

class ChatController extends Controller
{
    /**
   * Display a listing of chats with last chat message.
   *
   * @return Response
   */
  public function index(Request $request)
  {
      $query = Chat::chatHistory()->with('lastMessage')->with('user');

      if ($request->q) {
          $query->where('chats.name', 'LIKE', '%'.$request->q.'%');
      }

      $query=collect($query->get());
      $chatHistory = $query->toArray();

      $paginate = 25;
      $page = $request->page;

      $offSet = ($page * $paginate) - $paginate;
      $itemsForCurrentPage = array_slice($chatHistory, $offSet, $paginate, true);

      $result = new Presenter($itemsForCurrentPage, count($chatHistory), $paginate, $page);

      return response()->json($result);
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

      $newChat = Chat::chatHistory()->where('id',$chat->id)->get();
      return response()->json(['success' => true, 'data' => $newChat]);
  }
}
