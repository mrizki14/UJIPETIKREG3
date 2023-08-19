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
    <link rel="stylesheet" href="assets/css/validasi.css">
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
                        <h3>
                            <i class="uil uil-inbox"></i>
                            Inbox Petugas
                        </h3>
                        @if(!empty($errors))
                        @if($errors->any())
                        <div class="col">
                            <div class="alert alert-danger"> 
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{!! $error !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                      @endif
                        <div class="bg-white top-chart-earn">
                            <div class="col-sm-12 my-2 ps-0">
                                    <div class="classic-tabs ms-2">
                                        <div class="tabs-wrapper">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <b>Detail Order :</b>
                                            </div>
                                            <ul class="nav nav-pills chart-header-tab mb-3" id="pills-tab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a href="#" class="nav-link chart-nav active" id="pills-validasi-tab" data-bs-toggle="pill" data-bs-target="#pills-validasi" type="button" role="tab" aria-controls="pills-validasi" aria-selected="true">
                                                            Validator
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                      <a href="#" class="nav-link chart-nav" id="pills-reopen-tab" data-bs-toggle="pill" data-bs-target="#pills-reopen" type="button" role="tab" aria-controls="pills-reopen" aria-selected="false">
                                                        Re-open
                                                    </a>
                                                    </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                            
                                            {{-- @foreach ($revisiData as $data)
                                            <div class="col">
                                                <div class="alert alert-danger">
                                                    <strong class="">Catatan validator: {{ $data['catatan_keseluruhan'] }}</strong>
                                                    <p>{{ $data['selisih_waktu'] }}</p>
                                                </div>
                                            </div>   
                                            @break
                                            @endforeach --}}
                                            
                                                <div class="table-responsive tab-pane fade show active" id="pills-validasi" role="tabpanel" aria-labelledby="pills-validasi-tab">
                                                    <table id="example" class="table table-striped table-hover" style="width:100% ;">
                                                        <thead>
                                                            <tr>
                                                               <td>NO</td> 
                                                               <td>AREA</td> 
                                                               <td>ORDER_ID</td> 
                                                               <td>NAMA PELANGGAN</td> 
                                                               <td>LOC_ID</td> 
                                                               <td>##</td>
                                                               <td>STATUS</td>
                                                               <td>action</td>
                                                            </tr>
                                                        </thead>
                        
                                                        <tbody>
                                                            @php
                                                            $no = 1
                                                        @endphp
                                                        @foreach ($pelanggansIndex as $pelanggan)
                                                        <tr>
                                                            <td>{{$no++}}</td>
                                                            <td>
                                                                @foreach ($areas as $key => $item)
                                                                        {{$pelanggan->area == $key ? $item  : '' }}
                                                                        @endforeach <br> 
                                                            <span class="label">{{$pelanggan->area}}</span>
                                                            </td>
                                                            <td>SC.{{ $pelanggan->number }}
                                                                <small>(/{{ $pelanggan->inet }})</small><br>
                                                                <span class="label-sales">NEW SALES</span>
                                                                <span class="label-tanggal">{{ $pelanggan->created_at_formatted }}</span>
                                                            </td>
                                                            <td>{{$pelanggan->nama}} ({{$pelanggan->kontak}}) <br> {{$pelanggan->location}}</td>
                                                            <td>ODP-{{$pelanggan->area}}/123</td>
                                                            <td> <button type="submit">
                                                                <i class="uil uil-process"></i>
                                                                Process
                                                            </button></td>
                                                            <td>Open</td>
                                                            @if ($pelanggan->fotos->count() >=28 )
                                                            <td>Bukti sudah terupload</td>
                                                            @elseif($pelanggan->fotos->count() <=28 )
                                                            <td>
                                                                <a href="/petugas/add/{{$pelanggan->id}}">Add Bukti</a>
                                                            </td>
                                                            @endif
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="pills-reopen" role="tabpanel" aria-labelledby="pills-reopen-tab">
                                                    <table id="example" class="table table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                               <td>NO</td> 
                                                               <td>AREA</td> 
                                                               <td>ORDER_ID</td> 
                                                               <td>NAMA PELANGGAN</td> 
                                                               <td>LOC_ID</td> 
                                                               <td>##</td> 
                                                               <td>STATUS</td> 
                                                               <td>action</td>
                                                            </tr>
                                                        </thead>
                        
                                                        <tbody>
                                                            @php
                                                                $no = 1
                                                            @endphp
                                                       
                                                            @foreach ($pelanggansRevisi as $pelanggan)
                                                                    <tr>
                                                                        <td>{{$no++}}</td>
                                                                        <td>
                                                                            @foreach ($areas as $key => $item)
                                                                                    {{$pelanggan->area == $key ? $item  : '' }}
                                                                                    @endforeach <br> 
                                                                        <span class="label">{{$pelanggan->area}}</span>
                                                                        </td>
                                                                        <td>SC.{{ $pelanggan->number }}
                                                                            <small>(/{{ $pelanggan->inet }})</small><br>
                                                                            <span class="label-sales">NEW SALES</span>
                                                                            <span class="label-tanggal">{{ $pelanggan->created_at_formatted }}</span>
                                                                        </td>
                                                                        <td>{{$pelanggan->nama}} ({{$pelanggan->kontak}}) <br> {{$pelanggan->location}}</td>
                                                                        <td>ODP-{{$pelanggan->area}}/123</td>
                                                                        <td> <button type="submit">
                                                                            <i class="uil uil-process"></i>
                                                                            Process
                                                                        </button></td>
                                                                        @foreach ($pelanggan->fotos as $foto)
                                                                            @if ($foto->status === 'NOK')
                                                                                <td>{{ $foto->status }}</td>
                                                                                @endif
                                                                                @break
                                                                                @endforeach
                                                                        <td>
                                                                            <a href="{{ route('petugas.revisi', ['id'=>$pelanggan->id]) }}">Edit Bukti</a>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                             @endforeach
                                                                    
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
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
</html>