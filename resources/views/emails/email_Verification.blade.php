Dear {{ $user['name'] }},<br><br>

You have been registered on {{ url('/') }}.<br><br>

Please verify your email address by clicking on link given below:<br><br>



<a href="{{ url('/signup/varify_email') }}?id={{$user['id']}}">{{ str_replace("http://", "", url('/signup/varify_email')) }}?id={{$user['id']}}</a>.<br><br>

Best Regards,
Immoscore Team