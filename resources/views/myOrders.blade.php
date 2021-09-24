@extends('master')
@section('content')
<div class="custom-product">


<div class="col-md-4">
<div class="treding-wrapper">
        <h3>My Orders</h3>
    
        <br>
        @foreach($orders as $item)
        <a href="detail/{{$item->id}}">
        <div class="row searched-item cart-list-divider">
        <div class="col-sm-3">    
        <img class="trending-img" src="{{$item->gallery}}">
           
        </div>
        <div class="col-sm-4">    
            <div class="">
                <h2>Name: {{$item->Name}}</h2>
                <h5>Description: {{$item->description}}</h5>
                <h5>Address: {{$item->Address}}</h5>
                <h5>Payment status: {{$item->payment_status}}</h5>
                <h5>Payment Method: {{$item->payment_method}}</h5>
            </div>
        </div>
        </div>
</a>
        @endforeach
        

    </div>
</div>
</div>
@endsection 