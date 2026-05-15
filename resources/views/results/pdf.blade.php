<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>Hasil Voting</title>

    <style>
        body {
            font-family: sans-serif;
            padding: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            color: gray;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        table th {
            background: #4f46e5;
            color: white;
        }

        .total {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h1>
        HASIL VOTING EVOTINGEASY
    </h1>

    <p>
        Sistem E-Voting Mahasiswa
    </p>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Ketua</th>
                <th>Wakil</th>
                <th>Total Vote</th>
            </tr>
        </thead>

        <tbody>

            @foreach($candidates as $candidate)

                <tr>
                    <td>{{ $candidate->nomor_urut }}</td>

                    <td>{{ $candidate->nama_ketua }}</td>

                    <td>{{ $candidate->nama_wakil }}</td>

                    <td>{{ $candidate->votes_count }}</td>
                </tr>

            @endforeach

        </tbody>

    </table>

    <div class="total">
        Total Semua Vote: {{ $totalVotes }}
    </div>

</body>

</html>