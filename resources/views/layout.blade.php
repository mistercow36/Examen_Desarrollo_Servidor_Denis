<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['componentes/css/app.css', 'componentes/js/app.js'])
</head>
<div id="app" class="tabla">
    <body class="bg-green-200 font-medium">
    <header class="h-15vh bg-blue-400 flex flex-row justify-between">
        <h1>Denis</h1>
        <h2>Examen Laravel</h2>
        @auth
            <div  style="height: 50px">
            Bienvenido, {{auth()->user()->name}}
            <form action="logout" method="POST">
                <input type="submit" value="Cerrar sesión">
            </form>
            </div>
        @endauth
        @guest
            <div style="height: 50px" >
                <a href="login">Iniciar sesión</a>
                <a href="register">Registrarse</a>

            </div>
        @endguest
    </header>
    @auth
    <nav class="bg-amber-600 flex flex-row justify-start">
        <a class="w-1/12 bg-gray-800 text-white" href="alumnos">Alumnos</a>
    </nav>
    @endauth
    @guest
    <nav class="bg-amber-600 flex flex-row justify-start">
        <a class="w-1/12 bg-gray-800 text-white" href="login">Acceda primero</a>
        <a class="w-1/12 bg-gray-800 text-white" href="register">Para ver las opciones</a>
    </nav>
    @endguest
    <main class="min-h-screen">
        @yield('contenido')


    </main>
    <footer class="h-15vh bg-black" style="color: white; height: 50px;">
        @copyrigth pero copia lo que quieras...
    </footer>
    </body>
</div>

</html>
