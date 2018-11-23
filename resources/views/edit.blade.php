@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1>Edit Image</h1>
                <img src="/{{$imageInView->image}}" alt="" class="img-thumbnail">
                <form action="/update/{{$imageInView->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Image title</label>
                        <input type="text" name="title" class="form-control" value="{{$imageInView->title   }}">
                    </div>
                    <div class="form-group">
                        <label>Select image file</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-warning my_sub_btn">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection