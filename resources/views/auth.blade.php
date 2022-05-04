@extends('layouts.app')

{{-- TITLE OF THE PAGE --}}
@section('title', 'Machine Lungs - Vapeshop')

{{-- HTML HEAD STARTS HERE --}}
@section('head')
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/general.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}" />
@endsection



{{-- HTML BODY STARTS HERE --}}
@section('body')
    <section class="auth">
        <div class="login-form">
            <h1>Admin</h1>

            <form action="#" class="form">
                <div class="input-wrapper">
                    <input type="email" class="form-input" placeholder="Email" required />
                    <input type="password" class="form-input" placeholder="Password" required />
                </div>

                <button type="submit" class="form-btn" disabled>Log In</button>
            </form>
        </div>
    </section>

    <!-- !MAIN SCRIPT -->
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
