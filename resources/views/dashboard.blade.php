<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" /> 
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="assets/css/layets.css">
    <link rel="stylesheet" href="assets/css/sass.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="assets/css/cdntable.css".css"> 
    <link rel="stylesheet" href="assets/css/cdntablebs.css".css"> 
</head>
<body>
    @include('templates.nav')
    @include('templates.side')
    <div class="content-wrapper">
        <section class="dashboard-top-sec">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="order-list">
                            <div class="order-ac-list">
                                <div class="panel-heading">
                                    <div class="panel-tittle">
                                        <b>Dashboard Ujipetik Regional 3</b>
                                    </div>
                                </div>
                                
                                <form action="/" method="get">
                                    <div class="form-group">
                                        <label for="" style="">Periode :</label>
                                        <div class="bulan">
                                            <select class="form-cs" name="month">
                                                @foreach ($months as $key => $monthName)
                                                <option value="{{ $key }}" {{ $key == $month ? 'selected' : '' }}>
                                                    {{ $monthName }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>                     
                                        <div class="tahun">
                                            <select class="form-cs" name="year">
                                            @foreach ($years as $key => $yearOption)
                                            <option value="{{ $key }}" {{ $key == $year ? 'selected' : '' }}>
                                                {{ $yearOption }}
                                            </option>
                                            @endforeach
                                            </select>
                                        </div>                     
                                        <div class="tombol">
                                            <button type="submit" class="button">
                                                <i class="uil uil-setting"></i>
                                                Filter
                                            </button>                               
                                            
                                            <a href="{{ route('export.excel',['month' => $month, 'year' => $year]) }}" class="btn btn-lg btn-success">
                                                Export Excel
                                            </a> 
                                        </div>
                                    </div>
                                </form> 
                               
                                <div class="data-table-section table-responsive">
                                    <table class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="width: 300px;">AREA / WITEL</th>
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
                                            @if ($todayResults->isEmpty() && !$finalResults)
                                            <tr>
                                                <td style="text-align: center;">0</td>
                                                <td style="text-align: center;">0</td>
                                                <td style="text-align: center;">0</td>
                                                <td style="text-align: center;">0</td>
                                                <td style="text-align: center;">0</td>
                                                <td style="text-align: center;">0</td>
                                                <td style="text-align: center;">0</td>
                                                <td style="text-align: center;">0</td>
                                            </tr>
                                            @else
                                            @foreach ($finalResults as $result)
                                            <tr>
                                                <td>{{ $result['area_name'] }}</td>
                                                <td style="text-align: center;">{{ $result['total_pelanggan']}}</td>
                                                <td style="text-align: center;">{{ $result['total_ok'] }}</td>
                                                <td style="text-align: center;">{{ $result['total_nok']}}</td>
                                                <td style="text-align: center;">75</td>
                                                <td style="text-align: center;">{{ number_format(($result['total_ok'] / 75) * 100, 0) . '%' }}
                                                </td>
                                                {{-- <td style="text-align: center;">{{ $result['total_ok'] > 0 ? number_format(($result['total_pelanggan'] / $result['total_ok']) * 100, 0) . '%' : '0%' }}</td> --}}
                                                
                                                <td style="text-align: center;">{{ number_format($result['upload_percentage'], 0) }}%</td>
                                                <td style="text-align: center;">{{ number_format($result['valid_percentage'], 0) }}%</td>
                                            </tr>
                                            @endforeach
                                            @endif
                                          </tbody>
                                    </table>
                                   
                                    <div class="earn">
                                       <h2>Note :</h2>
                                       <p>Hasil : JUMLAH / OK %</p>
                                       <p>UPLOAD :  OK + NOK / TARGET % </p>
                                       <p>VALID : UPLOAD + TARGET %</p>
                                    </div>
                                </div>
                            
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/e360b5871d.js" crossorigin="anonymous"></script>
</body>
</html>y