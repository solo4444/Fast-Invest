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
              <input type="hidden" name="s_uid" value="{{Auth::id()}}">
              <div class="input-group mb-3 row">
                  <div class="input-group-prepend col-md-2">
                    <span class="input-group-text h-50 mt-2" id="inputGroup-sizing-default">$</span>
                    <input type="number" id="amount" class="h-50 mt-2" value="{{old('amount')}}" name="amount" placeholder="0.0" step=".01">
                  </div>
                  <div class="input-group-prepend col-md-7">
                  <input type="submit" class="w-100" value="Send">
                 </div>
                </div>
              
              
            </form>
        @endif
        
</div>
@endsection