@extends('layout')

@section('content')
    <div class="container">
        <div class="row div col-md-12">
            <div class="img_title">
                <h3>
                @if ($imageInView->title != "")
                    {{$imageInView->title}}
                @else
                    No title
                @endif
                </h3>
            </div>
            <img src="/{{$imageInView->image}}" alt="" class="img-thumbnail gallery-image">
            <div class="views_count">
                @if ($imageInView->views > 0)
                    Views: <b>{{$imageInView->views}}</b>
                @else
                    No views
                @endif
                <br><a href="/" class="btn btn-info">Go Back</a>
            </div>
        </div>
    </div>
@endsection