<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>
<body>

    <h1>Edit Book</h1>

    <!-- Form for editing a book -->
    <form action="{{ route('updateBook', ['id' => $book->id]) }}" method="post">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $book->title }}" required>
        <br>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="{{ $book->description }}" required>
        <br>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" value="{{ $book->author }}" required>
        <br>
        
        <button type="submit">Update</button>
    </form>

</body>
</html>
