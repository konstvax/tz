@extends('admin.layouts.app')
@section('content')
    @include('admin.guestbook.includes.guestbook_management')
    @php
        /**@var \App\Models\Guestbook $coment */
    @endphp
    @include('admin.guestbook.includes.messages')
    <div class="row">
        <div class="col">
            <div class="row">
                <h5 class="text-center">Edit comment ID: {{ $comment->id }} </h5>
                <form action="{{route('admin.guestbook.update', $comment->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="is_published">Status</label>
                                <input type="text" class="form-control" id="is_published" name="is_published"
                                       value="@if($comment->is_published) published @else unpublished @endif"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label for="username">Name</label>
                                <input type="text" class="form-control" id="username" name="username"
                                       value="{{$comment->username}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                       value="{{$comment->email}}" disabled>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="form-group">
                                <label for="comment">Comment</label>
                                <textarea name="comment" id="comment" class="form-control"
                                          rows="10">{{$comment->text}}</textarea>
                            </div>
                        </div>
                        <div class="col-2">
                            @if($comment->is_published)
                                <div class="form-group">
                                    <label for="published_at">Published at</label>
                                    <input type="text" class="form-control" id="published_at"
                                           value="{{$comment->updated_at}}"
                                           disabled>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="created_at">Created at</label>
                                <input type="text" class="form-control" id="created_at" name="created_at"
                                       value="{{$comment->created_at}}"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label for="updated_at">Updated at</label>
                                <input type="text" class="form-control" id="updated_at" name="updated_at"
                                       value="{{$comment->updated_at}}"
                                       disabled>
                            </div>
                            <div class="form-check">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-check-label" for="is_published">
                                            @if($comment->is_published)
                                                unpublish
                                            @else
                                                publish
                                            @endif
                                        </label>
                                        <input name="is_published" type="hidden" value="0">
                                    </div>
                                    <div class="col">
                                        <input name="is_published" type="checkbox" class="form-check-input" value="1"
                                               id="is_published"
                                               @if($comment->is_published)
                                               checked="checked"
                                            @endif>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <div class="row">
                        <form method="POST" action="{{route('admin.guestbook.destroy', $comment->id)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
