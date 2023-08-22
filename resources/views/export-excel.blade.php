<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJI PETIK REGIONAL 3</title>
 
</head>
<body>
    <table>
        <thead>
            <tr>
                <td rowspan="2" colspan="10" style="padding-bottom: 20px;">UJI PETIK REGIONAL 3</td>
            </tr>
            <tr>
                <td><br></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="3">Periode: </td>
                <td>{{ $month }}</td>
                <td>{{ $year }}</td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <th rowspan="2" colspan="3">AREA / WITEL</th>
                <th colspan="5">UJI PETIK PSB</th>
                <th rowspan="2">UPLOAD %</th>
                <th rowspan="2">VALID %</th>
            </tr>
            <tr>
                <th>JUMLAH</th>
                <th>OK</th>
                <th>NOTOK</th>
                <th>TARGET</th>
                <th>HASIL %</th>                                              
            </tr>
          </thead>
        <tbody>
            @foreach($finalResults as $result)
                <tr>
                    <td colspan="3">{{ $result['AREA / WITEL'] }}</td>
                    <td >{{ $result['JUMLAH'] }}</td>
                    <td >{{ $result['OK'] }}</td>
                    <td >{{ $result['NOTOK'] }}</td>
                    <td >{{ $result['TARGET'] }}</td>
                    <td >{{ $result['HASIL %'] }}</td>
                    <td >{{ $result['UPLOAD %'] }}</td>
                    <td >{{ $result['VALID %'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
