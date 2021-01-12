@extends('admin.layouts.app')
@section('content')
    <div class="row main">
        <div class="col d-flex justify-content-center">
            <h4 class="hello"><span class="align-middle">Hello, Admin</span></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-4">Go to <a href="{{route('admin.news.index')}}" class="link-danger">News
                management</a></div>
        <div class="col-12 mt-4">Go to <a href="{{route('admin.guestbook.index')}}" class="link-danger">Guestbook management</a></div>
    </div>
@endsection
