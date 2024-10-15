<x-layout />
<h1>Sign up</h1>
<form method="post" action="{{ url('api/auth/register') }}">
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <br>

    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <br>

    <label for="password">Password</label>
    <input type="password" name="password" id="password">

    <button type="submit">Register</button>
</form>


