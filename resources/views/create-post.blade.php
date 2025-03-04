<h3>Create a New Post</h3>
<form action="{{ route('create-post') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" id="title" placeholder="Type the title" class="form-control">
    <br>
    <textarea name="body" id="body" placeholder="body content..." class="form-control"></textarea>
    <br>
    <input type="file" name="image" id="image" class="form-control">
    <br>
    <button class="btn btn-primary" type="submit">Save post</button>
</form>
</div>
