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
    <style>
        .hidden-form {
            display: none;
        }
    </style>
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
                                
                                    {{-- @if(!empty($errors)) --}}
                            
                                    {{-- @endif --}}
                                 
                                    {{-- @if (count($messages) > 0)
                                    <div class="col">
                                        <div class="alert alert-success">
                                            <ul>
                                                @foreach ($messages as $message)
                                                    <li>{{ $message }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    @endif --}}
                                 
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
                                        <td colspan="2">ODP-{{ $pelanggans->area }}/{{ $pelanggans->odp_loc }} </td>
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
                                    
                                    @if (session('error'))
                                    <div class="alert alert-danger">
                                      {{ session('error') }}
                                    </div>
                                    @endif
                                  
                                        <table class="table table-condensed table-striped" style="color:#000000">
                             
                                  <tbody>
                                    {{-- @if ($message = Session::get('success'))
                                    <div class="col">
                                        <div class="alert alert-success">
                                            <strong class="">{{ $message }}</strong>
                                        </div>
                                    </div>
                                    @endif --}}
                                    {{-- @if($errors->any())
                                    <div class="col">
                                        <div class="alert alert-danger"> 
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{!! $error !!}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    @endif --}}
                                      <div class="validator">
                                          <tr>
                                              <th width="1%" nowrap="">PETUGAS</th>
                                              <th width="1%">:</th>
                                              <td colspan="3">
                                              <input type="text" class="fc1 input-sm" value= "{{ Auth()->user()->name }}" disabled=""></td>
                                            </tr>
                                          
                                            <th style="font-size: 14px" width="1%">Pastikan mengisinya berurutan !</th>
                                      </div>
                                      <!-- kolom 1 -->
                                      <div class="kolom 1">
                                          <tr>
                                          <th style="color:red;" width="1%" nowrap="">CHEKLIST ODP </th>
                                          <th width="1%" nowrap="">:</th>
                                          </tr>
  
                                        <tr>
                                            <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">1. Konektor dan Adapter tipe SC-UPC</td>
                                            <td style="vertical-align: middle !important;">:</td>                    
                                            <td style="vertical-align: middle !important;"> 
                                                @if(session()->has('success_' . $pelanggans->id . '_odp_1'))
                                                <div class="alert alert-success">
                                                    {{ session('success_' . $pelanggans->id . '_odp_1') }}
                                                </div>
                                                {{-- {{ session()->forget('success_' . $pelanggans->id . '_odp_1') }} --}}
                                                @else
                                                <form action="{{ route('petugas.store', ['id' => $pelanggans->id, 'odp' => 'odp_1']) }}" method="post" enctype="multipart/form-data" >
                                                    @csrf         
                                                    <div class="form-floating d-flex">
                                                        <input type="hidden" name="odp" value="odp_1">
                                                        <input type="hidden" name="pelanggans_id" value="{{ $pelanggans->id }}">
                                                        <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                        <label for="floatingTextarea">Catatan</label>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                                            <i class="fa fa-plus-circle"></i>
                                                        </button> 
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                                <input type="hidden" name="odp_id">
                                                                                                    <input type="file" name="file" area-required="true">
                                                                                                    <p class="help-block">
                                                                                                        <em>
                                                                                                            File extension jpg. jpeg or png
                                                                                                        </em>
                                                                                                    </p>
                                                                                                    <hr class="inner">
                                                                                                    <div class="form-group d-flex justify-content-lg-center">
                                                                                                        <button class="btn btn-primary" type="submit">
                                                                                                            <i class="fa fa-check-circle"></i>
                                                                                                            Submit
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                    </div>
                                                                                </div>
                                                                            
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                
                                                    
                                                        </div>
                                                    
                                                    </div>        
                                                </form>   
                                                @endif
                                            </td>                                               
                                        </tr>
  
                                          <tr>
                                            <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">2. Instalasi kabel, pastikan rapi (tidak ada bending)</td>
                                            <td style="vertical-align: middle !important;" width="1%">:</td>                    
                                            <td style="vertical-align: middle !important;"> 
                                                @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_2'))
                                                <div class="alert alert-success">
                                                    {{ session('success_' . $pelanggans->id . '_' . 'odp_2') }}
                                                </div>
                                                {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_2') }} --}}
                                                @else
                                                <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_2']) }})}}" method="post" enctype="multipart/form-data">
                                                    @csrf            
                                                    <div class="form-floating d-flex">
                                                        <input type="hidden" name="odp" value="odp_2">
                                                        <input type="hidden" name="pelanggans_id" value="{{ $pelanggans->id }}">
                                                        <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                        <label for="floatingTextarea">Catatan</label>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                            <i class="fa fa-plus-circle"></i>
                                                        </button> 
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                                    <input type="file" name="file" area-required="true">
                                                                                                    <p class="help-block">
                                                                                                        <em>
                                                                                                            File extension jpg. jpeg or png
                                                                                                    </em>
                                                                                                    </p>
                                                                                                    <hr class="inner">
                                                                                                    <div class="form-group d-flex justify-content-lg-center">
                                                                                                        <button class="btn btn-primary" type="submit">
                                                                                                            <i class="fa fa-check-circle"></i>
                                                                                                            Submit
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                    
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                @endif
                                            </td>
                                          </tr>
  
                                          <tr>
                                              <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">3. ODP bersih dari sampah instalasi, debu, air dan
                                              serangga</td>
                                              <td style="vertical-align: middle !important;" width="1%">:</td>
                                              <td style="vertical-align: middle !important;
                                              ">       
                                             @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_3'))
                                             <div class="alert alert-success">
                                                 {{ session('success_' . $pelanggans->id . '_' . 'odp_3') }}
                                             </div>
                                             {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_3') }} --}}
                                             @else
                                                <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_3'])}}" method="post" enctype="multipart/form-data">
                                                    @csrf                 
                                                  <div class="form-floating d-flex">
                                                    <input type="hidden" name="odp" value="odp_3">
                                                      <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                      <label for="floatingTextarea">Catatan</label>
                                                      <!-- Button trigger modal -->
                                                      <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                                          <i class="fa fa-plus-circle"></i>
                                                      </button> 
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                                  <input type="file" name="file" area-required="true">
                                                                                                  <p class="help-block">
                                                                                                      <em>
                                                                                                          File extension jpg. jpeg or png
                                                                                                     </em>
                                                                                                  </p>
                                                                                                  <hr class="inner">
                                                                                                  <div class="form-group d-flex justify-content-lg-center">
                                                                                                      <button class="btn btn-primary" type="submit">
                                                                                                          <i class="fa fa-check-circle"></i>
                                                                                                          Submit
                                                                                                      </button>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                          </div>
                                                                      </div>
                                                                      </div>
                                                      </div>
                                                  </div>
                                                </form>
                                                @endif
                                              </td>
                                          </tr>
  
                                          <tr>
                                              <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">4. ODP Memiliki label drop core</td>
                                              <td style="vertical-align: middle !important;" width="1%">:</td>
                                              <td style="vertical-align: middle !important;
                                              ">               
                                               @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_4'))
                                               <div class="alert alert-success">
                                                   {{ session('success_' . $pelanggans->id . '_' . 'odp_4') }}
                                               </div>
                                               {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_4') }}  --}}
                                               @else
                                                <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_4'])}}" method="post" enctype="multipart/form-data">
                                                    @csrf 
                                                  <div class="form-floating d-flex">
                                                    <input type="hidden" name="odp" value="odp_4">
                                                      <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                      <label for="floatingTextarea">Catatan</label>
                                                      <!-- Button trigger modal -->
                                                      <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal4">
                                                          <i class="fa fa-plus-circle"></i>
                                                      </button> 
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                                  <input type="file" name="file" area-required="true">
                                                                                                  <p class="help-block">
                                                                                                      <em>
                                                                                                          File extension jpg. jpeg or png
                                                                                                     </em>
                                                                                                  </p>
                                                                                                  <hr class="inner">
                                                                                                  <div class="form-group d-flex justify-content-lg-center">
                                                                                                      <button class="btn btn-primary" type="submit">
                                                                                                          <i class="fa fa-check-circle"></i>
                                                                                                          Submit
                                                                                                      </button>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                    
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                          </div>
                                                                      </div>
                                                                      </div>
                                                      </div>
                                                  </div>
                                                </form>
                                                @endif
                                                </td>
                                          </tr>
  
                                          <tr>
                                              <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">5. Tidak menggunakan pigtail kearah ke pelanggan</td>
                                              <td style="vertical-align: middle !important;" width="1%">:</td>
                                              <td style="vertical-align: middle !important;
                                              ">          
                                                 @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_5'))
                                                 <div class="alert alert-success">
                                                     {{ session('success_' . $pelanggans->id . '_' . 'odp_5') }}
                                                 </div>
                                                 {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_5') }}     --}}
                                                 @else      
                                                <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_5'])}}" method="post" enctype="multipart/form-data">
                                                    @csrf 
                                                  <div class="form-floating d-flex">
                                                    <input type="hidden" name="odp" value="odp_5">
                                                      <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                      <label for="floatingTextarea">Catatan</label>
                                                      <!-- Button trigger modal -->
                                                      <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal5">
                                                          <i class="fa fa-plus-circle"></i>
                                                      </button> 
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                                  <input type="file" name="file" area-required="true">
                                                                                                  <p class="help-block">
                                                                                                      <em>
                                                                                                          File extension jpg. jpeg or png
                                                                                                     </em>
                                                                                                  </p>
                                                                                                  <hr class="inner">
                                                                                                  <div class="form-group d-flex justify-content-lg-center">
                                                                                                      <button class="btn btn-primary" type="submit">
                                                                                                          <i class="fa fa-check-circle"></i>
                                                                                                          Submit
                                                                                                      </button>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                      
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                          </div>
                                                                      </div>
                                                                      </div>
                                                      </div>
                                                  </div>
                                                </form>
                                                @endif
                                                </td>
                                          </tr>
  
                                          <tr>
                                              <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">6. Tidak memasukkan splitter tambahan (ODP gendong)</td>
                                              <td style="vertical-align: middle !important;" width="1%">:</td>
                                              <td style="vertical-align: middle !important;
                                              ">                       
                                                  @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_6'))
                                                  <div class="alert alert-success">
                                                      {{ session('success_' . $pelanggans->id . '_' . 'odp_6') }}
                                                  </div>
                                                  {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_6') }} --}}
                                                  @else 
                                                <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_6'])}}" method="post" enctype="multipart/form-data">
                                                    @csrf 
                                                  <div class="form-floating d-flex">
                                                    <input type="hidden" name="odp" value="odp_6">
                                                      <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                      <label for="floatingTextarea">Catatan</label>
                                                      <!-- Button trigger modal -->
                                                      <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal6">
                                                          <i class="fa fa-plus-circle"></i>
                                                      </button> 
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                                  <input type="file" name="file" area-required="true">
                                                                                                  <p class="help-block">
                                                                                                      <em>
                                                                                                          File extension jpg. jpeg or png
                                                                                                     </em>
                                                                                                  </p>
                                                                                                  <hr class="inner">
                                                                                                  <div class="form-group d-flex justify-content-lg-center">
                                                                                                      <button class="btn btn-primary" type="submit">
                                                                                                          <i class="fa fa-check-circle"></i>
                                                                                                          Submit
                                                                                                      </button>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                    
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                          </div>
                                                                      </div>
                                                                      </div>
                                                      </div>
                                                  </div>
                                                </form>
                                                @endif
                                                </td>
                                          </tr>
  
                                          <tr>
                                              <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">7. Kabel drop yang masuk ODP memiliki panjang yang sama
                                              dan terikat rapi</td>
                                              <td style="vertical-align: middle !important;" width="1%">:</td>
                                              <td style="vertical-align: middle !important;
                                              ">                       
                                               @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_7'))
                                               <div class="alert alert-success">
                                                   {{ session('success_' . $pelanggans->id . '_' . 'odp_7') }}
                                               </div>
                                               {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_7') }} --}}
                                                 @else 
                                                <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_7'])}}" method="post" enctype="multipart/form-data">
                                                    @csrf 
                                                  <div class="form-floating d-flex">
                                                    <input type="hidden" name="odp" value="odp_7">
                                                      <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                      <label for="floatingTextarea">Catatan</label>
                                                      <!-- Button trigger modal -->
                                                      <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal7">
                                                          <i class="fa fa-plus-circle"></i>
                                                      </button> 
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                                  <input type="file" name="file" area-required="true">
                                                                                                  <p class="help-block">
                                                                                                      <em>
                                                                                                          File extension jpg. jpeg or png
                                                                                                     </em>
                                                                                                  </p>
                                                                                                  <hr class="inner">
                                                                                                  <div class="form-group d-flex justify-content-lg-center">
                                                                                                      <button class="btn btn-primary" type="submit">
                                                                                                          <i class="fa fa-check-circle"></i>
                                                                                                          Submit
                                                                                                      </button>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                    
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                          </div>
                                                                      </div>
                                                                      </div>
                                                      </div>
                                                  </div>
                                                </form>
                                                @endif
                                                </td>
                                          </tr>
  
                                            <tr>
                                              <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">8. Kunci dome (Penutup ODP)</td>
                                              <td style="vertical-align: middle !important;" width="1%">:</td>
                                              <td style="vertical-align: middle !important;
                                              ">                       
                                                  @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_8'))
                                                  <div class="alert alert-success">
                                                      {{ session('success_' . $pelanggans->id . '_' . 'odp_8') }}
                                                  </div>
                                                  {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_8') }} --}}
                                                   @else 
                                                <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_8'])}}" method="post" enctype="multipart/form-data">
                                                    @csrf 
                                                  <div class="form-floating d-flex">
                                                    <input type="hidden" name="odp" value="odp_8">
                                                      <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea" required></textarea>
                                                      <label for="floatingTextarea">Catatan</label>
                                                      <!-- Button trigger modal -->
                                                      <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal8">
                                                          <i class="fa fa-plus-circle"></i>
                                                      </button> 
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModal8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                                  <input type="file" required name="file" area-required="true">
                                                                                                  <p class="help-block">
                                                                                                      <em>
                                                                                                          File extension jpg. jpeg or png
                                                                                                     </em>
                                                                                                  </p>
                                                                                                  <hr class="inner">
                                                                                                  <div class="form-group d-flex justify-content-lg-center">
                                                                                                      <button class="btn btn-primary" type="submit">
                                                                                                          <i class="fa fa-check-circle"></i>
                                                                                                          Submit
                                                                                                      </button>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                  
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                          </div>
                                                                      </div>
                                                                      </div>
                                                      </div>
                                                  </div>
                                                </form>
                                                @endif
                                            </tr>
  
                                          <tr>
                                              <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">9. Pintu ODP Tertutup/Terkunci</td>
                                              <td style="vertical-align: middle !important;" width="1%">:</td>
                                              <td style="vertical-align: middle !important;
                                              ">                       
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_9'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_9') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_9') }} --}}
                                                    @else 
                                                    <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_9'])}}" method="post" enctype="multipart/form-data">
                                                        @csrf 
                                                    <div class="form-floating d-flex">
                                                        <input type="hidden" name="odp" value="odp_9">
                                                        <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                        <label for="floatingTextarea">Catatan</label>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal9">
                                                            <i class="fa fa-plus-circle"></i>
                                                        </button> 
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal9" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                                    <input type="file" name="file" area-required="true">
                                                                                                    <p class="help-block">
                                                                                                        <em>
                                                                                                            File extension jpg. jpeg or png
                                                                                                        </em>
                                                                                                    </p>
                                                                                                    <hr class="inner">
                                                                                                    <div class="form-group d-flex justify-content-lg-center">
                                                                                                        <button class="btn btn-primary" type="submit">
                                                                                                            <i class="fa fa-check-circle"></i>
                                                                                                            Submit
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                    
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                    @endif
                                                    </td>
                                          </tr>
  
                                          <tr>
                                              <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">10. Splitter, pastikan terpasang dengan baik</td>
                                              <td style="vertical-align: middle !important;" width="1%">:</td>
                                              <td style="vertical-align: middle !important;
                                              ">                       
                                               @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_10'))
                                               <div class="alert alert-success">
                                                   {{ session('success_' . $pelanggans->id . '_' . 'odp_10') }}
                                               </div>
                                               {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_10') }} --}}
                                                 @else 
                                                <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_10'])}}" method="post" enctype="multipart/form-data">
                                                    @csrf 
                                                  <div class="form-floating d-flex">
                                                    <input type="hidden" name="odp" value="odp_10">
                                                      <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                      <label for="floatingTextarea">Catatan</label>
                                                      <!-- Button trigger modal -->
                                                      <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal10">
                                                          <i class="fa fa-plus-circle"></i>
                                                      </button> 
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                                  <input type="file" name="file" area-required="true">
                                                                                                  <p class="help-block">
                                                                                                      <em>
                                                                                                          File extension jpg. jpeg or png
                                                                                                     </em>
                                                                                                  </p>
                                                                                                  <hr class="inner">
                                                                                                  <div class="form-group d-flex justify-content-lg-center">
                                                                                                      <button class="btn btn-primary" type="submit">
                                                                                                          <i class="fa fa-check-circle"></i>
                                                                                                          Submit
                                                                                                      </button>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                    
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                          </div>
                                                                      </div>
                                                                      </div>
                                                      </div>
                                                  </div>
                                                </form>
                                                @endif
                                                </td>
                                          </tr>
  
                                          <tr>
                                              <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">11. Port idle, pastikan seluruhnya terpasang dust cap</td>
                                              <td style="vertical-align: middle !important;" width="1%">:</td>
                                              <td style="vertical-align: middle !important;
                                              ">                       
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_11'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_11') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_11') }} --}}
                                                   @else 
                                                <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_11'])}}" method="post" enctype="multipart/form-data">
                                                    @csrf 
                                                  <div class="form-floating d-flex">
                                                    <input type="hidden" name="odp" value="odp_11">
                                                      <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                      <label for="floatingTextarea">Catatan</label>
                                                      <!-- Button trigger modal -->
                                                      <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal11">
                                                          <i class="fa fa-plus-circle"></i>
                                                      </button> 
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModal11" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                                  <input type="file" name="file" area-required="true">
                                                                                                  <p class="help-block">
                                                                                                      <em>
                                                                                                          File extension jpg. jpeg or png
                                                                                                  </em>
                                                                                                  </p>
                                                                                                  <hr class="inner">
                                                                                                  <div class="form-group d-flex justify-content-lg-center">
                                                                                                      <button class="btn btn-primary" type="submit">
                                                                                                          <i class="fa fa-check-circle"></i>
                                                                                                          Submit
                                                                                                      </button>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                     
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                          </div>
                                                                      </div>
                                                                      </div>
                                                      </div>
                                                  </div>
                                                </form>
                                                @endif
                                                </td>
                                          </tr>
  
                                          <tr>
                                              <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">12. Bebas dari kabel drop yang sudah tidak terpakai</td>
                                              <td style="vertical-align: middle !important;" width="1%">:</td>
                                              <td style="vertical-align: middle !important;
                                              ">                       
                                             @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_12'))
                                             <div class="alert alert-success">
                                                 {{ session('success_' . $pelanggans->id . '_' . 'odp_12') }}
                                             </div>
                                             {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_12') }} --}}
                                               @else 
                                                <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_12'])}}" method="post" enctype="multipart/form-data">
                                                    @csrf 
                                                  <div class="form-floating d-flex">
                                                    <input type="hidden" name="odp" value="odp_12">
                                                      <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                      <label for="floatingTextarea">Catatan</label>
                                                      <!-- Button trigger modal -->
                                                      <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal12">
                                                          <i class="fa fa-plus-circle"></i>
                                                      </button> 
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="exampleModal12" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                                  <input type="file" name="file" area-required="true">
                                                                                                  <p class="help-block">
                                                                                                      <em>
                                                                                                          File extension jpg. jpeg or png
                                                                                                  </em>
                                                                                                  </p>
                                                                                                  <hr class="inner">
                                                                                                  <div class="form-group d-flex justify-content-lg-center">
                                                                                                      <button class="btn btn-primary" type="submit">
                                                                                                          <i class="fa fa-check-circle"></i>
                                                                                                          Submit
                                                                                                      </button>
                                                                                                  </div>
                                                                                              </div>
                                                                                          </div>
                                                                                      
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                          </div>
                                                                      </div>
                                                                      </div>
                                                      </div>
                                                  </div>
                                                </form>
                                                @endif
                                                </td>
                                          </tr>
  
                                          <tr>
                                              <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">13. Pengukuran di ODP (Gunakan OPM)</td>
                                              <td style="vertical-align: middle !important;" width="1%">:</td>
                                              <td style="vertical-align: middle !important;
                                              ">                       
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_13'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_13') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_13') }} --}}
                                                @else 
                                                    <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_13'])}}" method="post" enctype="multipart/form-data">
                                                        @csrf 
                                                    <div class="form-floating d-flex">
                                                        <input type="hidden" name="odp" value="odp_13">
                                                        <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                        <label for="floatingTextarea">Catatan</label>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal13">
                                                            <i class="fa fa-plus-circle"></i>
                                                        </button> 
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal13" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                                    <input type="file" name="file" area-required="true">
                                                                                                    <p class="help-block">
                                                                                                        <em>
                                                                                                            File extension jpg. jpeg or png
                                                                                                    </em>
                                                                                                    </p>
                                                                                                    <hr class="inner">
                                                                                                    <div class="form-group d-flex justify-content-lg-center">
                                                                                                        <button class="btn btn-primary" type="submit">
                                                                                                            <i class="fa fa-check-circle"></i>
                                                                                                            Submit
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                    
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                    @endif
                                                    </td>
                                          </tr>
                                      </div>
                    
                                      <!-- kolom 2 -->
                                    <div class="kolom 2">
                                      <tr>
                                        <th style="color:red;" width="1%" nowrap="">CHEKLIST SALURAN PENANGGAL
                                        </th>
                                        <th width="1%" nowrap="">:</th>
                                      </tr>
  
                                      <tr>
                                        <td style="vertical-align: middle !important;font-size:12px;" width="1%">1. Seluruh tambatan menggunakan s-clamp (tiang/odp)</td>
                                        <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                        </td>
                                        <td style="vertical-align: middle !important;">
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_14'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_14') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_14') }} --}}
                                                @else 
                                        <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_14'])}}" method="post" enctype="multipart/form-data">
                                            @csrf 
                                          <div class="form-floating d-flex">
                                             <input type="hidden" name="odp" value="odp_14">
                                              <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea" required></textarea>
                                              <label for="floatingTextarea">Catatan</label>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal14">
                                                  <i class="fa fa-plus-circle"></i>
                                              </button> 
                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModal14" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                          <input type="file" name="file" required area-required="true">
                                                                                          <p class="help-block">
                                                                                              <em>
                                                                                                  File extension jpg. jpeg or png
                                                                                             </em>
                                                                                          </p>
                                                                                          <hr class="inner">
                                                                                          <div class="form-group d-flex justify-content-lg-center">
                                                                                              <button class="btn btn-primary" type="submit">
                                                                                                  <i class="fa fa-check-circle"></i>
                                                                                                  Submit
                                                                                              </button>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                            
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  </div>
                                                              </div>
                                                              </div>
                                              </div>
                                          </div>
                                         </form>
                                         @endif
                                        </td>
                                      </tr>
  
                                      <tr>
                                        <td style="vertical-align: middle !important;font-size:12px;" width="1%">2. Di rumah pelanggan menggunakan clamp hook &amp;
                                          s-clamp</td>
                                        <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                        </td>
  
                                        <td style="vertical-align: middle !important;">
                                                                   
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_15'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_15') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_15') }} --}}
                                                @else 
                                            <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_15'])}}" method="post" enctype="multipart/form-data">
                                                @csrf 
                                          <div class="form-floating d-flex">
                                            <input type="hidden" name="odp" value="odp_15">
                                              <textarea class="form-control" name="catatan" required placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                              <label for="floatingTextarea">Catatan</label>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal15">
                                                  <i class="fa fa-plus-circle"></i>
                                              </button> 
                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModal15" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                          <input type="file" name="file" required area-required="true">
                                                                                          <p class="help-block">
                                                                                              <em>
                                                                                                  File extension jpg. jpeg or png
                                                                                             </em>
                                                                                          </p>
                                                                                          <hr class="inner">
                                                                                          <div class="form-group d-flex justify-content-lg-center">
                                                                                              <button class="btn btn-primary" type="submit">
                                                                                                  <i class="fa fa-check-circle"></i>
                                                                                                  Submit
                                                                                              </button>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                             
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  </div>
                                                              </div>
                                                              </div>
                                              </div>
                                          </div>
                                         </form>
                                         @endif
                                        </td>
                                      </tr>
  
                                      <tr>
                                        <td style="vertical-align: middle !important;font-size:12px;" width="1%">3. Tidak terdapat sambungan</td>
                                        <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                        </td>
                                        <td style="vertical-align: middle !important;">
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_16'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_16') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_16') }} --}}
                                                @else 
                                            <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_16'])}}" method="post" enctype="multipart/form-data">
                                                @csrf 
                                          <div class="form-floating d-flex">
                                            <input type="hidden" name="odp" value="odp_16">
                                              <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                              <label for="floatingTextarea">Catatan</label>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal16">
                                                  <i class="fa fa-plus-circle"></i>
                                              </button> 
                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModal16" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                          <input type="file" name="file" area-required="true">
                                                                                          <p class="help-block">
                                                                                              <em>
                                                                                                  File extension jpg. jpeg or png
                                                                                             </em>
                                                                                          </p>
                                                                                          <hr class="inner">
                                                                                          <div class="form-group d-flex justify-content-lg-center">
                                                                                              <button class="btn btn-primary" type="submit">
                                                                                                  <i class="fa fa-check-circle"></i>
                                                                                                  Submit
                                                                                              </button>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                             
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  </div>
                                                              </div>
                                                              </div>
                                              </div>
                                          </div>
                                         </form>
                                         @endif
                                        </td>
                                      </tr>
  
                                      <tr>
                                        <td style="vertical-align: middle !important;font-size:12px;" width="1%">4. Menggunakan OTP</td>
                                        <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                        </td>
                                        <td style="vertical-align: middle !important;">
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_17'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_17') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_17') }} --}}
                                                @else 
                                            <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_16'])}}" method="post" enctype="multipart/form-data">
                                                @csrf 
                                          <div class="form-floating d-flex">
                                            <input type="hidden" name="odp" value="odp_17">
                                              <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                              <label for="floatingTextarea">Catatan</label>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal17">
                                                  <i class="fa fa-plus-circle"></i>
                                              </button> 
                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModal17" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                          <input type="file" name="file" area-required="true">
                                                                                          <p class="help-block">
                                                                                              <em>
                                                                                                  File extension jpg. jpeg or png
                                                                                             </em>
                                                                                          </p>
                                                                                          <hr class="inner">
                                                                                          <div class="form-group d-flex justify-content-lg-center">
                                                                                              <button class="btn btn-primary" type="submit">
                                                                                                  <i class="fa fa-check-circle"></i>
                                                                                                  Submit
                                                                                              </button>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                           
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  </div>
                                                              </div>
                                                              </div>
                                              </div>
                                          </div>
                                         </form>
                                         @endif
                                        </td>
                                      </tr>
  
                                      <tr>
                                        <td style="vertical-align: middle !important;font-size:12px;" width="1%">5. Tidak ada penarikan dropcore di atas 50 m tanpa tiang
                                          (Penanaman tiang jika diperlukan)</td>
                                        <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                        </td>
                                        <td style="vertical-align: middle !important;">    
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_18'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_18') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_18') }} --}}
                                                @else 
                                            <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_18'])}}" method="post" enctype="multipart/form-data">
                                                @csrf 
                                          <div class="form-floating d-flex">
                                            <input type="hidden" name="odp" value="odp_18">          
                                              <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                              <label for="floatingTextarea">Catatan</label>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal18">
                                                  <i class="fa fa-plus-circle"></i>
                                              </button> 
                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModal18" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                          <input type="file" name="file" area-required="true">
                                                                                          <p class="help-block">
                                                                                              <em>
                                                                                                  File extension jpg. jpeg or png
                                                                                             </em>
                                                                                          </p>
                                                                                          <hr class="inner">
                                                                                          <div class="form-group d-flex justify-content-lg-center">
                                                                                              <button class="btn btn-primary" type="submit">
                                                                                                  <i class="fa fa-check-circle"></i>
                                                                                                  Submit
                                                                                              </button>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                           
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  </div>
                                                              </div>
                                                              </div>
                                              </div>
                                          </div>
                                         </form>
                                         @endif
                                        </td>
                                      </tr>
  
                                      <tr>
                                        <td style="vertical-align: middle !important;font-size:12px;" width="1%">6. Penggunaan dropcore sesuai list of material</td>
                                        <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                        </td>
                                        <td style="vertical-align: middle !important;">
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_19'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_19') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_19') }} --}}
                                                @else 
                                            <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_19'])}}" method="post" enctype="multipart/form-data">
                                                @csrf 
                                          <div class="form-floating d-flex">
                                            <input type="hidden" name="odp" value="odp_19">
                                              <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                              <label for="floatingTextarea">Catatan</label>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal19">
                                                  <i class="fa fa-plus-circle"></i>
                                              </button> 
                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModal19" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                          <input type="file" name="file" area-required="true">
                                                                                          <p class="help-block">
                                                                                              <em>
                                                                                                  File extension jpg. jpeg or png
                                                                                             </em>
                                                                                          </p>
                                                                                          <hr class="inner">
                                                                                          <div class="form-group d-flex justify-content-lg-center">
                                                                                              <button class="btn btn-primary" type="submit">
                                                                                                  <i class="fa fa-check-circle"></i>
                                                                                                  Submit
                                                                                              </button>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                         
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  </div>
                                                              </div>
                                                              </div>
                                              </div>
                                          </div>
                                         </form>
                                         @endif
                                        </td>
                                      </tr>
  
                                      <tr>
                                        <td style="vertical-align: middle !important;font-size:12px;" width="1%">7. Penggunaan connector sesuai list of material</td>
                                        <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                        </td>
                                        <td style="vertical-align: middle !important;">
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_20'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_20') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_20') }} --}}
                                                @else 
                                            <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_20'])}}" method="post" enctype="multipart/form-data">
                                                @csrf 
                                          <div class="form-floating d-flex">
                                            <input type="hidden" name="odp" value="odp_20">
                                              <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                              <label for="floatingTextarea">Catatan</label>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal20">
                                                  <i class="fa fa-plus-circle"></i>
                                              </button> 
                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModal20" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                          <input type="file" name="file" area-required="true">
                                                                                          <p class="help-block">
                                                                                              <em>
                                                                                                  File extension jpg. jpeg or png
                                                                                             </em>
                                                                                          </p>
                                                                                          <hr class="inner">
                                                                                          <div class="form-group d-flex justify-content-lg-center">
                                                                                              <button class="btn btn-primary" type="submit">
                                                                                                  <i class="fa fa-check-circle"></i>
                                                                                                  Submit
                                                                                              </button>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                           
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  </div>
                                                              </div>
                                                              </div>
                                              </div>
                                          </div>
                                         </form>
                                         @endif
                                        </td>
                                      </tr>
  
                                      <tr>
                                        <td style="vertical-align: middle !important;font-size:12px;" width="1%">8. Instalasi dropcore menggunakan pipa (bila menggunakan
                                          SPBT)</td>
                                        <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                        </td>
                                        <td style="vertical-align: middle !important;">
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_21'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_21') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_21') }} --}}
                                                @else 
                                                <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_21'])}}" method="post" enctype="multipart/form-data">
                                                    @csrf 
                                          <div class="form-floating d-flex">
                                            <input type="hidden" name="odp" value="odp_21">
                                              <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                              <label for="floatingTextarea">Catatan</label>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal21">
                                                  <i class="fa fa-plus-circle"></i>
                                              </button> 
                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModal21" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                          <input type="file" name="file" area-required="true">
                                                                                          <p class="help-block">
                                                                                              <em>
                                                                                                  File extension jpg. jpeg or png
                                                                                             </em>
                                                                                          </p>
                                                                                          <hr class="inner">
                                                                                          <div class="form-group d-flex justify-content-lg-center">
                                                                                              <button class="btn btn-primary" type="submit">
                                                                                                  <i class="fa fa-check-circle"></i>
                                                                                                  Submit
                                                                                              </button>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                       
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  </div>
                                                              </div>
                                                              </div>
                                              </div>
                                          </div>
                                         </form>
                                         @endif
                                        </td>
                                      </tr>
  
                                      <tr>
                                        <td style="vertical-align: middle !important;font-size:12px;" width="1%">9. Messenger di tiang penanggal tidak dipotong</td>
                                        <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                        </td>
                                        <td style="vertical-align: middle !important;">
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_22'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_22') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_22') }} --}}
                                                @else 
                                            <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_22'])}}" method="post" enctype="multipart/form-data">
                                                @csrf 
                                          <div class="form-floating d-flex">
                                            <input type="hidden" name="odp" value="odp_22">
                                              <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                              <label for="floatingTextarea">Catatan</label>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal22">
                                                  <i class="fa fa-plus-circle"></i>
                                              </button> 
                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModal22" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                          <input type="file" name="file" area-required="true">
                                                                                          <p class="help-block">
                                                                                              <em>
                                                                                                  File extension jpg. jpeg or png
                                                                                             </em>
                                                                                          </p>
                                                                                          <hr class="inner">
                                                                                          <div class="form-group d-flex justify-content-lg-center">
                                                                                              <button class="btn btn-primary" type="submit">
                                                                                                  <i class="fa fa-check-circle"></i>
                                                                                                  Submit
                                                                                              </button>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                         
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  </div>
                                                              </div>
                                                              </div>
                                              </div>
                                          </div>
                                         </form>
                                         @endif
                                        </td>
                                      </tr>
                                    </div>
                                      
                                      <!-- kolom 3 -->
                                    <div class="kolom 3">
                                      <tr>
                                        <th style="color:red;" width="1%" nowrap="">CHEKLIST EVIDEN KABEL RUMAH
                                        </th>
                                        <th width="1%" nowrap="">:</th>
                                      </tr>
  
                                      <tr>
                                        <td style="vertical-align: middle !important;font-size:12px;" width="1%">1. Menggunakan kabel indoor dari OTP ke roset</td>
                                        <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                        </td>
                                        <td style="vertical-align: middle !important;">
                                                                   
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_23'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_23') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_23') }} --}}
                                                @else 
                                            <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_23'])}}" method="post" enctype="multipart/form-data">
                                                @csrf 
                                          <div class="form-floating d-flex">
                                            <input type="hidden" name="odp" value="odp_23">
                                              <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                              <label for="floatingTextarea">Catatan</label>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal23">
                                                  <i class="fa fa-plus-circle"></i>
                                              </button> 
                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModal23" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                          <input type="file" name="file" area-required="true">
                                                                                          <p class="help-block">
                                                                                              <em>
                                                                                                  File extension jpg. jpeg or png
                                                                                             </em>
                                                                                          </p>
                                                                                          <hr class="inner">
                                                                                          <div class="form-group d-flex justify-content-lg-center">
                                                                                              <button class="btn btn-primary" type="submit">
                                                                                                  <i class="fa fa-check-circle"></i>
                                                                                                  Submit
                                                                                              </button>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                   
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  </div>
                                                              </div>
                                                              </div>
                                              </div>
                                          </div>
                                         </form>
                                         @endif
                                        </td>
                                      </tr>
  
                                      <tr>
                                        <td style="vertical-align: middle !important;font-size:12px;" width="1%">2. Roset terpasang dengan kuat dan kokoh dengan konektor
                                          menghadap ke bawah Minimal 40 cm dari lantai</td>
                                        <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                        </td>
                                        <td style="vertical-align: middle !important;">
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_24'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_24') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_24') }} --}}
                                                @else 
                                            <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_24'])}}" method="post" enctype="multipart/form-data">
                                                @csrf 
                                          <div class="form-floating d-flex">
                                            <input type="hidden" name="odp" value="odp_24">
                                              <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                              <label for="floatingTextarea">Catatan</label>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal24">
                                                  <i class="fa fa-plus-circle"></i>
                                              </button> 
                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModal24" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                          <input type="file" name="file" area-required="true">
                                                                                          <p class="help-block">
                                                                                              <em>
                                                                                                  File extension jpg. jpeg or png
                                                                                             </em>
                                                                                          </p>
                                                                                          <hr class="inner">
                                                                                          <div class="form-group d-flex justify-content-lg-center">
                                                                                              <button class="btn btn-primary" type="submit">
                                                                                                  <i class="fa fa-check-circle"></i>
                                                                                                  Submit
                                                                                              </button>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                             
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  </div>
                                                              </div>
                                                              </div>
                                              </div>
                                          </div>
                                         </form>
                                         @endif
                                        </td>
                                      </tr>
  
                                      <tr>
                                        <td style="vertical-align: middle !important;font-size:12px;" width="1%">3. Rute kabel harus berada di sudut dinding (jangan
                                          menyilang bidang)</td>
                                        <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                        </td>
                                        <td style="vertical-align: middle !important;">
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_25'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_25') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_25') }} --}}
                                                @else 
                                            <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_25'])}}" method="post" enctype="multipart/form-data">
                                                @csrf 
                                          <div class="form-floating d-flex">
                                            <input type="hidden" name="odp" value="odp_25">
                                              <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                              <label for="floatingTextarea">Catatan</label>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal25">
                                                  <i class="fa fa-plus-circle"></i>
                                              </button> 
                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModal25" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                          <input type="file" name="file" area-required="true">
                                                                                          <p class="help-block">
                                                                                              <em>
                                                                                                  File extension jpg. jpeg or png
                                                                                             </em>
                                                                                          </p>
                                                                                          <hr class="inner">
                                                                                          <div class="form-group d-flex justify-content-lg-center">
                                                                                              <button class="btn btn-primary" type="submit">
                                                                                                  <i class="fa fa-check-circle"></i>
                                                                                                  Submit
                                                                                              </button>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                            
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  </div>
                                                              </div>
                                                              </div>
                                              </div>
                                          </div>
                                         </form>
                                         @endif
                                        </td>
                                      </tr>
  
                                      <tr>
                                        <td style="vertical-align: middle !important;font-size:12px;" width="1%">4. Kabel harus melekat dengan kuat (menggunakan kabel
                                          tray, clip atau lem)</td>
                                        <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                        </td>
                                        <td style="vertical-align: middle !important;">
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_26'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_26') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_26') }} --}}
                                                @else 
                                            <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_26'])}}" method="post" enctype="multipart/form-data">
                                                @csrf 
                                          <div class="form-floating d-flex">
                                            <input type="hidden" name="odp" value="odp_26">
                                              <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                              <label for="floatingTextarea">Catatan</label>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal26">
                                                  <i class="fa fa-plus-circle"></i>
                                              </button> 
                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModal26" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                          <input type="file" name="file" area-required="true">
                                                                                          <p class="help-block">
                                                                                              <em>
                                                                                                  File extension jpg. jpeg or png
                                                                                             </em>
                                                                                          </p>
                                                                                          <hr class="inner">
                                                                                          <div class="form-group d-flex justify-content-lg-center">
                                                                                              <button class="btn btn-primary" type="submit">
                                                                                                  <i class="fa fa-check-circle"></i>
                                                                                                  Submit
                                                                                              </button>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                            
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  </div>
                                                              </div>
                                                              </div>
                                              </div>
                                          </div>
                                         </form>
                                         @endif
                                        </td>
                                      </tr>
  
                                      <tr>
                                        <td style="vertical-align: middle !important;font-size:12px;" width="1%">5. Kabel melalui jalur yang sudah disiapkan di rumah</td>
                                        <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                        </td>
                                        <td style="vertical-align: middle !important;">
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_27'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_27') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_27') }} --}}
                                                @else 
                                            <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_27'])}}" method="post" enctype="multipart/form-data">
                                                @csrf 
                                          <div class="form-floating d-flex">
                                            <input type="hidden" name="odp" value="odp_27">
                                              <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                              <label for="floatingTextarea">Catatan</label>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal27">
                                                  <i class="fa fa-plus-circle"></i>
                                              </button> 
                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModal27" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                          <input type="file" name="file" area-required="true">
                                                                                          <p class="help-block">
                                                                                              <em>
                                                                                                  File extension jpg. jpeg or png
                                                                                             </em>
                                                                                          </p>
                                                                                          <hr class="inner">
                                                                                          <div class="form-group d-flex justify-content-lg-center">
                                                                                              <button class="btn btn-primary" type="submit">
                                                                                                  <i class="fa fa-check-circle"></i>
                                                                                                  Submit
                                                                                              </button>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                         
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  </div>
                                                              </div>
                                                              </div>
                                              </div>
                                          </div>
                                         </form>
                                         @endif
                                        </td>
                                      </tr>
  
                                      <tr>
                                        <td style="vertical-align: middle !important;font-size:12px;" width="1%">6. Pengukuran Redaman Power ONT Rx Level mengunakan
                                          Ibooster</td>
                                        <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                        </td>
                                        <td style="vertical-align: middle !important;">
                                            @if(session()->has('success_' . $pelanggans->id . '_' . 'odp_28'))
                                            <div class="alert alert-success">
                                                {{ session('success_' . $pelanggans->id . '_' . 'odp_28') }}
                                            </div>
                                            {{-- {{ session()->forget('success_' . $pelanggans->id . '_' . 'odp_28') }} --}}
                                                @else 
                                            <form action="{{route('petugas.store',['id' => $pelanggans->id, 'odp' => 'odp_28'])}}" method="post" enctype="multipart/form-data">
                                                @csrf 
                                          <div class="form-floating d-flex">
                                            <input type="hidden" name="odp" value="odp_28">
                                              <textarea class="form-control" name="catatan" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                              <label for="floatingTextarea">Catatan</label>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal28">
                                                  <i class="fa fa-plus-circle"></i>
                                              </button> 
                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModal28" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                          <input type="file" name="file" area-required="true">
                                                                                          <p class="help-block">
                                                                                              <em>
                                                                                                  File extension jpg. jpeg or png
                                                                                             </em>
                                                                                          </p>
                                                                                          <hr class="inner">
                                                                                          <div class="form-group d-flex justify-content-lg-center">
                                                                                              <button class="btn btn-primary" type="submit">
                                                                                                  <i class="fa fa-check-circle"></i>
                                                                                                  Submit
                                                                                              </button>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                           
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  </div>
                                                              </div>
                                                              </div>
                                              </div>
                                          </div>
                                         </form>
                                         @endif
                                        </td>
                                      </tr>
                                    </div>
                                    
                                    <tr>
                                      <th style="color:red;" width="1%" nowrap=""></th>
                                      <th width="1%"></th>
                                      <td colspan="3">
                                          <input class="btn-custom btn-primary" type="submit" name="add_progress" value="Update Progress">
                                      </td>
                                    </tr>          
                                
                                    </tbody>
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

    {{-- <script>
        // Objek untuk melacak status pengiriman form berdasarkan odp
        var formStatus = {};
    
        // Fungsi untuk mengirim form
        function submitForm(form) {
            var odp = form.querySelector('input[name="odp"]').value;
    
            if (formStatus[odp]) {
                alert('Form dengan ODP ' + odp + ' sudah dikirimkan.');
                return false; // Mencegah pengiriman ulang
            }
    
            // Tandai form sebagai sudah dikirimkan
            formStatus[odp] = true;
    
            // Lanjutkan pengiriman form (anda bisa menambahkan kode AJAX di sini jika perlu)
    
            return true;
        }
    </script> --}}
    
    
    

</body>
</html>