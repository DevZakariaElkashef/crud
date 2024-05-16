<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Add User</h1>



    <form method="POST" action="{{ route('users.store') }}">
      @csrf
      {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
      <div class="row">
            <div class="form-group col-6 mb-3">
                <label for="name">name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-6 mb-3">
                <label for="email">email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-6 mb-3">
                <label for="password">password</label>
                <input type="password" class="form-control" name="password" id="password">
                @error('password')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-6 mb-3">
                <label for="confirm">Confirm password</label>
                <input type="password" class="form-control" name="confirm" id="confirm">
            </div>
        </div>


        <button class="btn btn-primary" type="submit">Save</button>
    </form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
