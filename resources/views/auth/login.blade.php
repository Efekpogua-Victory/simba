@extends('layouts.guest')
 
@section('title', 'Sign In')
 
@section('content')
    <!-- Validation Errors -->
 <x-auth-validation-errors class="mb-4" :errors="$errors" />
 <p class="lead text-center mb-4">We are glad to see you again!</p>
 <form method="POST" action="{{ route('login') }}">
     @csrf
     <div class="vertical-input-group">
         <div class="input-group">
             <input type="email" name="email" class="form-control" placeholder="Your Email">
         </div>
         <div class="input-group">
             <input type="password" name="password" class="form-control"  required placeholder="Password">
         </div>
     </div>
     <div class="d-grid my-4"><button class="btn btn-primary shadow-none" type="submit">Sign In</button></div>
 </form>
 <p class="text-3 text-center text-muted mb-2">
     Don't have an account? 
     <a class="btn-link" href="{{route('register')}}">Sign Up</a>
 </p>
@endsection