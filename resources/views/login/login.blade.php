<!DOCTYPE html>
<html lang="en">

<head>
    <title> TPKS - Login</title>

    @include('layouts.head')

</head>

<body background="{{ asset('templates/img/bg-login.png') }}" style="background-repeat: no-repeat;background-size: cover;">

    <div class="container container-login">

        <div class="row justify-content-center">

            <div class="col-xl-5">

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="p-5">
                        <div class="text-center">
                            <img src="{{ asset('templates/img/logo.png') }}" width="250px">
                            <p class="text-muted mb-4 mt-4 font-italic">Terminal Pelindo Petikemas</p>
                        </div>
                        <form method="post" action="/login">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control"
                                    placeholder="Masukkan Username" value="{{ old('username') }}" >
                                {{-- value="{{ Session::get('username') }}" --}}
                                @error('username')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Masukkan Password" value="{{ old('password') }}">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="submit" name="submit" 
                                class="btn btn-primary btn-block custom-button">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.script')

</body>

</html>
