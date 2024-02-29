<x-guest-layout>
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" id="login-form">
        @csrf

        <div class="form-group {{ $errors->get('email') ? 'has-error' : '' }}">
            <label class="control-label" for="email">{{ __('Email') }}</label>
            <input class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            @if ($errors->get('email'))
                <ul class="text-danger list-unstyled">
                    @foreach ((array) $errors->get('email') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="form-group {{ $errors->get('password') ? 'has-error' : '' }}">
            <label class="control-label" for="password">{{ __('Password') }}</label>
            <input class="form-control" id="password" type="password" name="password" required autocomplete="current-password" />
            @if ($errors->get('password'))
                <ul class="text-danger list-unstyled">
                    @foreach ((array) $errors->get('password') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="checkbox">
            <label for="remember_me">
                <input id="remember_me" type="checkbox" name="remember">
                {{ __('Remember Me') }}
            </label>
        </div>

        <div class="actions">
            <button class="btn btn-primary pull-right" type="submit"><strong>{{ __('Log In') }}</strong></button>
        </div>
    </form>
</x-guest-layout>
