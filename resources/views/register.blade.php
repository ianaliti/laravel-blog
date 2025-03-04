@extends('layouts.default')

@section('header')
@endsection

@section('maincontent')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Register</h2>
                <form action="{{ route('formsubmitted') }}" method="post">
                    <div class="form-floating m-1">
                        @csrf
                        <input type="text" name="name" id="name" placeholder="Type your name" class="form-control" required>
                        <label for="name" class="form-label">Name</label>
                    </div>
                    <div class="form-floating m-1">
                        <input type="email" name="email" id="email" placeholder="Type your email" class="form-control"
                            required>
                        <label for="email" class="form-label">Email</label>
                    </div>
                    <div class="form-floating m-1">
                        <input type="password" name="password" id="password" placeholder="Type your password"
                            class="form-control" required>
                        <label for="password" class="form-label">Password</label>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-success m-1" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col">
                <h2>Login</h2>
                <form action="{{ route('login') }}" method="post">
                    <div class="form-floating m-1">
                        @csrf
                        <input type="text" name="loginname" id="loginname" placeholder="Type your name" class="form-control"
                            required>
                        <label for="loginname" class="form-label">Name</label>
                    </div>
                    <div class="form-floating m-1">
                        <input type="password" name="loginpassword" id="loginpassword" placeholder="Type your password"
                            class="form-control" required>
                        <label for="loginpassword" class="form-label">Password</label>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-success m-1" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection