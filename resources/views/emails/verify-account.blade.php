<h3>Hi: {{ $account->name }}</h3>

<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod cumque repellat neque sint architecto minima.</p>

<p><a href="{{ route('account.verify', $account->email) }}">Click here to verify your account</a></p>