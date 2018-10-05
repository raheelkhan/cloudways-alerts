<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
    <p>Dear Cloudways User,</p>
        <p>
        Here are your recent server alerts:
        <ul>
            @foreach($stats as $stat => $value)
                <li><b>{{ $stat }}</b> -  {{ $value }}</li>
            @endforeach
        </ul>`
    </p>
</body>
</html>