<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TransactionRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\User;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //	25364260005
    public function store(Request $request)
    {
        $suser = User::findOrFail($request->s_uid);
        $ruser = User::where('uid',$request->r_uid)->first();
        
        // $validateData = $request->validated();

        // $transaction = Transaction::create($validateData);
        
        if($ruser!=null){
        if($ruser->name!=$request->name){
            $request->session()->flash('status', 'This Account Holder Name does not exsist!');
            return redirect()->route('transfer');
        }
        else if($suser->money - $request->amount > 0 ){
        $transaction = new Transaction();
        $transaction->r_uid = $request->r_uid;
        $transaction->r_name = $ruser->name;
        $transaction->s_uid = $suser->uid;
        $transaction->s_name = $suser->name;
        $transaction->amount = $request->amount;
        $transaction->save();
        $suser->money = $suser->money-$request->amount;
        $ruser->money = $ruser->money+$request->amount;
        $suser->save();
        $ruser->save();
        $request->session()->flash('status', 'Transaction was made!');
        return redirect()->route('transfer');
        }
        else{
            $request->session()->flash('status', 'Insuficient funds!');
            return redirect()->route('transfer');
        }
    }
    else{
        $request->session()->flash('status', 'This user does not exist!');
            return redirect()->route('transfer');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        //$request->session()->reflash();
        $user = User::findOrFail(Auth::id());
        $susert=Transaction::all()->where('s_uid', $user->uid);
        $rusert =Transaction::all()->where('r_uid', $user->uid);

        return view('transactionHistory')->with(
                'sent_transactions' , $susert)->with(
                'recieved_transactions' , $rusert);
        
    }
}
