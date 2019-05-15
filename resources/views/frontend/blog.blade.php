@extends('frontend/app')

@section('bg-img', asset('frontend/img/home-bg.jpg'))
@section('title', 'Clean Blog')
@section('sub-heading', 'A Blog Theme by Start Bootstrap')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .fa-thumbs-up:hover {
            color: red;
        }
    </style>
@endsection

@section('main-content')
    <!-- Main Content -->
    <div class="container">
        <div class="row" id="app">
            <div class="col-lg-8 col-md-10 mx-auto">
{{--                @foreach($posts as $post)--}}
                <posts
                    v-for='value in blog'
                    :title=value.title
                    :subtitle=value.subtitle
                    :created_at=value.created_at
                    :key=value.index
                    :post-id=value.id
                    login="{{ Auth::check() }}"
                    :likes = value.likes.length
                    :slug = value.slug
                ></posts>
                <hr>
{{--                @endforeach--}}
                <!-- Pager -->
                <div class="clearfix">
                    <div class="float-right">
                        {{$posts->links()}}
                    </div>
                    {{--<a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>--}}
                </div>
            </div>
        </div>
    </div>

    <hr>

@endsection

@section('footer')
    <script src="{{asset('js/app.js')}}"></script>
@endsection