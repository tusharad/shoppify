@extends('master')
@section('content')


<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Checkout form</h2>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
        </h4>
        <ul class="list-group mb-3">
        <?php $sum = 0 ?>
           @foreach($total as $item)
              <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">{{$item->Name}}</h6>
            </div>
            <span class="text-muted">{{$item->price*$item->product_quantity}}</span>
          </li>
          <?php $sum += $item->price*$item->product_quantity ?>
          @endforeach
        
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>{{$sum}}</strong>
          </li>
        </ul>

        <form action="/orderplace" method="POST" class="card p-2">
        @csrf
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
       
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="{{Auth::user()['user_name']}}" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" value="{{Auth::user()['email']}}" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" name="address" id="address" value="{{Auth::user()['address']}}" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>


            <div class="col-12">
              <label for="address2" class="form-label">Phone </label>
              <input type="text" name="phone" value="{{Auth::user()['phone']}}" class="form-control">
            </div>

          <hr class="my-4">


          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input value="COD" name="payment_method" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Cash on Delivary</label>
            </div>
            <div class="form-check">
              <input value="debit" name="payment_method" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input value="paypal" name="payment_method" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">Paytm</label>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>
  </main>
</div>

@endsection