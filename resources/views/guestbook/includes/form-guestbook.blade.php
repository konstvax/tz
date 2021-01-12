<form action="{{route('guestbook.store')}}" method="POST">
    @method('POST')
    @csrf
    <div class="row">
        <div class="col-3">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" value="{{ old('username') }}" name="username"
                       placeholder="your name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email"
                       placeholder="username@example.com">
            </div>
        </div>
        <div class="col-9">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Your comment</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="text"
                          placeholder="Some comment..">{{ old('text') }}</textarea>
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
