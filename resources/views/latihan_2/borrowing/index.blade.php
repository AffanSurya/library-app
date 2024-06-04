<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan 2 Borrowing</title>
</head>

<body>
    <h1>Latihan 2 Borrowing</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrowings->groupBy('user.name') as $userName => $userBorrowings)
                <tr>
                    <td>{{ $userName }}</td>

                    <td>
                        @foreach ($userBorrowings as $borrowing)
                            {{ $borrowing->book->title }} <br>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($userBorrowings as $borrowing)
                            <a href="{{ route('borrowing2.edit', $borrowing->id) }}">Edit</a>
                            <form action="{{ route('borrowing2.destroy', $borrowing->id) }}" method="POST"
                                style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form> <br>
                        @endforeach
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
