@extends('layout')
@section('layouto')
    
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h2 class="my-0 mr-md-auto font-weight-normal">Accounts and money transfers application</h2>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ route('home') }}">Home</a>
            <a class="p-2 text-dark" href="{{ route('contact') }}">Contact</a>
            <a class="p-2 text-dark" href="{{ route('transfer') }}">Make transfer</a>
            <a class="p-2 text-dark" href="{{ route('show',['id'=> Auth::id()]) }}">Transfer history</a>
            <a class="p-2 text-dark" href="{{ route('account') }}">Account</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
        </nav>
    </div>
    <div class="container">
        
        @if (session()->has('status'))
        <p style="color: green">
            {{ session()->get('status')}}
        </p>
            
        @endif
    @yield('content')
    </div>
@endsection
