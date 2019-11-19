{{-- resources/views/emails/password.blade.php --}}

Click here to reset your password: <a href="{{ url('forgot_password/reset/'.$token) }}">{{ url('forgot_password/reset/'.$token) }}</a>