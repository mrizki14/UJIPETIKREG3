<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validator Revisi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" /> 
    <link rel="stylesheet" href="{{asset('assets/css/petugas1.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/layets.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/sass.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
    @include('templates.nav')
    @include('templates.side')

    <div class="content-wrapper">
        <section class="dashboard-top-sec">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="table-responsive top-chart-earn sticky-top">
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
                                      
                                      @if ($message = Session::get('success'))
                                      <div class="col">
                                          <div class="alert alert-success">
                                              <strong class="">{{ $message }}</strong>
                                          </div>
                                      </div>
                                      @endif
                                      
                                        <table class="table-condensed">
                                          <tbody>
                                            @foreach ($pelanggans as $pelanggan)
                                            
                                            <input type="hidden" name="order_id" id="order_id" value="">
                                            <tr>
                                            <th style="vertical-align: middle;" width="1%" nowrap="">
                                                NOMER SC</th>
                                            <th style="vertical-align: middle;" width="1%" nowrap="">:
                                            </th>
                                            <td colspan="2"> 123456   </td>
                                            </tr>
                                            <tr>
                                            <th style="vertical-align: middle;" width="1%" nowrap="">INET
                                            </th>
                                            <th style="vertical-align: middle;" width="1%" nowrap="">:
                                            </th>
                                            <td colspan="2">  1231234 </td>
                                            </tr>
                                            <tr>
                                            <th style="vertical-align: middle;" width="1%" nowrap="">NAMA
                                            </th>
                                            <th style="vertical-align: middl;" width="1%" nowrap="">:
                                            </th>
                                            <td colspan="2">  {{$pelanggan->pelanggan->nama}}   </td>
                                            </tr>
                                            <tr>
                                            <th style="vertical-align: middle;" width="1%" nowrap="">
                                                NO HP</th>
                                            <th style="vertical-align: middle;" width="1%" nowrap="">:
                                            </th>
                                            <td colspan="2">  {{$pelanggan->pelanggan->kontak}}  </td>
                                            </tr>
                                            <tr>
                                            <th style="vertical-align: middle;" width="1%" nowrap="">
                                                ALAMAT</th>
                                            <th style="vertical-align: middle;" width="1%" nowrap="">:
                                            </th>
                                            <td colspan="2">  {{$pelanggan->pelanggan->location}} </td>
                                            </tr>
                                            <tr>
                                            <th style="vertical-align: middle;" width="1%" nowrap="">AREA
                                            </th>
                                            <th style="vertical-align: middle;" width="1%" nowrap="">:
                                            </th>
                                            <td colspan="2"> @foreach ($areas as $key => $item)
                                                {{$pelanggan->pelanggan->area == $key ? $item  : '' }}
                                                @endforeach - {{$pelanggan->pelanggan->area}} <br>   </td>
                                            </tr>
                                            <tr>
                                            <th style="vertical-align: middle;" width="1%" nowrap="">
                                                LOC_ID</th>
                                            <th style="vertical-align: middle;" width="1%" nowrap="">:
                                            </th>
                                            <td colspan="2"> ODP-BDG-BJS/123 </td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                            
                                      
                                    </div>
                                </div>
                  
                            <div class="col-lg-8">
                                <div class="table-responsive table-cs">
                                    @foreach ($pelanggans as $pelanggan)
                                        <div class="col">
                                            <div class="alert alert-success">
                                                <strong class="">Catatan Petugas: {{ $pelanggan->catatan }}</strong>
                                                <p>{{ $pelanggan->time_diff }}</p>
                                            </div>
                                        </div>        
                                        @break
                                        @endforeach
                                    <h6>Wajib di ceklist isi semua !</h6>
                                    @foreach ($pelanggans as $index => $foto)
                                    <form action="{{route('validator.revisi.update', $foto->id) }}" method="post">
                                      @csrf
                                      @method('PATCH')
                                      <table class="table table-condensed table-striped" style="color:#000000">
                                        
                                        <tbody>
                                    
                                           
                                            <div class="kolom 1">
                                            <tr>
                                              <th style="color:red;" width="1%" nowrap="">CHEKLIST ODP </th>
                                              <th width="1%" nowrap="">:</th>
                                            </tr>
                                            <tr>
                                              <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">{{ $odpDescriptions[$foto->odp] }}</td>
                                              <td style="vertical-align: middle !important;" width="1%">:</td>
                                              <td style="vertical-align: middle;width:100px;">
                                                <div class="radio">
                                                  <label>
                                                    <input type="checkbox" name="status" value="OK">
                                                    <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                      OKE
                                                    </div>
                                                  </label>
                                                </div>
                                                <div class="radio">
                                                  <label>
                                                    <input type="checkbox" name="status" value="NOK" checked>
                                                    <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                      NOK
                                                    </div>
                                                  </label>
                                                </div>
                                              </td>
                                              <td style="vertical-align: middle !important;">
                                            
                                                <font size="1">NOK</font>
                                              
                                              </td>
                                              
                                              <td style="vertical-align: middle;">
                                                <div class="pull-right">
                                                        <img src="{{ asset('storage/images/' . $foto->file) }}" alt="Foto Pelanggan" width="150px" class="img-thumbnail">
                                                     
                                                </div>
                                              </td>
                                              @endforeach
                                            </tr>
                                            </tr>
                                        </div>
                                        
                                        <div class="validator">
                                          <tr>
                                            <th style="color:red;" width="1%" nowrap="">VALIDATOR</th>
                                            <th width="1%">:</th>
                                            <td colspan="3">
                                              <input type="text" class="fc1 input-sm" value="Telkom University" disabled=""></td>
                                          </tr>
                                          <tr>
                                            <th style="color:red;" width="1%" nowrap="">CATATAN</th>
                                            <th width="1%">:</th>
                                            <td colspan="3">
                                              <div class="image-upload">
                                                <textarea name="catatan_keseluruhan" placeholder="catatan..." style="width: 100%; font-size:12px;" class="fc-catatan  input-sm"></textarea>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <th style="color:red;" width="1%" nowrap=""></th>
                                            <th width="1%"></th>
                                            <td colspan="3">
                                              <a href="$">
                                                  <input class="btn-custom btn-primary" type="submit" value="Update Progress">
                                              </a>
                                            </td>
                                          </tr>
                                        </div>
                                            <!-- kolom 1 -->
                                            
                                            
                                      
                                        </tbody>
                                      </table>
                                    </form>
                                  
                                  </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="https://kit.fontawesome.com/e360b5871d.js" crossorigin="anonymous"></script>
</body>
</html>