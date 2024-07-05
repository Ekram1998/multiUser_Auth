@component('mail::message')
    Hi, {{ $user->name }}. Forgot Password?
    <p>It is Happens.</p>

    @component('mail::button', ['url' => url('reset/' . $user->remember_token)])
    Reset Your Password.
    @endcomponent

    Thank You, <br>
    {{config('app.name')}}
@endcomponent
