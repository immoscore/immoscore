Dear {{ $user->name }},<br><br>

Your account is verified and Your login credentials are:<br><br>

Username: {{ $user->email }}<br>
password: {{ $password }}<br><br>

You can login on <a href="{{ url('/login') }}">{{ str_replace("http://", "", url('/login')) }}</a>.<br><br>

Best Regards,