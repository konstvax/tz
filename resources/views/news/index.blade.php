@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <main role="main">
                <section class="jumbotron text-center">
                    <div class="container">
                        <h1 class="jumbotron-heading">News list</h1>
                        <p class="lead text-muted">Something short and leading about the collection below—its contents,
                            the
                            creator...</p>
                    </div>
                </section>

                <div class="album py-1 bg-light">
                    <div class="row">
                        <div class="col">Sort by: <a href="{{route('news', 'by-date')}}"
                                                     class="link-danger">date</a>&nbsp; |&nbsp;
                            <a href="{{route('news', 'by-rating')}}" class="link-danger">views</a></div>
                    </div>
                    <div class="row mt-2">
                        @if($news->count() > 0)
                            @php /** @var \Illuminate\Pagination\LengthAwarePaginator $news */ @endphp
                            @php /** @var App\Models\News $item */ @endphp
                            @foreach($news as $item)
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow-sm">
                                        <div class="row">
                                            @if($item->image)
                                                <img src="{{asset($item->image)}}" alt="{{$item->title}}" height="280">
                                            @else
                                                <img src="{{asset('storage/images/default.png')}}"
                                                     alt="{{$item->title}}" height="280">
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">{{$item->title}}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="{{route('news.id', $item->id)}}"
                                                       class="btn btn-sm btn-outline-secondary">View</a>
                                                </div>
                                                <small class="text-muted">{{$item->views}} views</small>
                                                <small
                                                    class="text-muted">{{ $item->getCreatedAt() }}</small>
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
    </div>
@endsection
