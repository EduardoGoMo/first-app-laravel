<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>homepage blade template</title>
</head>
<body>
    <h1>hola mundo :D</h1>
    
    <h2>Este es un blade template de prueba</h2>
    <p>el año actual es {{date('Y')}}</p>
    <p>10 + 80 = {{10+80}}</p>

    <h3>Mi nombre es {{$name}}</h3>
    <h4>El nombre de mi gato es {{$catsname}}</h4>

    <ul>
        @foreach ($allanimals as $animal)
            <li>{{$animal}}</li>
        @endforeach
    </ul>

    <a href="/about">About page</a>
</body>
</html>