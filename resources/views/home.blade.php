<x-layout />
<h1>Home</h1>
<form action="{{ url('api/post') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="title">Title</label>
    <input type="text" name="title" id="title">
    <input type="hidden" id="user_id" name="user_id" value="1">
    <input type="hidden" id="category_id" name="category_id" value="1">

    <br>
    <label for="body">Content</label>
    <textarea name="body" id="body"></textarea>
    <br>
    <label for="photo">Photo</label>
    <input type="file" name="photo" id="photo">
    <br>
    <button type="submit">Submit</button>
</form>

<section class="posts">
    @if ($posts->isEmpty())
        <p>No posts available</p>
    @else
        @foreach ($posts as $post)
            <div class="post">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->body }}</p>
                @if ($post->photo)
                    <img src="{{ asset('storage/'.$post->photo) }}" alt="Post Image" />
                @endif

                <h3>Comments</h3>
                @if ($post->comments->isEmpty())
                    <p>No comments available</p>
                @else
                    <ul>
                        @foreach ($post->comments as $comment)
                            <li>
                                <strong>User {{ $comment->user_id }}:</strong> {{ $comment->content }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <hr>
        @endforeach
    @endif
</section>

