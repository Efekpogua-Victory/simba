@extends('layouts.guest')

@section('title', 'Create an account')

@section('content')
 <!-- Validation Errors -->
 <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <p class="lead text-center mb-4">We are glad to see you!</p>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="vertical-input-group">
            <div class="input-group">
                <input type="text" class="form-control" required placeholder="Your Fullname" name="name"> 
            </div>
            <div class="input-group">
                <input type="email" name="email" class="form-control" placeholder="Your Email">
            </div>
            <div class="input-group">
                <input type="password" name="password" class="form-control"  required placeholder="Password">
            </div>
            <div class="input-group">
                <input type="password" name="password_confirmation" class="form-control"  required placeholder="Confirm Password">
            </div>
        </div>
        <div class="d-grid my-4"><button class="btn btn-primary shadow-none" type="submit">Create</button></div>
    </form>
    <p class="text-3 text-center text-muted mb-2">
        Already have an account? 
        <a class="btn-link" href="{{route('login')}}">Sign In</a>
    </p>
@endsection
