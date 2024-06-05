<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('wikipediaLCK/icon.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Scripts -->
</head>
<body style="margin-top:150px" class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
            <a class="navbar-brand" href="#">LCK</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/kategorie">Tabulka</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index">Přidávání</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kategorie-stranek">Kategorie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/prihlaseni">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/registrace">Registrace</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/diskuse/1">Diskuse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/stranka/1">Stránka</a>
                    </li>
                </ul>
                @auth
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link mb-0" style="color:white;font-size:20px">Jméno: {{auth()->user()->prezdivka}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('logout')}}" class="nav-link mb-0" style="color:red;font-size:20px">Odhlásit se</a>
                    </li>
                </ul>
                @endauth
            </div>
        </nav>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Funkce pro získání aktuálního ID z URL
            function getCurrentId() {
                const path = window.location.pathname;
                const parts = path.split("/");
                if ((parts[1] === "diskuse" || parts[1] === "stranka") && !isNaN(parts[2])) {
                    return parseInt(parts[2], 10); // Předpokládáme, že ID je na třetí pozici, např. /diskuse/1 nebo /stranka/1
                } else {
                    return null;
                }
            }

            // Funkce pro přesměrování
            function redirectToId(newId, basePath) {
                window.location.href = "/" + basePath + "/" + newId;
            }

            const incrementBtn = document.getElementById("increment-btn");
            const decrementBtn = document.getElementById("decrement-btn");

            // Zobrazení tlačítek pouze na stránkách diskuse a stranka
            const currentId = getCurrentId();
            if (currentId !== null) {
                incrementBtn.style.display = "inline-block";
                decrementBtn.style.display = "inline-block";
                
                const basePath = window.location.pathname.split("/")[1];

                // Přiřazení událostí kliknutí
                incrementBtn.addEventListener("click", function() {
                    redirectToId(currentId + 1, basePath);
                });

                decrementBtn.addEventListener("click", function() {
                    redirectToId(currentId - 1, basePath);
                });
            }
        });
    </script>

<!-- Page Content -->
        <main class="container mt-5 pt-5">
            <!-- Tlačítka pro přesměrování, zpočátku skrytá -->
            <button id="decrement-btn" class="btn btn-secondary" style="display: none;">Předchozí</button>
            <button id="increment-btn" class="btn btn-primary" style="display: none;">Další</button>
        </main>
    </div>
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        

    
</body>
</html>
