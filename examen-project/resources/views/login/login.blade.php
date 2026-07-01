<div>
    <form method="POST" action="{{ route('login.login') }}">
        @csrf
        <br>
        <div>
            <label for="email">email</label>
            <input type="email" id="email" name="email" value="email" required>
        </div>
        <div>
            <label for="password">wachtwoord</label>
            <input type="password" id="password" name="password" required>
        </div>
        <br>
        <button type="submit">Login</button>
        <span>of</span>
        <a href="{{ route('login.register') }}">Registeer</a>
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </form>
</div>