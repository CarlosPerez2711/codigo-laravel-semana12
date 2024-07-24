<style>
    body {
        margin: 0;
        font-family: 'Arial', sans-serif;
        background-color: #f8f8f8;
    }

    .navbar {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar div {
        margin: 0 20px;
    }

    .navbar .empresa {
        font-weight: bold;
        color: #007bff;
    }

    .navbar .nav-links {
        display: flex;
        justify-content: center;
        flex: 1;
        gap: 20px; /* Reducir el espacio entre las opciones */
    }

    .navbar a {
        color: #333;
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .navbar .activo a {
        color: #fff;
        background-color: #007bff;
    }

    .navbar a:hover {
        color: #007bff;
        background-color: #e9ecef;
    }
</style>


<body>
    <div class="navbar">
        <div class="empresa">Empresa</div>
        <div class="nav-links">
            <div class="{{ setActivo('home') }}"><a href="{{ route('home') }}">Home</a></div>
            <div class="{{ setActivo('servicios.index') }}"><a href="{{ route('servicios.index') }}">Servicios</a></div>
            <div class="{{ setActivo('contacto') }}"><a href="{{ route('contacto') }}">Contacto</a></div>
        @guest
            <div><a href="{{ route('login') }}">Login</a></div>
        @else
            <div>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
            </div>
        @endguest
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    </div>
</body>
