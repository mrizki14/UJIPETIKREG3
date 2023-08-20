<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Export</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th rowspan="2" style="text-align: center;">AREA / WITEL</th>
                <th colspan="5">UJI PETIK PSB</th>
                <th rowspan="2">UPLOAD</th>
                <th rowspan="2">VALID</th>
            </tr>
            <tr>
                <th>JUMLAH</th>
                <th>OK</th>
                <th>NOTOK</th>
                <th>TARGET</th>
                <th>HASIL</th>                                              
            </tr>
          </thead>
        <tbody>
            @foreach($finalResults as $result)
                <tr>
                    <td style="text-align: center;">{{ $result['AREA / WITEL'] }}</td>
                    <td style="text-align: center;">{{ $result['JUMLAH'] }}</td>
                    <td style="text-align: center;">{{ $result['OK'] }}</td>
                    <td style="text-align: center;">{{ $result['NOTOK'] }}</td>
                    <td style="text-align: center;">{{ $result['TARGET'] }}</td>
                    <td style="text-align: center;">{{ $result['HASIL %'] }}</td>
                    <td style="text-align: center;">{{ $result['UPLOAD %'] }}</td>
                    <td style="text-align: center;">{{ $result['VALID %'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
