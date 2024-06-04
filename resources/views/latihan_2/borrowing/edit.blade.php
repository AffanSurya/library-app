<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>

    <form action="{{route('books.update', $book->id)}}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title : </label>
        <input type="text" id="title" name="title" value="{{$book->title}}">
    </div>

    <div>
        <label for="author">Author: </label>
        <input type="text" id="author" name="author" value="{{$book->author}}">
    </div>

    <div>
        <label for="year">Year: </label>
        <input type="text" id="year" name="year" value="{{$book->year}}">
    </div>

    <div>
        <button type="submit">Update</button>
    </div>
    </form>
</body>
</html>