<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $messages = Message::where('user_id_to', Auth::id())->notDelete()->get();
        // dd($messages);
        return view('home')->with('messages', $messages);
    }

    public function create(int $id = 0, string $subject = ''){
        if ($id === 0) {
            $users = User::where('id', '!=', Auth::id())->get();
        } else {
            $users = User::where('id', $id)->get();
        }

        if ($subject !== '') $subject = 'Re: ' . $subject;

        return view('create')->with(['users' => $users, 'subject' => $subject]);
    }

    public function send(Request $request) {
        $request->validate([
            'to'      => 'required',
            'subject' => 'required',
            'body'    => 'required'
        ]);

        $message = new Message();
        $message->user_id_from = Auth::id();
        $message->user_id_to   = $request->input('to');
        $message->subject      = $request->input('subject');
        $message->body         = $request->input('body');
        $message->save();

        return redirect('/');
    }

    public function sent() {
        $messages = Message::where('user_id_from', Auth::id())->get();
        return view('sent')->with('messages', $messages);
    }

    public function read(int $id) {
        $message = Message::with('userFrom')->find($id);
        $message->read = true;
        $message->save();

        return view('read')->with('message', $message);
    }

    public function delete($id) {
        $message = Message::find($id);
        $message->delete = true;
        $message->save();

        return redirect('/home');
    }

    public function deleted() {
        $messages = Message::where('user_id_to', Auth::id())->deleted()->get();

        return view('deleted')->with('messages', $messages);
    }

    public function return($id) {
        $message = Message::find($id);
        $message->delete = false;
        $message->save();

        return redirect('/home');
    }
     
}
