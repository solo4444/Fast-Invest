@extends('home')
@section('content')
    <div class="container">
        <h1>Transaction history</h1>
        @yield('transaction_cards')
        <div class="row">
         <div class="col-md-6">
        <h2>Sent transactions</h2>
      
        @foreach ($sent_transactions as $stransaction)
        <div class="card w-100">
            <h4 class="card-title ml-2 mt-3">to:{{$stransaction->r_name}}</h3>
            <p class="card-text  ml-2">from:{{$stransaction->s_name}}<p>
            <p class="card-text ml-2">on:{{$stransaction->added_on}}<p>
            <h5 class="card-title ml-2">amount:  {{$stransaction->amount}}$</h5>
        </div>
        
        @endforeach
        </div> 
        <div class="col-md-6">
        <h2>Recieved transactions</h2>
        @foreach ($recieved_transactions as $rtransaction)
        <div class="card w-100">
                <h4 class="card-title ml-2 mt-3">From:{{$rtransaction->s_name}}</h3>
                <p class="card-text  ml-2">to:{{$rtransaction->r_name}}<p>
                <p class="card-text ml-2">on:{{$rtransaction->added_on}}<p>
                <h5 class="card-title ml-2">amount:  {{$rtransaction->amount}}$</h5>
            </div>
        @endforeach
    </div>
    </div>
</div>
@endsection