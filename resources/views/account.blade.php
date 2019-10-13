@extends('home')
@section('content')    
<div class="container">
    <h1>Account</h1>
    <div class="row">
        <div class="col-md-4">
            <h2>Account holder name: {{$user->name}}</h2>
        </div>
        <div class="col-md-4">
            <h2>Account UID: {{$user->uid}}</h2>
        </div>
        <div class="col-md-4">
            <h2>Account money: {{$user->money}}$</h2>
        </div>
    </div>
</div>

@endsection