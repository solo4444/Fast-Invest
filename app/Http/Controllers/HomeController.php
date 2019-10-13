<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TransactionRequest;
use Illuminate\Support\Facades\Auth;

use App\User;

use App\Transaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }
    public function contact()
    {
        return view('contact');
    }
    public function transfer(){
        return view('transfer');
    }
    // public function transactions(TransactionRequest $request, $id){
    //     $request->session()->reflash();
    //     $user = User::findOrFail($id);
    //     dd($user);
    //     return view('transactionHistory', [
    //     'sent_transactions' => Transaction::where('s_user',  $user->uid), 
    //     'recieved_transactions' => Transaction::where('r_user', $user->uid)
    //     ]);
    // }
    public function account(){
        $user = User::findOrFail(Auth::id());
        return view('account')->with('user', $user);
    }
}
