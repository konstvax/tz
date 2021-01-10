@extends('admin.layouts.app')
@include('admin.news.includes.news_management')
@section('content')
    @php
        /**@var \App\Models\News $news */
    @endphp
    <div class="row">
        <div class="col">
            <div class="row">
                <h5 class="text-center">Edit news</h5>
                <form action="{{route('admin.news.update', $news->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-2">
                            @if($news->image)
                                {{-- public/images/ZxBhZ5Cx5n5OLo7tIk6xVU3ig4bUKgbMy7ASjMIA.jpg--}}
                                <div>
                                    <img src="{{asset($news->image)}}"
                                         alt="picture" class="img-thumbnail"
                                         id="change-picture">
                                </div>
                            @else
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                     xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
                                     focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>
                                        Placeholder</title>
                                    <rect fill="#55595c" width="100%" height="100%"/>
                                    <text fill="#eceeef" dy=".3em" x="50%" y="50%">Thumbnail</text>
                                </svg>
                                <div>
                                    <p style="color: red">Without picture</p>
                                </div>
                            @endif
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customPicture" name="picture">
                                <label class="custom-file-label" for="customPicture">Change image...</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{$news->title}}">
                            </div>

                            <div class="form-group mt-2">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" class="form-control"
                                          rows="16">{{$news->content}}</textarea>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="is_published">Status published</label>
                                <input type="text" class="form-control" id="is_published" name="is_published"
                                       value="@if($news->is_published) true @else false @endif"
                                       disabled>
                            </div>
                            @if($news->is_published)
                                <div class="form-group">
                                    <label for="published_at">Published at</label>
                                    <input type="text" class="form-control" id="published_at"
                                           value="{{$news->published_at}}"
                                           disabled>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="views">Views</label>
                                <input type="text" class="form-control" id="views" name="views" value="{{$news->views}}"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label for="created_at">Created at</label>
                                <input type="text" class="form-control" id="created_at" name="created_at"
                                       value="{{$news->created_at}}"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label for="updated_at">Updated at</label>
                                <input type="text" class="form-control" id="updated_at" name="updated_at"
                                       value="{{$news->updated_at}}"
                                       disabled>
                            </div>

                            <div class="form-check mt-5">
                                <label class="form-check-label" for="is_published">Published</label>
                                <input name="is_published" type="hidden" value="0">

                                <input name="is_published" type="checkbox" class="form-check-input" value="1"
                                       id="is_published"
                                       @if($news->is_published)
                                       checked="checked"
                                    @endif>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
            <div class="row">
                <form method="POST" action="{{route('admin.news.destroy', $news->id)}}">
                    @method('DELETE')
                    @csrf
                    <div class="col">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <div class="col-md-3"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
