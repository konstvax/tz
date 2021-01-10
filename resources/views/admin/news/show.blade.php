@extends('admin.layouts.app')
@include('admin.news.includes.news_management')
@section('content')
    @php
        /**@var \App\Models\News $news */
    @endphp
    <div class="row">
        <div class="col">
            <h5 class="text-center">Edit news</h5>
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-2">
                        @if($news->image)
                            <div>
                                <img src="{{asset('images/my_photo.jpg')}}" alt="picture" class="img-thumbnail" id="change-picture">
                            </div>
                        @else
                            <div>
                                <p style="color: red">Without picture</p>
                            </div>
                        @endif
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customPicture">
                            <label class="custom-file-label" for="customPicture">Change image...</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$news->title}}">
                        </div>

                        <div class="form-group mt-2">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" class="form-control"
                                      rows="16">{{$news->content}}</textarea>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="is_published">Published</label>
                            <input type="text" class="form-control" id="is_published" name="is_published"
                                   value="@if($news->is_published) Yes @else No @endif"
                                   disabled>
                        </div>
                        <div class="form-group">
                            <label for="published_at">Published at</label>
                            <input type="text" class="form-control" id="published_at" value="{{$news->published_at}}"
                                   disabled>
                        </div>
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
                            <input name="is_to_published" type="hidden" value="0">
                            <label class="form-check-label" for="is_to_published">Published</label>
                            <input name="is_published" type="checkbox" class="form-check-input" value="1"
                                   id="is_to_published"
                                   @if($news->is_published)
                                   checked="checked"
                                @endif>
                        </div>
                        {{--                    <div class="form-check">--}}
                        {{--                        <input type="checkbox" class="form-check-input" id="checkBox">--}}
                        {{--                        <label class="form-check-label" for="checkBox">Check me out</label>--}}
                        {{--                    </div>--}}
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection
