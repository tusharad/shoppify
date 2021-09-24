@extends('master')
@section('content')


@if (session('status'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h3>Filter products</h3>
<div class="container">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Sr No</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php $cnt = 1 ;
        $sum = 0;
  ?>
            @foreach($products as $item)
            <tr>
                <th scope="row">{{$cnt++}}</th>

                <td><a href="detail/{{$item['id']}}">
                        <img class="trending-img" src="storage/cover_images/thumb.{{$item->gallery}}">
                    </a></td>


                <td> <a href="detail/{{$item['id']}}">{{$item->Name}} </a></td>

                <td>Rs. {{$item->price}}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection
