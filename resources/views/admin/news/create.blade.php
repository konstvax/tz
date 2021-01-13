@extends('admin.layouts.app')
@section('content')
    @include('admin.news.includes.news_management')
    @include('admin.news.includes.messages')

    <div class="row">
        <div class="col">
            <div class="row">
                <h5 class="text-center">Create news</h5>
                <form action="{{route('admin.news.store')}}" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="row">
                        <div class="col-4">

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customPicture" name="picture">
                                <label class="custom-file-label" for="customPicture">Add image</label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{ old('title') }}">
                            </div>

                            <div class="form-group mt-2">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" class="form-control"
                                          rows="16">{{ old('content') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center h-1">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Create!</button>
                        </div>
                        <div class="col-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault"
                                       name="is_published">
                                <label class="form-check-label" for="flexCheckDefault">
                                    make public
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
