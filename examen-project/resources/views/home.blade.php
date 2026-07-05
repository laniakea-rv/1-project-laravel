<div>
    <nav>
        <div class="ml-auto">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Uitloggen</button>
            </form>
        </div>
        <h1>de mooie homepagina</h1>
        <div>
            <a href="{{ route('abonnementen') }}">Abonnementen</a>
            <a href="{{ route('lessen') }}">Lessen</a>
        </div>
    </nav>
</div>