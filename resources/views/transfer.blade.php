@extends('home')
@section('content')    
<div class="container">
        <h3>Transfer</h3>
        @if (Auth::check())
          <form action="{{ route('store') }}" method="post" >
              @csrf 
              @method('POST')
              <input type="text" id="UID" value="{{old('r_uid')}}"class="" name="r_uid" placeholder="UID">
              <input type="text" id="name" value="{{old('name')}}"class="" name="name" placeholder="Name">
              <input type="number" id="amount" class="" value="{{old('amount')}}" name="amount" placeholder="0.0$">
              <input type="hidden" name="s_uid" value="{{Auth::id()}}">
              <input type="submit" class="" value="Send">
            </form>
        @endif
        
</div>
@endsection