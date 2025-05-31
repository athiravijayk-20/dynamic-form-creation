<?php

namespace App\Http\Controllers;

use App\Models\Chats;
use App\Models\Notifications;
use App\Models\PushNotification;
use App\Models\PushNotificationMsgs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    
  
}
