@extends('layouts.app')
@section('content')
    <div class="container">
        <main role="main">
            <section class="jumbotron-fluid text-center">
                <div class="container">
                    <h1 class="jumbotron-heading">Welcome to our Guestbook</h1>
                    <p class="lead text-muted">Every review is important to us. Please leave your feedback here...</p>
                </div>
            </section>
        </main>
        <main role="main" class="container">
            <form>
                <div class="row">
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" value="" placeholder="your name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" value="" placeholder="username@example.com">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Your comment</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Some comment.."></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <div class="mb-1 form-check">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>

                </div>
            </form>

            <div class="my-0 pt-0 bg-white rounded">
                <h6 class="border-bottom border-gray pb-2 mb-0">Visitor reviews</h6>

                @php /** @var Illuminate\Pagination\LengthAwarePaginator $users */ @endphp
                @php /** @var \App\Models\Guestbook $user */ @endphp

                @foreach($users as $user)
                    <div class="media text-muted pt-3">
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <strong class="d-block text-gray-dark">{{ $user->username }}</strong>
                            {{ $user->text }}
                        </p>
                    </div>
                @endforeach

                <small class="d-block float-end text-right mt-3">
                    @if($users->total() > $users->count())
                        {{ $users->links() }}
                    @endif
                </small>
            </div>
        </main>
    </div>
@endsection
