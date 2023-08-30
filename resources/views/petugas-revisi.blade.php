<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                                   
                                    @if($errors->any())
                                    <div class="col">
                                        <div class="alert alert-danger"> 
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{  $error  }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
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
                                      <input type="hidden" name="order_id" id="order_id" value="">
                                      <tr>
                                        <th style="vertical-align: middle;" width="1%" nowrap="">
                                          NOMER SC</th>
                                        <th style="vertical-align: middle;" width="1%" nowrap="">:
                                        </th>
                                        <td colspan="2"> {{ $pelanggans->number }}   </td>
                                      </tr>
                                      <tr>
                                        <th style="vertical-align: middle;" width="1%" nowrap="">INET
                                        </th>
                                        <th style="vertical-align: middle;" width="1%" nowrap="">:
                                        </th>
                                        <td colspan="2">  {{ $pelanggans->inet }} </td>
                                      </tr>
                                      <tr>
                                        <th style="vertical-align: middle;" width="1%" nowrap="">NAMA
                                        </th>
                                        <th style="vertical-align: middl;" width="1%" nowrap="">:
                                        </th>
                                        <td colspan="2">  {{$pelanggans->nama}}   </td>
                                      </tr>
                                      <tr>
                                        <th style="vertical-align: middle;" width="1%" nowrap="">
                                          NO HP</th>
                                        <th style="vertical-align: middle;" width="1%" nowrap="">:
                                        </th>
                                        <td colspan="2">  {{$pelanggans->kontak}}  </td>
                                      </tr>
                                      <tr>
                                        <th style="vertical-align: middle;" width="1%" nowrap="">
                                          ALAMAT</th>
                                        <th style="vertical-align: middle;" width="1%" nowrap="">:
                                        </th>
                                        <td colspan="2">  {{$pelanggans->location}} </td>
                                      </tr>
                                      <tr>
                                        <th style="vertical-align: middle;" width="1%" nowrap="">AREA
                                        </th>
                                        <th style="vertical-align: middle;" width="1%" nowrap="">:
                                        </th>
                                        <td colspan="2"> @foreach ($areas as $key => $item)
                                            {{$pelanggans->area == $key ? $item  : '' }}
                                            @endforeach - {{$pelanggans->area}} <br>   </td>
                                      </tr>
                                      <tr>
                                        <th style="vertical-align: middle;" width="1%" nowrap="">
                                          LOC_ID</th>
                                        <th style="vertical-align: middle;" width="1%" nowrap="">:
                                        </th>
                                        
                                        <td colspan="2"> ODP-{{ $pelanggans->area }}/{{ $pelanggans->odp_loc }} </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              {{-- <tr>
                                  @foreach ($images as $image)
                                    <img src="{{ asset('storage/images/' . $image->file) }}" alt="Image">
                                    @endforeach
                                </tr> --}}
                              <div class="col-lg-8">
                                {{-- @foreach ($pelanggans as $pelanggan) --}}
                                    
                                <div class="table-responsive table-cs">
        
                                <table class="table table-condensed table-striped" style="color:#000000">
                                @foreach ($pelanggans->fotos as $pelanggan)
                                <div class="col">
                                    <div class="alert alert-danger">
                                        <strong class="">Catatan validator: {{ $pelanggan->catatan_keseluruhan }}</strong>
                                        <p>{{ $pelanggan->time_diff }}</p>
                                    </div>
                                </div>        
                                @break
                                @endforeach
                                  <tbody>
                                      <div class="validator">
                                          <tr>
                                              <th width="1%" nowrap="">PETUGAS</th>
                                              <th width="1%">:</th>
                                              <td colspan="3">
                                              <input type="text" class="fc1 input-sm" value= "{{Auth()->user()->name}}" disabled=""></td>
                                              <tr>
                                                <th style="font-size: 14px" width="40%">Pastikan tidak akan ada revisi lagi !</th>
                                            </tr>
                                            </tr>
                                        </div>
                      
                                    <div class="kolom 1">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th style="color: red;"  nowrap="">REVISI ODP :</th>
                                                {{-- <th  nowrap="">:</th> --}}
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <form action="{{ route('petugas.update', $pelanggans->id) }}" method="post" enctype="multipart/form-data">
                                                        @php
                                                            $no = 1;
                                                        @endphp
                                                        @foreach ($pelanggans->fotos as $index => $foto)
                                                            @csrf      
                                                            @method('PUT') 
                                                            @if ($foto->status === 'NOK')
                                                                <div class="form-group">
                                                                    <div class="col-md-3">
                                                                        <p class="col-form-label">{{ $no++ }}. {{ isset($odpDescriptions[$foto->odp]) ? $odpDescriptions[$foto->odp] : 'Kode ODP: ' . $foto->odp }}</p>
                                                                    </div>
                                                                    <div class="col-md-6 ms-5">
                                                                        <div class="input-group">
                                                                            {{-- <input type="hidden" name="status_revisi" value="Dikirimkan"> --}}
                                                                            <textarea class="form-control" name="catatan_{{ $foto->id }}" placeholder="Leave a comment here" id="floatingTextarea" required></textarea>
                                                                            <div class="input-group-append">
                                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal1{{ $foto->id }}">
                                                                                    <i class="fa fa-plus-circle"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="status_revisi_{{ $foto->id }}" value="DIKIRIMKAN">
                                                                </div>
                                                          
                                    
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal1{{ $foto->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">UPLOAD</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">

                                                                                    <div class="form-group">
                                                                                        <label for="" class="col-md-2 control-label">Berkas</label>
                                                                                        <div class="col-md-10 ms-3">
                                                                                            <input type="file" name="file_{{ $foto->id }}" accept="image/*"area-required="true" required>
                                                                                            <p class="help-block">
                                                                                                <em>File extension jpg, jpeg, or png</em>
                                                                                            </p>
                                                                                            <hr class="inner">
                                                                                            <div class="form-group d-flex justify-content-lg-center">
                                                                                                {{-- <button class="btn btn-primary" type="submit">
                                                                                                    <i class="fa fa-check-circle"></i>
                                                                                                    Submit
                                                                                                </button> --}}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">SIMPAN</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                        <button class="btn-primary" type="submit">Add revisi</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    
                                    {{-- <tr>
                                      <th style="color:red;" width="1%" nowrap=""></th>
                                      <th width="1%"></th>
                                      <td colspan="3">
                                          <input class="btn-custom btn-primary" type="submit" name="add_progress" value="Update Progress">
                                      </td>
                                    </tr>           --}}
                                    </tbody>
                                </form>
                            </table>
                                </div>
                                {{-- @endforeach --}}
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