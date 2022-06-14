<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jela svijeta</title>
</head>
<body>
    <h1 style="text-align: center">Jela svijeta</h1>
    <hr>
    @foreach ($terms as $term)
        @foreach ($term as $key=>$value)
            <h4>{{ $key }}</h4>
            <p>{{ $value }}</p>
        @endforeach
    @endforeach
    {{ $report }}
</body>
</html>
