<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Book</title>
</head>
<body>
    <h1>Add New Book</h1>

    <form action="{{route('books.store')}}" method="post">
    @csrf
    <div>
        <label for="title">Title : </label>
        <input type="text" id="title" name="title" >
    </div>

    <div>
        <label for="author">Author: </label>
        <input type="text" id="author" name="author" >
    </div>

    <div>
        <label for="year">Year: </label>
        <input type="text" id="year" name="year" >
    </div>

    <div>
        <button type="submit">Add</button>
    </div>
    </form>
</body>
</html>