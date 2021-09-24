@extends('master')
@section('content')
 @if (session('status'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h3>Cart products</h3>
<div class="container">
<table class="table table-striped table-hover">
 <thead>
    <tr>
      <th scope="col">Sr No</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Remove</th>
    </tr>
  </thead>
  <tbody>
  <?php $cnt = 1 ;
        $sum = 0;
  ?>
  @foreach($products as $item)
    <tr>
      <th scope="row">{{$cnt++}}</th>
      <td><img class="trending-img" src="storage/cover_images/thumb.{{$item->gallery}}"></td>
      <td>{{$item->Name}}</td>
      <td>Rs. {{$item->price}}</td>
      <td>{{$item->product_quantity}}</td>
      <td> <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove from cart</a></td>
    </tr>
    <?php $sum += $item->price*$item->product_quantity; ?>
       @endforeach
  </tbody>
  <td>Total = {{$sum}}</td>
</table>
   <a class="btn btn-success" href="/ordernow">order now</a>
</div>
@endsection 