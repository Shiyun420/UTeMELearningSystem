<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{url('css/Auth/register.css')}}">

</head>
<body>
    <div class="container">
        <div class="logo">
            <!-- Your logo goes here -->
            <img src="images/webdesign/utemelearninglogo2.png" alt="Logo">
            <h3>Sign Up</h3>
        </div>

        <x-validation-errors class="mb-4" />

        <div class="register-form">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <x-input id="userType" type="text" name="userType" value="student"/>

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-label for="IC" value="{{ __('IC') }}" />
                <x-input id="IC" type="text" name="IC" :value="old('IC')" required autofocus autocomplete="IC" />
            </div>

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div>
                <x-label for="phoneNum" value="{{ __('Phone Number') }}" />
                <x-input id="phoneNum" type="text" name="phoneNum" :value="old('phoneNum')" required autofocus autocomplete="phoneNum" />
            </div>

            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div>
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div>
                

                <button>
                    {{ __('Register') }}
                </button>
                <div class="login" style="margin-bottom:10px;">
                    <p>Have an account?<a href="{{route('login')}}">Login</a></p>                   
                </div>
            </div>
        </form>
        </div>
    </div>
</body>
</html>

