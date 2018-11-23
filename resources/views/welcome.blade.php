@extends('layout')

@section('content')
    <div class="container">
        <h1 align="center">May Gallery</h1>
        <div class="row">
            @foreach($imagesInView as $image)
                <div class="col-md-3 gallery-item">
                    <div>
                        <img src="/{{$image->image}}" class="img-thumbnail">
                    </div>
                    <div class="views_count">
                        @if ($image->views > 0)
                            Views: <b>{{$image->views}}</b>
                        @else
                            No views
                        @endif
                    </div>
                    <a href="/show/{{$image->id}}" class="btn btn-info my-button">Info</a>
                    <a href="/edit/{{$image->id}}" class="btn btn-warning my-button">Edit</a>
                    <a href="/delete/{{$image->id}}" onclick="return confirm('Удаляем?');" class="btn btn-danger my-button">Delete</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection