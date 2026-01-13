<form method="POST" action="/admin/login">
    @csrf
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>

@if(session('error'))
<p>{{ session('error') }}</p>
@endif
