<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Management!</title>




</head>

<body>

    <h1>Welcome to Book Management Section!</h1>
    <h1>current user is </h1>
    <h1>{{ Auth::user()->name }}</h1>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button>logout</button>
    </form>

    <h1>Add Book</h1>
    <form action="{{ route('createBook') }}" method="post">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <br>

        <label for='description'>Description:</label>
        <input type="text" id="description" name="description" required>
        <br>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required>
        <br>
        <button type="submit">submit</button>
    </form>

    <h2>Your Books</h2>
    @if ($books->isEmpty())
        <p>No books available yet.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Author</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->author }}</td>
                        <td>
                            <a href="{{ route('editBook', ['id' => $book->id]) }}">Edit</a>
                            <form action="{{ route('delete', ['id' => $book->id]) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif













    <h1></h1>

</body>

</html>