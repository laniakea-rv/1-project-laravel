<div>
    <form method="POST" action="{{ route('login.store') }}">
        @csrf
        <br>
        <div>
            <label for="name">naam</label>
            <input type="text" id="name" name="name" value="name" required>
        </div>
        <div>
            <label for="email">email</label>
            <input type="email" id="email" name="email" value="email" required>
        </div>
        <div>
            <label for="password">wachtwoord</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">herhaal wachtwoord</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <br>
        <button type="submit">Registreer</button>
        <span>of</span>
        <a href="{{ route('login') }}">Login</a>
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </form>
</div>