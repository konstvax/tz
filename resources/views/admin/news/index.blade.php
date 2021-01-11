@extends('admin.layouts.app')
@section('content')
    @include('admin.news.includes.news_management')
    @php /** @var Illuminate\Pagination\LengthAwarePaginator $newsList */ @endphp
    <div class="row mb-2">
        <div class="col float-end">
            <a href="{{route('admin.news.create')}}" class="btn btn-outline-primary">Create News</a>
        </div>
    </div>

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Views</th>
                <th scope="col">Published</th>
                <th scope="col">Published at</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
        </thead>
        <tbody>
            @php /** @var \App\Models\News $news */ @endphp
            @foreach($newsList as $news)
                <tr @if (!$news->is_published) style="background-color: #ccc;" @endif>
                    <th scope="row">{{$news->id}}</th>
                    <td><a href="{{route('admin.news.edit', $news->id)}}" class="link-dark select">{{$news->title}}</a>
                    </td>
                    <td>{{$news->views}}</td>
                    <td>@if($news->is_published) yes @else no @endif</td>
                    <td>{{$news->published_at}}</td>
                    <td>{{$news->created_at}}</td>
                    <td>{{$news->updated_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($newsList->total() > $newsList->count())
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        {{ $newsList->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
