<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Message;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessageController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(Request $request,$chat_id)
  {
     $query=Message::where('chat_id',$chat_id)->with('user');

     if($request->limit){
        $query->take($request->limit);
     }

     return $messages=$query->get();
  }

}
