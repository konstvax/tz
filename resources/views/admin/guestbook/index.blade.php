@extends('admin.layouts.app')
@section('content')
    @include('admin.guestbook.includes.guestbook_management')
    @include('admin.guestbook.includes.messages')
    @php /** @var Illuminate\Pagination\LengthAwarePaginator $commentsList */ @endphp
    {{--    <div class="row mb-2">--}}
    {{--        <div class="col float-end">--}}
    {{--            <a href="{{route('admin.news.create')}}" class="btn btn-outline-primary">Create News</a>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Published</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php /** @var \App\Models\Guestbook $comment */ @endphp
            @foreach($commentsList as $comment)
                <tr @if (!$comment->is_published) style="background-color: #ccc;" @endif>
                    <th scope="row">{{$comment->id}}</th>
                    <td>{{$comment->username}}</td>
                    <td>{{$comment->email}}</td>
                    <td>@if($comment->is_published) yes @else no @endif</td>
                    <td>{{$comment->created_at}}</td>
                    <td>{{$comment->updated_at}}</td>
                    <td>
                        <a href="{{route('admin.guestbook.edit', $comment->id)}}" class="select link-danger ">
                            Edit comment
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($commentsList->total() > $commentsList->count())
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        {{ $commentsList->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
