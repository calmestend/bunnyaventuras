<x-layout />
<h1>Home</h1>
<form action="{{ url('api/post') }}" method="post">
    <label for="title">Title</label>
    <input type="text" name="title" id="title">
    <br>
    <label for="body">Content</label>
    <textarea name="body" id="body"></textarea>
    <br>
    <label for="photo">Photo</label>
    <input type="file" name="photo" id="photo">
    <br>
    <button type="submit">Submit</button>
</form>
