<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? "BunnyAventuras"}}</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/auth/login">Log in</a></li>
            <li><a href="/auth/register">Sign up</a></li>
        </ul>
    </nav>
    {{ $slot }}
</body>
</html>
