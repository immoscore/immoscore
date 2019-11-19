Dear {{ $user->name }},<br><br>

Your login credentials has changed:<br><br>

Username: {{ $user->email }}<br><br>
Password: Password you updated<br><br>


You can login on <a href="{{ url('/login') }}">{{ str_replace("http://", "", url('/login')) }}</a>.<br><br>

Best Regards,
Immoscore Team