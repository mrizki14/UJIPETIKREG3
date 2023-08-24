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
    <link rel="stylesheet" href="assets/css/style.css">
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
                @if(!empty($errors))
                    @if($errors->any())
                    <div class="col-6">
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
                @if ($message = Session::get('success'))
                <div class="col-5">
                    <div class="alert alert-success">
                        <strong class="">{{ $message }}</strong>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="order-list">
                            <div class="order-ac-list">
                                <div class="panel-heading">
                                    <div class="panel-tittle">
                                        <b>Data Pelanggan</b>
                                    </div>
                                </div>

                                    <form action="" method="get">
                                        <div class="form-group">
                                        <label for="" style="">Periode</label>
                                        <div class="bulan">
                                            <select class="form-cs" name="month">
                                                @foreach($months as $key => $month)
                                                <option value="{{ $key }}" {{ $key == $selectedMonth ? 'selected' : '' }}>{{ $month }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                        
                                        <div class="tahun">
                                            <select class="form-cs" name="year">
                                                @foreach($years as $year)
                                                    <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                       
                                        <div class="tombol">
                                            <button type="submit" name="filter" class="button">
                                                <i class="uil uil-setting"></i>
                                                Filter
                                            </button>
                                        </div>
                                    </form> 
                                    
                                    <!-- Modal -->
                                    
                                            <button type="button" class="btn btn-primary btn-sm w-25" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="uil uil-plus"></i>
                                                Data Pelanggan
                                            </button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        <i class="uil uil-plus-circle"></i>
                                                        Data Pelanggan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('pelanggan.store')}}" method="POST">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">AREA</label>
                                                                <select class="form-select form-select-sm" name="area" id="area_pertama">
                                                                    <option hidden>Pilih area</option>
                                                                    @foreach ($areas as $key => $area)
                                                                    <option value="{{ $key }}">{{ $area }}</option>
                                                                    @endforeach
                                                                    {{-- <option value="BDG">BANDUNG</option>
                                                                    <option value="BDG">BANDUNG BARAT</option>
                                                                    <option value="CRB">CIREBON</option>
                                                                    <option value="KRW">KARAWANG</option>
                                                                    <option value="SKB">SUKABUMI</option>
                                                                    <option value="TSM">TASIMALAYA</option> --}}
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">CODE AREA</label>
                                                                {{-- <fieldset disabled="disabled"> --}}
                                                                    <select class="form-select form-select-sm" id="area_kedua" disabled>
                                                                        <option value="">Code Area</option>
                                                                        {{-- <option value="" selected>BDG</option>
                                                                        <option value="BDG">BDG</option>                    
                                                                        <option value="CRB">CRB</option>
                                                                        <option value="KRW">KRW</option>
                                                                        <option value="SKB">SKB</option>
                                                                        <option value="TSM">TSM</option> --}}
                                                                    </select>
                                                                {{-- </fieldset> --}}
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Pelanggan</label>
                                                                <input type="text" name="nama" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputPassword1" class="form-label">Kontak</label>
                                                                <input type="number" name="kontak" class="form-control">
                                                                </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputPassword1" class="form-label">Location</label>
                                                                <input type="text" name="location" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputPassword1" class="form-label">ODP_LOC</label>
                                                                <input type="text" name="odp_loc" class="form-control">
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                  </div>
                                              </div>
                                              </div>
                                            </div>
                                           

                                      </div>
                                    </div>
                                <div class="data-table-section table-responsive">
                                    <table id="example" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <td>NO</td> 
                                                <td>AREA</td> 
                                                <td>ORDER_ID</td> 
                                                <td>NAMA PELANGGAN</td> 
                                                <td>LOC_ID</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1
                                            @endphp
                                            @foreach ($pelanggans as $pelanggan)
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
                                            </tr>
                                            @endforeach
                                            {{-- <tr>
                                                <td>2</td>
                                                <td>
                                                    BANDUNG <br> 
                                                <span class="label">BDG</span>
                                                </td>
                                                <td>SC.123487
                                                    <small>(/12345)</small><br>
                                                    <span class="label-sales">NEW SALES</span>
                                                    <span class="label-tanggal">13-JUL-2023</span>
                                                </td>
                                                <td>AGUNG (+62-123456) <br> JALAN TELEKOMUNIKASI NO.1</td>
                                                <td>ODP-{{$pelanggan->area}}/123</td>
                                            </tr> --}}
                                                
                                        </tbody>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot> -->
                                    </table>
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
    
    <script>
            // Menggunakan JavaScript untuk mengatur opsi pada select kedua berdasarkan pilihan select pertama
            document.getElementById('area_pertama').addEventListener('change', function() {
                var selectedValue = this.value;
                var areaKeduaSelect = document.getElementById('area_kedua');
                
                // Mengosongkan dan menonaktifkan select kedua jika tidak ada pilihan dipilih
                if (!selectedValue) {
                    areaKeduaSelect.innerHTML = '<option value="">Pilih Code Area</option>';
                    areaKeduaSelect.disabled = true;
                    return;
                }

                // Mengaktifkan select kedua dan mengisi opsi berdasarkan pilihan select pertama
                areaKeduaSelect.disabled = true;
                var options = [];
                switch (selectedValue) {
                    case 'BDG':
                        options += '<select disabled="disabled"><option disable value="BDG">BDG</option></select';
                        break;
                    case 'BGB':
                        options += '<select disabled="disabled"><option disable value="BGB">BGB</option></select';
                        break;
                    case 'CRB':
                        options += '<select disabled="disabled"><option disable value="CRB">CRB</option></select';
                        break;
                    case 'KRW':
                        options += '<select disabled="disabled"><option disable value="KRW">KRW</option></select';
                        break;
                    case 'SKB':
                        options += '<select disabled="disabled"><option disable value="SKB">SKB</option></select';
                        break;
                    case 'TSM':
                        options += '<select disabled="disabled"><option disable value="TSM">TSM</option></select';
                        break;
                }
                areaKeduaSelect.innerHTML = options;
            });
    </script>
</body>
</html>
