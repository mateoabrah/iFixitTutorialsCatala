<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories de Reparació</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Categories de Reparació</h1>
        <ul>
            @foreach($categories as $category)
                <li>{{ $category }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>
