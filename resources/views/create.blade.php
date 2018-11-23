@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1>Add Image</h1>
                <form action="/store" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Image title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Select image file</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success my_sub_btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection