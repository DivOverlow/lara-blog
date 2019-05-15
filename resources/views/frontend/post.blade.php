@extends('frontend/app')

{{--@section('bg-img', asset('frontend/img/post-bg.jpg'))--}}
@section('bg-img', Storage::disk('local')->url($post->image))

@section('head')
    <link rel="stylesheet" href="{{ asset('frontend/css/prism.css') }}">
@endsection

@section('title', $post->title)
@section('sub-heading', $post->subtitle)

@section('main-content')
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-lg-offset-1">
                    <div>
                        @foreach($post->categories as $category)
                            <a href="{{ route('category',$category->slug) }}"><small style="margin-left: 20px">
                                {{$category->name}}
                            </small></a>
                        @endforeach
                    </div>
                    <small class="pull-right">Created at {{$post->created_at}}</small>
                    {!! htmlspecialchars_decode($post->body) !!}

                    {{-- Tag clouds --}}
                    <h3>Tag Clouds</h3>
                    @foreach($post->tags as $tag)

                        <a href="{{ route('tag',$tag->slug) }}"><small class="pull-left" style="margin-left: 20px; border-radius: 5px; border: solid 1px grey; padding: 5px">
                            {{$tag->name}}
                        </small></a>
                    @endforeach


                </div>
            </div>
        </div>
    </article>

    <hr>
@endsection

@section('footer')
    <script src="{{ asset('frontend/js/prism.js') }}"></script>
@endsection