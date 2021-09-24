@extends('master')
@section('content')
@if (session('status'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="{{asset('storage/cover_images/'.$product[0]['gallery'])}}" alt="Card image cap" id="product-detail">
                </div>
                <div class="row">
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    <!--End Controls-->
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{asset('storage/cover_images/'.$product[0]['gallery'])}}" alt="Product Image 1">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{asset('storage/cover_images/'.$product[0]['gallery'])}}" alt="Product Image 2">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{asset('storage/cover_images/'.$product[0]['gallery'])}}" alt="Product Image 3">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{asset('storage/cover_images/'.$product[0]['gallery'])}}" alt="Product Image 4">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{asset('storage/cover_images/'.$product[0]['gallery'])}}" alt="Product Image 5">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{asset('storage/cover_images/'.$product[0]['gallery'])}}" alt="Product Image 6">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.Second slide-->


                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-dark fas fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2">{{$product[0]['name']}}</h1>
                        <p class="h3 py-2">${{$product[0]['price']}}</p>
                        <p class="py-2">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                        </p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Category:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong></strong></p>
                            </li>
                        </ul>

                        <h6>Description:</h6>
                        <p>{{$product[0]['description']}}</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Avaliable Color :</h6>
                            </li>

                        </ul>



                        <form action="/add_to_cart" method="POST">
                            @csrf

                            <div class="col-auto">
                                <ul class="list-inline pb-3">
                                    <li class="list-inline-item text-right">
                                        Quantity
                                        <input type="number" name="product_quantity" min="1" max="10" value="1">
                                        <input type="hidden" name="product_id" value="{{$product[0]['id']}}">
                                    </li>
                                </ul>
                            </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col d-grid">
                            <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                        </div>
                        <div class="col d-grid">
                            <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">Add To Cart</button>
                        </div>
                    </div>
                    </form>
                    <!-- Button trigger modal -->
                    <div class="col d-grid">
                        <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Post comment
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Post comment</h5>
                                    <h6 class="text-grey">Only users who have bought the product can comment on it</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/postComment" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product[0]['id']}}">
                                        <input style="border:solid black 1px;" type="text" class="form-control" name="comment">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Post</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Comment section-->
                    <style>
                        body {
                            background-color: #f7f6f6
                        }

                        .card {
                            border: none;
                            box-shadow: 5px 6px 6px 2px #e9ecef;
                            border-radius: 4px
                        }

                        .dots {
                            height: 4px;
                            width: 4px;
                            margin-bottom: 2px;
                            background-color: #bbb;
                            border-radius: 50%;
                            display: inline-block
                        }

                        .badge {
                            padding: 7px;
                            padding-right: 9px;
                            padding-left: 16px;
                            box-shadow: 5px 6px 6px 2px #e9ecef
                        }

                        .user-img {
                            margin-top: 4px
                        }

                        .check-icon {
                            font-size: 17px;
                            color: #c3bfbf;
                            top: 1px;
                            position: relative;
                            margin-left: 3px
                        }

                        .form-check-input {
                            margin-top: 6px;
                            margin-left: -24px !important;
                            cursor: pointer
                        }

                        .form-check-input:focus {
                            box-shadow: none
                        }

                        .icons i {
                            margin-left: 8px
                        }

                        .reply {
                            margin-left: 12px
                        }

                        .reply small {
                            color: #b7b4b4
                        }

                        .reply small:hover {
                            color: green;
                            cursor: pointer
                        }

                    </style>
                    <?php
                    function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
                    ?>
                    <div class="container mt-5">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8">
                                <h5>Comments</h5>
                                <div class="headings d-flex justify-content-between align-items-center mb-3">
                                </div>
                                @foreach($product[1] as $comment)
                                <div class="card p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="user d-flex flex-row align-items-center">
                                            <span><small class="font-weight-bold text-primary">anonymous</small>
                                                <br>
                                                <small class="font-weight-bold">{{$comment['content']}}</small></span> </div>
                                        <small>{{
                                            time_elapsed_string($comment['created_at'])
                                            }}</small>
                                    </div>
                                    <div class="action d-flex justify-content-between mt-2 align-items-center">
                                        <div class="icons align-items-center"> <i class="fa fa-check-circle-o check-icon"></i> </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Close Content -->



    </div>
</section>
<!-- End Article -->
@endsection
