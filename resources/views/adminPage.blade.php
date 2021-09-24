@extends('master')
@section('content')
<h1>Add Product</h1>
<div class="container">
    <form action="/posting" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="desc" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" name="category" aria-label="Default select example">
                <option selected>Select Category</option>
                <option value="1">Smartphone</option>
                <option value="2">Laptop</option>
                <option value="3">Television</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Image</label>
            <input class="form-control" type="file" name="cover_image">
        </div>
         <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
