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
            </tr>
        </thead>
        <tbody>
            @foreach ($borrowers as $borrower)
                <tr>
                    <td>{{ $borrower->user->name }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
