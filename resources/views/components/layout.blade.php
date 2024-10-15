<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? "BunnyAventuras" }}</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>

                <form action="{{ url('api/auth/logout') }}" method="post">
                    @csrf
                    <button type="submit">Log out</button>
                </form>
        </ul>
    </nav>
    {{ $slot }}
</body>
</html>

