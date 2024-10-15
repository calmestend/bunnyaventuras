<x-layout />
<h1>Login</h1>
<form method="post" action="{{ url('api/auth/login') }}">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">

    <button type="submit">Log in</button>
</form>
