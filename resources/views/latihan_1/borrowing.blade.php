<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan 1 Borrower</title>
</head>

<body>
    <h1>Latihan 1 Borrower</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrowings->groupBy('user.name') as $userName => $userBorrowings)
                <tr>
                    <td>{{ $userName }}</td>
                    <td>
                        @foreach ($userBorrowings as $borrowing)
                            {{ $borrowing->book->title }}<br>
                        @endforeach
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
