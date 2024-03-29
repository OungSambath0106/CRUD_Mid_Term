@extends('layouts.master')
@section('title', 'Create New Account')
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('main')
    <section class="vh-100" style="background-color: #f5f4f9;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-80">
                <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                    <div class="card shadow-1-strong" style="border-radius: 8px; background-color: #ffffff; color:#687a8a;">
                        <div class="card-body p-4">
                            <h2 class="mb-4 text-center"> REGISTER </h2>
                            <h4 class="mb-0 "> Adventure starts here &#128640 </h4>
                            <p> Make your app management easy and fun! </p>
                            <form action="{{ route('accounts.store') }}" method="POST">
                                <ul class="text-danger">
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $err)
                                            <li> {{ $err }} </li>
                                        @endforeach
                                    @endif
                                </ul>
                                @csrf
                                <div class="form-outline mb-4">
                                    <label for="username" class="mb-2">USERNAME</label>
                                    <input type="text" name="name" class="form-control form-control-lg"
                                        placeholder="Enter your username" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label for="email" class="mb-2">EMAIL</label>
                                    <input type="email" name="email" class="form-control form-control-lg"
                                        placeholder="Enter your email" />
                                    @error('email')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label for="password" class="mb-2">PASSWORD</label>
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        placeholder="Enter your password" />
                                    @error('password')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="form-check d-flex justify-content mb-4">
                                    <input type="checkbox" name="remember" class="form-check-input me-2" value=""
                                        id="form1Example3" />
                                    <label for="form1Example3" class="form-check-label">I agree to <span
                                            style="color: #0b5ed7">privacy policy & terms</span> </label>
                                </div>
                                <div class="d-grid col-12 mx-auto">
                                    <button class="btn btn-primary" id="registerButton" type="submit"
                                        disabled>Register</button>
                                </div>
                                <p class="text-center pt-3">Already have an account? <a href="#"
                                        style="text-decoration: none;"> Sign in Instead </a> </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Get references to the checkbox and submit button
        const checkbox = document.getElementById('form1Example3');
        const registerButton = document.getElementById('registerButton');

        // Add event listener to the checkbox
        checkbox.addEventListener('change', function() {
            // If checkbox is checked, enable the button; otherwise, disable it
            registerButton.disabled = !this.checked;
        });
    </script>
@endsection
