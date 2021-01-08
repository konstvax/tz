@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <main role="main">
            <section class="jumbotron text-center">
                <div class="container">
                    <h1 class="jumbotron-heading">News list</h1>
                    <p class="lead text-muted">Something short and leading about the collection below—its contents, the
                        creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it
                        entirely.</p>
                </div>
            </section>

            <div class="album py-5 bg-light">
                <div class="row">
                    <div class="col">Sort by:  <a href="{{route('news', 'by-date')}}" class="btn btn-sm btn-warning">Date</a>
                        <a href="{{route('news', 'by-rating')}}" class="btn btn-sm btn-success">Rating</a></div>
                </div>
                <div class="row">
{{--                    {{dd($news->count() > 0)}}--}}
                    @if($news->count() > 0)
                        @foreach($news as $item)
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                         xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                                         focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>
                                            Placeholder</title>
                                        <rect fill="#55595c" width="100%" height="100%"/>
                                        <text fill="#eceeef" dy=".3em" x="50%" y="50%">Thumbnail</text>
                                    </svg>
                                    <div class="card-body">
                                <p class="card-text">{{$item->title}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{route('news.id', $item->id)}}" class="btn btn-sm btn-outline-secondary">View</a>
{{--                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
                                        {{--                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
                                    </div>
                                    <small class="text-muted">9 views</small>
                                    <small class="text-muted">{{\Illuminate\Support\Carbon::parse($item->published_at)->format('Y:m:d')}}</small>
                                </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col">
                            No news
                        </div>
                    @endif
                </div>
            </div>
        </main>
    </div>

    <div class="row">
        <div class="col-12">
            @if($news->total() > $news->count())
                {{$news->links()}}
            @endif
        </div>
    </div>
@endsection
