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
                            Inbox Validasi
                        </h3>
                        @if (session('errors'))
                        <div class="col-5 mt-3">
                            <div class="alert alert-danger">
                              {{ session('errors') }}
                            </div>
                        </div>
                        @endif

                        @if ($message = Session::get('success'))
                        <div class="col-3 mt-3">
                            <div class="alert alert-success">
                                <strong class="">{{ $message }}</strong>
                            </div>
                        </div>
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
                                                               @foreach ($pelangganFoto as $pelanggan)
                                                                @if ($pelanggan->status != 'OK' )
                                                                <td>Action</td>
                                                                @endif
                                                                @break
                                                               @endforeach
                                                            </tr>
                                                        </thead>
                        
                                                        <tbody>
                                                            @php
                                                                $no = 1
                                                            @endphp
                                                            @foreach ($pelangganFoto as $pelanggan)
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
                                                                    <td>ODP-{{$pelanggan->area}}/{{ $pelanggan->odp_loc }}</td>
                                                                    <td> <button type="submit">
                                                                        <i class="uil uil-process"></i>
                                                                        Process
                                                                    </button></td>
                                                                    <td>Progress</td>
                                                                    <td>
                                                                        @if (session('bukti_dicek_' . $pelanggan->id))
                                                                            Bukti Sudah Dicek
                                                                        @else
                                                                            <a class="cek-bukti-link" href="/validator/cek/{{$pelanggan->id}}">Cek Bukti</a>
                                                                        @endif
                                                                    </td>
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
                                                               <td>Action</td>
                                                             
                                                        </thead>
                        
                                                        <tbody>
                                                            @php
                                                                $no = 1
                                                            @endphp
                                                           @foreach ($hasilRevisi as $pelanggan)
                                                           
                                                            {{-- @if ($pelanggan->status === 'NOK' ) --}}
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
                                                                <td>ODP-{{$pelanggan->area}}/{{ $pelanggan->odp_loc }}</td>
                                                                <td> <button type="submit">
                                                                    <i class="uil uil-process"></i>
                                                                    Process
                                                                </button></td>
                                                               
                                                                <td>NOK</td>

                                                                
                                                                <td>
                                                                    <a href="{{ route('validator.revisi', ['id'=>$pelanggan->id]) }}">Cek Revisi</a>
                                                                </td>
                                                               
                                                            </tr>
                                                            {{-- @endif --}}
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
    {{-- <script>
        // Mendapatkan semua elemen dengan class "cek-bukti-link"
    var links = document.querySelectorAll('.cek-bukti-link');

    links.forEach(function(link) {
        // Mengecek apakah bukti sudah dicek berdasarkan data-pelanggan-id
        var pelangganId = link.getAttribute('data-pelanggan-id');
        var buktiDicek = {{ session('bukti_dicek_' . $pelangganId) || 'false' }};

        // Jika bukti sudah dicek, ubah teks link menjadi "Bukti Sudah Dicek"
        if (buktiDicek) {
            link.textContent = 'Bukti Sudah Dicek';
            link.removeAttribute('href'); // Menghapus atribut href agar tidak lagi menjadi link
        }
    });

      </script> --}}
      
</body>
</html>