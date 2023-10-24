<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\Order;
use App\Events\MessageSent;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MessageController extends Controller
{

  public function create(Request $request)
  {
      $user = User::find($request->user_id);
      $order = Order::find($request->order_id);

      $conversation = Chat::createConversation([$user, $order]);

      $message = Chat::message($request->message_content)
          ->from($user)
          ->to($conversation)
          ->send();

      return redirect()->route('messages.create', ['id' => $conversation->id]);
  }



  public function store(Request $request)
  {
      $validatedData = $request->validate([
          'order_id'=>'required',
          'sender_id' => 'required',
          'receiver_id' => 'required',
          'message_content' => 'required|string',
          'timestamp' => now(),
      ]);
      $message = new Message([
          'order_id' => $validatedData['order_id'],
          'sender_id' => $validatedData['sender_id'],
          'receiver_id' => $validatedData['receiver_id'],
          'message_content' => $validatedData['message_content'],
          'timestamp' => now(),
      ]);
      $message->save();

      event(new MessageSent($message));

      return back()->with('success', 'Message sent successfully');
  }


}
