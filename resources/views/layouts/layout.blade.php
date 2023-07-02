<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        /* Estilos do layout */

        body {
            background-color: #11162D;
            color: #FFFFFF;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #0B132B;
            padding: 10px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header i {
            color: #FFFFFF;
            font-size: 24px;
            margin-right: 10px;
        }

        .header form {
            display: inline-block;
        }

        .header button {
            background: none;
            border: none;
            color: #FFFFFF;
            font-size: 16px;
            cursor: pointer;
        }

        .header button:hover {
            text-decoration: underline;
        }

        .content {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <i class="fas fa-dumbbell"></i>
        <div class="px-4 py-2">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Sair</button>
            </form>
        </div>
    </div>


    <div class="content">
        @yield('content')
    </div>
    @include('layouts.menu')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


    @yield('scripts')
</body>

</html>
