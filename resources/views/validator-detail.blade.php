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
    <link rel="stylesheet" href="{{asset('assets/css/validator1.css')}}">
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
                                            @foreach ($pelanggansFoto as $group)
                                              @foreach ($group as $item)
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
                                              <td colspan="2">  {{$item->pelanggan->nama}}   </td>
                                            </tr>
                                            <tr>
                                              <th style="vertical-align: middle;" width="1%" nowrap="">
                                                NO HP</th>
                                              <th style="vertical-align: middle;" width="1%" nowrap="">:
                                              </th>
                                              <td colspan="2">  {{$item->pelanggan->kontak}}  </td>
                                            </tr>
                                            <tr>
                                              <th style="vertical-align: middle;" width="1%" nowrap="">
                                                ALAMAT</th>
                                              <th style="vertical-align: middle;" width="1%" nowrap="">:
                                              </th>
                                              <td colspan="2">  {{$item->pelanggan->location}} </td>
                                            </tr>
                                            <tr>
                                              <th style="vertical-align: middle;" width="1%" nowrap="">AREA
                                              </th>
                                              <th style="vertical-align: middle;" width="1%" nowrap="">:
                                              </th>
                                              <td colspan="2"> {{ $areas[$item->pelanggan->area] ?? '' }} - {{$item->pelanggan->area ?? ''}} <br>
                                              </td>
                                            </tr>
                                            <tr>
                                              <th style="vertical-align: middle;" width="1%" nowrap="">
                                                LOC_ID</th>
                                              <th style="vertical-align: middle;" width="1%" nowrap="">:
                                              </th>
                                              <td colspan="2"> ODP-BDG-BJS/123 </td>
                                            </tr> 
                                                @break
                                              @endforeach
                                            @endforeach
                                          </tbody>
                                        </table>
                                            
                                      
                                    </div>
                                </div>
                  
                            <div class="col-lg-8">
                                <div class="alert alert-success alert-dismissible">
                                    <strong>Catatan Petugas :</strong>
                                    <i>OK</i>
                                    <br> 4 jam yang lalu
                                </div>
                                <div class="table-responsive table-cs">
                                    <h6>Wajib di ceklist isi semua !</h6>
                      
                                    <table class="table table-condensed table-striped" style="color:#000000">
                                      <tbody>
                                        <!-- kolom 1 -->
                                        <div class="kolom 1">
                                          <tr>
                                            <th style="color:red;" width="1%" nowrap="">CHEKLIST ODP </th>
                                            <th width="1%" nowrap="">:</th>
                                          </tr>
                                          <tr>
                                            <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">1. Konektor dan Adapter tipe SC-UPC</td>
                                            <td style="vertical-align: middle !important;" width="1%">:</td>
                                            <td style="vertical-align: middle;width:100px;">
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_1" value="Y" required="">
                                                  <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                    OKE
                                                  </div>
                                                </label>
                                              </div>
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_1" value="N">
                                                  <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                    NOK
                                                  </div>
                                                </label>
                                              </div>
                                            </td>
                                            
                                            <td style="vertical-align: middle !important;">
                                              <font size="1">ok</font>
                                            </td>
                                            {{-- <td style="vertical-align: middle;">
                                              <div class="pull-right"> --}}
                                            {{-- @if ($pelanggansFoto->isNotEmpty())
                                              <td style="vertical-align: middle;">
                                                <div class="pull-right">
                                                  @php
                                                  $displayedPhotos = []; 
                                                  $photoIndex = 0;
                                                  @endphp
                                                  @foreach ($pelanggansFoto as $group)
                                                    @foreach ($group as $foto)
                                                      @if ($photoIndex < count($displayedPhotos) && $displayedPhotos[$photoIndex] === $foto->id)
                                                        <img src="{{ asset('storage/images/' . $foto->file) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                        @php
                                                          $photoIndex++;
                                                        @endphp
                                                      @endif
                                                    @endforeach
                                                  @endforeach
                                                  @dd($photoIndex)
                                                </div>
                                              </td>
                                            @endif --}}
                                            @if ($pelanggansFoto->isNotEmpty())
                                            <td style="vertical-align: middle;">
                                              <div class="pull-right">
                                                @foreach ($pelanggansFoto as $group)
                                                  @php
                                                    $photoIndex = 0;
                                                  @endphp
                                                  @foreach ($group as $foto)
                                                    @if ($photoIndex === 0)
                                                      <img src="{{ asset('storage/images/' . $foto->file) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                    @endif
                                                    @php
                                                      $photoIndex++;
                                                    @endphp
                                                  @endforeach
                                                @endforeach
                                              </div>
                                            </td>
                                          @endif
                                     
                                          

                                            {{-- @if ($pelanggansFoto->isNotEmpty())
                                            <td style="vertical-align: middle;">
                                              <div class="pull-right">
                                                @php
                                                  $displayedPhotos = [];
                                                @endphp
                                                @foreach ($pelanggansFoto as $group)
                                                  @foreach ($group as $foto)
                                         
                                                    @if (!in_array($foto->id, $displayedPhotos))
                                                      <img src="{{ asset('storage/images/'.$foto->file) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                      @php
                                                        $displayedPhotos[] = $foto->id;
                                                        @endphp
                                                    @endif
                                                  @endforeach
                                                @endforeach
                                                @dd($displayedPhotos)
                                              </div>
                                            </td>
                                            @endif --}}

                                                {{-- @if ($pelanggansFoto->isNotEmpty())
                                                <td style="vertical-align: middle;">
                                                  <div class="pull-right">
                                                    @foreach ($pelanggansFoto->sortBy('pelanggans_id') as $foto)
                                                    <img src="{{ asset('storage/images/' . $foto->file) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                    @endforeach
                                                  </div>
                                                </td>
                                                @endif --}}
                                          </tr>
                                          <tr>
                                            <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">2. Instalasi kabel, pastikan rapi (tidak ada bending)</td>
                                            <td style="vertical-align: middle !important;" width="1%">:</td>
                                            <td style="vertical-align: middle;width:10px;">
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_2" value="Y" required="">
                                                  <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                    OKE
                                                  </div>
                                                </label>
                                              </div>
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_2" value="N">
                                                  <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                    NOK
                                                  </div>
                                                </label>
                                              </div>
                                            </td>
                                            <td style="vertical-align: middle !important;">
                                              <font size="1">ok</font>
                                            </td>
                                       
                                                @if ($pelanggansFoto->isNotEmpty())
                                                <td style="vertical-align: middle;">
                                                  <div class="pull-right">
                                                    @foreach ($pelanggansFoto as $group)
                                                      @php
                                                        $photos = $group->toArray();
                                                        if (count($photos) >= 2) {
                                                            $secondPhoto = $photos[1];
                                                      @endphp
                                                            <img src="{{ asset('storage/images/' . $secondPhoto['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                      @php
                                                        }
                                                      @endphp
                                                    @endforeach
                                                  </div>
                                                </td>
                                              @endif
                                                {{-- @if ($pelanggansFoto->isNotEmpty())
                                                <td style="vertical-align: middle;">
                                                  <div class="pull-right">
                                                    @foreach ($pelanggansFoto as $group)
                                                      @php
                                                        $photos = $group->toArray();
                                                        $firstPhoto = reset($photos);
                                                      @endphp
                                                      @if ($firstPhoto)
                                                        <img src="{{ asset('storage/images/' . $firstPhoto['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                      @endif
                                                    @endforeach
                                                  </div>
                                                </td>
                                              @endif --}}
                                                {{-- @if ($pelanggansFoto->isNotEmpty())
                                                <td style="vertical-align: middle;">
                                                  <div class="pull-right">
                                                    @foreach ($pelanggansFoto->sortBy('pelanggans_id') as $foto)
                                                    <img src="{{ asset('storage/images/' . $foto->file) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                    @endforeach
                                                  </div>
                                                </td>
                                                @endif --}}
                                                
                                                {{-- @if ($pelanggansFoto->isNotEmpty())
                                                <td style="vertical-align: middle;">
                                                  <div class="pull-right">
                                                    @foreach ($pelanggansFoto as $group)
                                                    @foreach ($group as $foto)
                                                        <img src="{{ asset('storage/images/' . $foto->file) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                    @endforeach
                                                    @endforeach
                                                  </div>
                                                </td>
                                                @endif --}}

                                                {{-- @if ($pelanggansFoto->isNotEmpty())
                                                <td style="vertical-align: middle;">
                                                  <div class="pull-right">
                                                    @php
                                                      $displayedPhotos = [];
                                                    @endphp
                                                    @foreach ($pelanggansFoto as $group)
                                                      @foreach ($group as $foto)
                                                      @dd($foto)
                                                        @if (!in_array($foto->id, $displayedPhotos))
                                                          <img src="{{ asset('storage/images/'.$foto->file) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                          @php
                                                            $displayedPhotos[] = $foto->id;
                                                            @endphp
                                                        @endif
                                                      @endforeach
                                                    @endforeach
                                                    @dd($displayedPhotos)
                                                  </div>
                                                </td>
                                                @endif --}}
                                                
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">3. ODP bersih dari sampah instalasi, debu, air dan
                                              serangga</td>
                                            <td style="vertical-align: middle !important;" width="1%">:</td>
                                            <td style="vertical-align: middle;width:10px;">
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_3" value="Y" required="">
                                                  <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                    OKE
                                                  </div>
                                                </label>
                                              </div>
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_3" value="N">
                                                  <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                    NOK
                                                  </div>
                                                </label>
                                              </div>
                                            </td>
                                            <td style="vertical-align: middle !important;">
                                              <font size="1">ok</font>
                                            </td>
                                            <td style="vertical-align: middle;">
                                              <div class="pull-right">
                                                @if ($pelanggansFoto->isNotEmpty())
                                       
                                                    @foreach ($pelanggansFoto as $group)
                                                      @php
                                                        $photos = $group->toArray();
                                                        if (count($photos) >= 3) {
                                                            $third = $photos[2];
                                                      @endphp
                                                            <img src="{{ asset('storage/images/' . $third['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                      @php
                                                        }
                                                      @endphp
                                                    @endforeach
                                                  </div>
                                                </td>
                                              @endif
                                                {{-- @if ($pelanggansFoto->isNotEmpty())
                                                <td style="vertical-align: middle;">
                                                  <div class="pull-right">
                                                    @foreach ($pelanggansFoto->sortBy('pelanggans_id') as $foto)
                                                    <img src="{{ asset('storage/images/' . $foto->file) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                    @endforeach
                                                  </div>
                                                </td>
                                                @endif --}}
                                                
                                                
                                                
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">4. ODP Memiliki label drop core</td>
                                            <td style="vertical-align: middle !important;" width="1%">:</td>
                                            <td style="vertical-align: middle;width:10px;">
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_4" value="Y" required="">
                                                  <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                    OKE
                                                  </div>
                                                </label>
                                              </div>
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_4" value="N">
                                                  <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                    NOK
                                                  </div>
                                                </label>
                                              </div>
                                            </td>
                                            <td style="vertical-align: middle !important;">
                                              <font size="1">ok</font>
                                            </td>
                                            <td style="vertical-align: middle;">
                                              <div class="pull-right">
                                                @if ($pelanggansFoto->isNotEmpty())
                                                
                                                    @foreach ($pelanggansFoto as $group)
                                                      @php
                                                        $photos = $group->toArray();
                                                        if (count($photos) >= 4) {
                                                            $four = $photos[3];
                                                      @endphp
                                                            <img src="{{ asset('storage/images/' . $four['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                      @php
                                                        }
                                                      @endphp
                                                    @endforeach
                                                  </div>
                                                </td>
                                              @endif
                                                {{-- @if ($pelanggansFoto->isNotEmpty())
                                                <td style="vertical-align: middle;">
                                                  <div class="pull-right">
                                                    @foreach ($pelanggansFoto->sortBy('pelanggans_id') as $foto)
                                                    <img src="{{ asset('storage/images/' . $foto->file) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                    @endforeach
                                                  </div>
                                                </td>
                                                @endif --}}
                                                
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">5. Tidak menggunakan pigtail kearah ke pelanggan</td>
                                            <td style="vertical-align: middle !important;" width="1%">:</td>
                                            <td style="vertical-align: middle;width:10px;">
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_5" value="Y" required="">
                                                  <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                    OKE
                                                  </div>
                                                </label>
                                              </div>
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_5" value="N">
                                                  <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                    NOK
                                                  </div>
                                                </label>
                                              </div>
                                            </td>
                                            <td style="vertical-align: middle !important;">
                                              <font size="1">ok</font>
                                            </td>
                                            @if ($pelanggansFoto->isNotEmpty())
                                            <td style="vertical-align: middle;">
                                              <div class="pull-right">
                                                @foreach ($pelanggansFoto as $group)
                                                  @php
                                                    $photos = $group->toArray();
                                                    if (count($photos) >= 5) {
                                                        $five = $photos[4];
                                                  @endphp
                                                        <img src="{{ asset('storage/images/' . $five['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                  @php
                                                    }
                                                  @endphp
                                                @endforeach
                                              </div>
                                            </td>
                                          @endif
                                          </tr>
                                          <tr>
                                            <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">6. Tidak memasukkan splitter tambahan (ODP gendong)</td>
                                            <td style="vertical-align: middle !important;" width="1%">:</td>
                                            <td style="vertical-align: middle;width:10px;">
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_6" value="Y" required="">
                                                  <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                    OKE
                                                  </div>
                                                </label>
                                              </div>
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_6" value="N">
                                                  <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                    NOK
                                                  </div>
                                                </label>
                                              </div>
                                            </td>
                                            <td style="vertical-align: middle !important;">
                                              <font size="1">ok</font>
                                            </td>
                                            @if ($pelanggansFoto->isNotEmpty())
                                            <td style="vertical-align: middle;">
                                              <div class="pull-right">
                                                @foreach ($pelanggansFoto as $group)
                                                  @php
                                                    $photos = $group->toArray();
                                                    if (count($photos) >= 6) {
                                                        $six = $photos[5];
                                                  @endphp
                                                        <img src="{{ asset('storage/images/' . $six['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                  @php
                                                    }
                                                  @endphp
                                                @endforeach
                                              </div>
                                            </td>
                                          @endif
                                          </tr>
                                          <tr>
                                            <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">7. Kabel drop yang masuk ODP memiliki panjang yang sama
                                              dan terikat rapi</td>
                                            <td style="vertical-align: middle !important;" width="1%">:</td>
                                            <td style="vertical-align: middle;width:10px;">
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_7" value="Y" required="">
                                                  <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                    OKE
                                                  </div>
                                                </label>
                                              </div>
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_7" value="N">
                                                  <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                    NOK
                                                  </div>
                                                </label>
                                              </div>
                                            </td>
                                            <td style="vertical-align: middle !important;">
                                              <font size="1">ok</font>
                                            </td>
                                            @if ($pelanggansFoto->isNotEmpty())
                                            <td style="vertical-align: middle;">
                                              <div class="pull-right">
                                                @foreach ($pelanggansFoto as $group)
                                                  @php
                                                    $photos = $group->toArray();
                                                    if (count($photos) >= 7) {
                                                        $sevent = $photos[6];
                                                  @endphp
                                                        <img src="{{ asset('storage/images/' . $sevent['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                  @php
                                                    }
                                                  @endphp
                                                @endforeach
                                              </div>
                                            </td>
                                          @endif
                                          </tr>
                                          <tr>
                                            <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">8. Kunci dome (Penutup ODP)</td>
                                            <td style="vertical-align: middle !important;" width="1%">:</td>
                                            <td style="vertical-align: middle;width:10px;">
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_8" value="Y" required="">
                                                  <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                    OKE
                                                  </div>
                                                </label>
                                              </div>
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_8" value="N">
                                                  <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                    NOK
                                                  </div>
                                                </label>
                                              </div>
                                            </td>
                                            <td style="vertical-align: middle !important;">
                                              <font size="1">ok</font>
                                            </td>
                                            @if ($pelanggansFoto->isNotEmpty())
                                            <td style="vertical-align: middle;">
                                              <div class="pull-right">
                                                @foreach ($pelanggansFoto as $group)
                                                  @php
                                                    $photos = $group->toArray();
                                                    if (count($photos) >= 8) {
                                                        $eight = $photos[7];
                                                  @endphp
                                                        <img src="{{ asset('storage/images/' . $eight['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                  @php
                                                    }
                                                  @endphp
                                                @endforeach
                                              </div>
                                            </td>
                                          @endif
                                          </tr>
                                          <tr>
                                            <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">9. Pintu ODP Tertutup/Terkunci</td>
                                            <td style="vertical-align: middle !important;" width="1%">:</td>
                                            <td style="vertical-align: middle;width:10px;">
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_9" value="Y" required="">
                                                  <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                    OKE
                                                  </div>
                                                </label>
                                              </div>
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_9" value="N">
                                                  <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                    NOK
                                                  </div>
                                                </label>
                                              </div>
                                            </td>
                                            <td style="vertical-align: middle !important;">
                                              <font size="1">ok</font>
                                            </td>
                                            @if ($pelanggansFoto->isNotEmpty())
                                            <td style="vertical-align: middle;">
                                              <div class="pull-right">
                                                @foreach ($pelanggansFoto as $group)
                                                  @php
                                                    $photos = $group->toArray();
                                                    if (count($photos) >= 9) {
                                                        $nine = $photos[8];
                                                  @endphp
                                                        <img src="{{ asset('storage/images/' . $nine['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                  @php
                                                    }
                                                  @endphp
                                                @endforeach
                                              </div>
                                            </td>
                                          @endif
                                          </tr>
                                          <tr>
                                            <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">10. Splitter, pastikan terpasang dengan baik</td>
                                            <td style="vertical-align: middle !important;" width="1%">:</td>
                                            <td style="vertical-align: middle;width:10px;">
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_10" value="Y" required="">
                                                  <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                    OKE
                                                  </div>
                                                </label>
                                              </div>
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_10" value="N">
                                                  <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                    NOK
                                                  </div>
                                                </label>
                                              </div>
                                            </td>
                                            <td style="vertical-align: middle !important;">
                                              <font size="1">ok</font>
                                            </td>
                                            @if ($pelanggansFoto->isNotEmpty())
                                            <td style="vertical-align: middle;">
                                              <div class="pull-right">
                                                @foreach ($pelanggansFoto as $group)
                                                  @php
                                                    $photos = $group->toArray();
                                                    if (count($photos) >= 10) {
                                                        $ten = $photos[9];
                                                  @endphp
                                                        <img src="{{ asset('storage/images/' . $ten['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                  @php
                                                    }
                                                  @endphp
                                                @endforeach
                                              </div>
                                            </td>
                                          @endif
                                          </tr>
                                          <tr>
                                            <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">11. Port idle, pastikan seluruhnya terpasang dust cap</td>
                                            <td style="vertical-align: middle !important;" width="1%">:</td>
                                            <td style="vertical-align: middle;width:10px;">
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_11" value="Y" required="">
                                                  <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                    OKE
                                                  </div>
                                                </label>
                                              </div>
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_11" value="N">
                                                  <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                    NOK
                                                  </div>
                                                </label>
                                              </div>
                                            </td>
                                            <td style="vertical-align: middle !important;">
                                              <font size="1">ok</font>
                                            </td>
                                            @if ($pelanggansFoto->isNotEmpty())
                                            <td style="vertical-align: middle;">
                                              <div class="pull-right">
                                                @foreach ($pelanggansFoto as $group)
                                                  @php
                                                    $photos = $group->toArray();
                                                    if (count($photos) >= 11) {
                                                        $elevent = $photos[10];
                                                  @endphp
                                                        <img src="{{ asset('storage/images/' . $elevent['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                  @php
                                                    }
                                                  @endphp
                                                @endforeach
                                              </div>
                                            </td>
                                          @endif
                                          </tr>
                                          <tr>
                                            <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">12. Bebas dari kabel drop yang sudah tidak terpakai</td>
                                            <td style="vertical-align: middle !important;" width="1%">:</td>
                                            <td style="vertical-align: middle;width:10px;">
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_12" value="Y" required="">
                                                  <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                    OKE
                                                  </div>
                                                </label>
                                              </div>
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_12" value="N">
                                                  <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                    NOK
                                                  </div>
                                                </label>
                                              </div>
                                            </td>
                                            <td style="vertical-align: middle !important;">
                                              <font size="1">ok</font>
                                            </td>
                                            @if ($pelanggansFoto->isNotEmpty())
                                            <td style="vertical-align: middle;">
                                              <div class="pull-right">
                                                @foreach ($pelanggansFoto as $group)
                                                  @php
                                                    $photos = $group->toArray();
                                                    if (count($photos) >= 12) {
                                                        $twelve = $photos[11];
                                                  @endphp
                                                        <img src="{{ asset('storage/images/' . $twelve['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                  @php
                                                    }
                                                  @endphp
                                                @endforeach
                                              </div>
                                            </td>
                                          @endif
                                          </tr>
                                          <tr>
                                            <td style="vertical-align: middle !important;font-size:12px;" width="1%" nowrap="">13. Pengukuran di ODP (Gunakan OPM)</td>
                                            <td style="vertical-align: middle !important;" width="1%">:</td>
                                            <td style="vertical-align: middle;width:10px;">
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_13" value="Y" required="">
                                                  <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                    OKE
                                                  </div>
                                                </label>
                                              </div>
                                              <div class="radio">
                                                <label>
                                                  <input type="radio" name="odp_13" value="N">
                                                  <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                    NOK
                                                  </div>
                                                </label>
                                              </div>
                                            </td>
                                            <td style="vertical-align: middle !important;">
                                              <font size="1">ok</font>
                                            </td>
                                            @if ($pelanggansFoto->isNotEmpty())
                                            <td style="vertical-align: middle;">
                                              <div class="pull-right">
                                                @foreach ($pelanggansFoto as $group)
                                                  @php
                                                    $photos = $group->toArray();
                                                    if (count($photos) >= 13) {
                                                        $thirteen = $photos[12];
                                                  @endphp
                                                        <img src="{{ asset('storage/images/' . $thirteen['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                  @php
                                                    }
                                                  @endphp
                                                @endforeach
                                              </div>
                                            </td>
                                          @endif
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
                                          <td style="vertical-align: middle;">
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_1" value="Y" required="">
                                                <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                  OKE
                                                </div>
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_1" value="N">
                                                <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                  NOK
                                                </div>
                                              </label>
                                            </div>
                                          </td>
                                          <td style="vertical-align: middle !important;">
                                            <font size="1">ok</font>
                                          </td>
                                          @if ($pelanggansFoto->isNotEmpty())
                                          <td style="vertical-align: middle;">
                                            <div class="pull-right">
                                              @foreach ($pelanggansFoto as $group)
                                                @php
                                                  $photos = $group->toArray();
                                                  if (count($photos) >= 14) {
                                                      $fourteen = $photos[13];
                                                @endphp
                                                      <img src="{{ asset('storage/images/' . $fourteen['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                @php
                                                  }
                                                @endphp
                                              @endforeach
                                            </div>
                                          </td>
                                        @endif
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle !important;font-size:12px;" width="1%">2. Di rumah pelanggan menggunakan clamp hook &amp;
                                            s-clamp</td>
                                          <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                          </td>
                                          <td style="vertical-align: middle;">
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_2" value="Y" required="">
                                                <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                  OKE
                                                </div>
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_2" value="N">
                                                <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                  NOK
                                                </div>
                                              </label>
                                            </div>
                                          </td>
                                          <td style="vertical-align: middle !important;">
                                            <font size="1">ok</font>
                                          </td>
                                          @if ($pelanggansFoto->isNotEmpty())
                                          <td style="vertical-align: middle;">
                                            <div class="pull-right">
                                              @foreach ($pelanggansFoto as $group)
                                                @php
                                                  $photos = $group->toArray();
                                                  if (count($photos) >= 15) {
                                                      $fourteen = $photos[14];
                                                @endphp
                                                      <img src="{{ asset('storage/images/' . $fourteen['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                @php
                                                  }
                                                @endphp
                                              @endforeach
                                            </div>
                                          </td>
                                        @endif
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle !important;font-size:12px;" width="1%">3. Tidak terdapat sambungan</td>
                                          <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                          </td>
                                          <td style="vertical-align: middle;">
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_3" value="Y" required="">
                                                <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                  OKE
                                                </div>
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_3" value="N">
                                                <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                  NOK
                                                </div>
                                              </label>
                                            </div>
                                          </td>
                                          <td style="vertical-align: middle !important;">
                                            <font size="1">ok</font>
                                          </td>
                                          @if ($pelanggansFoto->isNotEmpty())
                                          <td style="vertical-align: middle;">
                                            <div class="pull-right">
                                              @foreach ($pelanggansFoto as $group)
                                                @php
                                                  $photos = $group->toArray();
                                                  if (count($photos) >= 16) {
                                                      $sixteen = $photos[15];
                                                @endphp
                                                      <img src="{{ asset('storage/images/' . $sixteen['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                @php
                                                  }
                                                @endphp
                                              @endforeach
                                            </div>
                                          </td>
                                        @endif
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle !important;font-size:12px;" width="1%">4. Menggunakan OTP</td>
                                          <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                          </td>
                                          <td style="vertical-align: middle;">
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_4" value="Y" required="">
                                                <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                  OKE
                                                </div>
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_4" value="N">
                                                <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                  NOK
                                                </div>
                                              </label>
                                            </div>
                                          </td>
                                          <td style="vertical-align: middle !important;">
                                            <font size="1">ok</font>
                                          </td>
                                          @if ($pelanggansFoto->isNotEmpty())
                                          <td style="vertical-align: middle;">
                                            <div class="pull-right">
                                              @foreach ($pelanggansFoto as $group)
                                                @php
                                                  $photos = $group->toArray();
                                                  if (count($photos) >= 17) {
                                                      $seventeen = $photos[16];
                                                @endphp
                                                      <img src="{{ asset('storage/images/' . $seventeen['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                @php
                                                  }
                                                @endphp
                                              @endforeach
                                            </div>
                                          </td>
                                        @endif
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle !important;font-size:12px;" width="1%">5. Tidak ada penarikan dropcore di atas 50 m tanpa tiang
                                            (Penanaman tiang jika diperlukan)</td>
                                          <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                          </td>
                                          <td style="vertical-align: middle;">
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_5" value="Y" required="">
                                                <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                  OKE
                                                </div>
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_5" value="N">
                                                <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                  NOK
                                                </div>
                                              </label>
                                            </div>
                                          </td>
                                          <td style="vertical-align: middle !important;">
                                            <font size="1">ok</font>
                                          </td>
                                          @if ($pelanggansFoto->isNotEmpty())
                                          <td style="vertical-align: middle;">
                                            <div class="pull-right">
                                              @foreach ($pelanggansFoto as $group)
                                                @php
                                                  $photos = $group->toArray();
                                                  if (count($photos) >= 18) {
                                                      $eighteen = $photos[17];
                                                @endphp
                                                      <img src="{{ asset('storage/images/' . $eighteen['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                @php
                                                  }
                                                @endphp
                                              @endforeach
                                            </div>
                                          </td>
                                        @endif
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle !important;font-size:12px;" width="1%">6. Penggunaan dropcore sesuai list of material</td>
                                          <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                          </td>
                                          <td style="vertical-align: middle;">
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_6" value="Y" required="">
                                                <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                  OKE
                                                </div>
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_6" value="N">
                                                <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                  NOK
                                                </div>
                                              </label>
                                            </div>
                                          </td>
                                          <td style="vertical-align: middle !important;">
                                            <font size="1">ok</font>
                                          </td>
                                          @if ($pelanggansFoto->isNotEmpty())
                                          <td style="vertical-align: middle;">
                                            <div class="pull-right">
                                              @foreach ($pelanggansFoto as $group)
                                                @php
                                                  $photos = $group->toArray();
                                                  if (count($photos) >= 19) {
                                                      $nineteen = $photos[18];
                                                @endphp
                                                      <img src="{{ asset('storage/images/' . $nineteen['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                @php
                                                  }
                                                @endphp
                                              @endforeach
                                            </div>
                                          </td>
                                        @endif
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle !important;font-size:12px;" width="1%">7. Penggunaan connector sesuai list of material</td>
                                          <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                          </td>
                                          <td style="vertical-align: middle;">
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_7" value="Y" required="">
                                                <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                  OKE
                                                </div>
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_7" value="N">
                                                <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                  NOK
                                                </div>
                                              </label>
                                            </div>
                                          </td>
                                          <td style="vertical-align: middle !important;">
                                            <font size="1">ok</font>
                                          </td>
                                          @if ($pelanggansFoto->isNotEmpty())
                                          <td style="vertical-align: middle;">
                                            <div class="pull-right">
                                              @foreach ($pelanggansFoto as $group)
                                                @php
                                                  $photos = $group->toArray();
                                                  if (count($photos) >= 20) {
                                                      $twenty = $photos[19];
                                                @endphp
                                                      <img src="{{ asset('storage/images/' . $twenty['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                @php
                                                  }
                                                @endphp
                                              @endforeach
                                            </div>
                                          </td>
                                        @endif
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle !important;font-size:12px;" width="1%">8. Instalasi dropcore menggunakan pipa (bila menggunakan
                                            SPBT)</td>
                                          <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                          </td>
                                          <td style="vertical-align: middle;">
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_8" value="Y" required="">
                                                <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                  OKE
                                                </div>
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_8" value="N">
                                                <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                  NOK
                                                </div>
                                              </label>
                                            </div>
                                          </td>
                                          <td style="vertical-align: middle !important;">
                                            <font size="1">ok</font>
                                          </td>
                                          @if ($pelanggansFoto->isNotEmpty())
                                          <td style="vertical-align: middle;">
                                            <div class="pull-right">
                                              @foreach ($pelanggansFoto as $group)
                                                @php
                                                  $photos = $group->toArray();
                                                  if (count($photos) >= 21) {
                                                      $twentyOne = $photos[20];
                                                @endphp
                                                      <img src="{{ asset('storage/images/' . $twentyOne['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                @php
                                                  }
                                                @endphp
                                              @endforeach
                                            </div>
                                          </td>
                                        @endif
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle !important;font-size:12px;" width="1%">9. Messenger di tiang penanggal tidak dipotong</td>
                                          <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                          </td>
                                          <td style="vertical-align: middle;">
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_9" value="Y" required="">
                                                <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                  OKE
                                                </div>
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="saluran_9" value="N">
                                                <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                  NOK
                                                </div>
                                              </label>
                                            </div>
                                          </td>
                                          <td style="vertical-align: middle !important;">
                                            <font size="1">ok</font>
                                          </td>
                                          @if ($pelanggansFoto->isNotEmpty())
                                          <td style="vertical-align: middle;">
                                            <div class="pull-right">
                                              @foreach ($pelanggansFoto as $group)
                                                @php
                                                  $photos = $group->toArray();
                                                  if (count($photos) >= 22) {
                                                      $twentyTwo = $photos[21];
                                                @endphp
                                                      <img src="{{ asset('storage/images/' . $twentyTwo['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                @php
                                                  }
                                                @endphp
                                              @endforeach
                                            </div>
                                          </td>
                                        @endif
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
                                          <td style="vertical-align: middle;">
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="kabel_1" value="Y" required="">
                                                <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                  OKE
                                                </div>
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="kabel_1" value="N">
                                                <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                  NOK
                                                </div>
                                              </label>
                                            </div>
                                          </td>
                                          <td style="vertical-align: middle !important;">
                                            <font size="1">ok</font>
                                          </td>
                                          @if ($pelanggansFoto->isNotEmpty())
                                          <td style="vertical-align: middle;">
                                            <div class="pull-right">
                                              @foreach ($pelanggansFoto as $group)
                                                @php
                                                  $photos = $group->toArray();
                                                  if (count($photos) >= 23) {
                                                      $twentyThree = $photos[22];
                                                @endphp
                                                      <img src="{{ asset('storage/images/' . $twentyThree['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                @php
                                                  }
                                                @endphp
                                              @endforeach
                                            </div>
                                          </td>
                                        @endif
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle !important;font-size:12px;" width="1%">2. Roset terpasang dengan kuat dan kokoh dengan konektor
                                            menghadap ke bawah Minimal 40 cm dari lantai</td>
                                          <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                          </td>
                                          <td style="vertical-align: middle;">
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="kabel_2" value="Y" required="">
                                                <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                  OKE
                                                </div>
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="kabel_2" value="N">
                                                <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                  NOK
                                                </div>
                                              </label>
                                            </div>
                                          </td>
                                          <td style="vertical-align: middle !important;">
                                            <font size="1">ok</font>
                                          </td>
                                          @if ($pelanggansFoto->isNotEmpty())
                                          <td style="vertical-align: middle;">
                                            <div class="pull-right">
                                              @foreach ($pelanggansFoto as $group)
                                                @php
                                                  $photos = $group->toArray();
                                                  if (count($photos) >= 24) {
                                                      $twentyFour = $photos[23];
                                                @endphp
                                                      <img src="{{ asset('storage/images/' . $twentyFour['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                @php
                                                  }
                                                @endphp
                                              @endforeach
                                            </div>
                                          </td>
                                        @endif
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle !important;font-size:12px;" width="1%">3. Rute kabel harus berada di sudut dinding (jangan
                                            menyilang bidang)</td>
                                          <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                          </td>
                                          <td style="vertical-align: middle;">
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="kabel_3" value="Y" required="">
                                                <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                  OKE
                                                </div>
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="kabel_3" value="N">
                                                <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                  NOK
                                                </div>
                                              </label>
                                            </div>
                                          </td>
                                          <td style="vertical-align: middle !important;">
                                            <font size="1">ok</font>
                                          </td>
                                          @if ($pelanggansFoto->isNotEmpty())
                                          <td style="vertical-align: middle;">
                                            <div class="pull-right">
                                              @foreach ($pelanggansFoto as $group)
                                                @php
                                                  $photos = $group->toArray();
                                                  if (count($photos) >= 25) {
                                                      $twentyFive = $photos[24];
                                                @endphp
                                                      <img src="{{ asset('storage/images/' . $twentyFive['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                @php
                                                  }
                                                @endphp
                                              @endforeach
                                            </div>
                                          </td>
                                        @endif
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle !important;font-size:12px;" width="1%">4. Kabel harus melekat dengan kuat (menggunakan kabel
                                            tray, clip atau lem)</td>
                                          <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                          </td>
                                          <td style="vertical-align: middle;">
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="kabel_4" value="Y" required="">
                                                <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                  OKE
                                                </div>
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="kabel_4" value="N">
                                                <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                  NOK
                                                </div>
                                              </label>
                                            </div>
                                          </td>
                                          <td style="vertical-align: middle !important;">
                                            <font size="1">ok</font>
                                          </td>
                                            @if ($pelanggansFoto->isNotEmpty())
                                            <td style="vertical-align: middle;">
                                              <div class="pull-right">
                                                @foreach ($pelanggansFoto as $group)
                                                  @php
                                                    $photos = $group->toArray();
                                                    if (count($photos) >= 26) {
                                                        $twentySix = $photos[25];
                                                  @endphp
                                                        <img src="{{ asset('storage/images/' . $twentySix['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                  @php
                                                    }
                                                  @endphp
                                                @endforeach
                                              </div>
                                            </td>
                                          @endif
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle !important;font-size:12px;" width="1%">5. Kabel melalui jalur yang sudah disiapkan di rumah</td>
                                          <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                          </td>
                                          <td style="vertical-align: middle;">
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="kabel_5" value="Y" required="">
                                                <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                  OKE
                                                </div>
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="kabel_5" value="N">
                                                <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                  NOK
                                                </div>
                                              </label>
                                            </div>
                                          </td>
                                          <td style="vertical-align: middle !important;">
                                            <font size="1">ok</font>
                                          </td>
                                          @if ($pelanggansFoto->isNotEmpty())
                                          <td style="vertical-align: middle;">
                                            <div class="pull-right">
                                              @foreach ($pelanggansFoto as $group)
                                                @php
                                                  $photos = $group->toArray();
                                                  if (count($photos) >= 27) {
                                                      $twentySevent = $photos[26];
                                                @endphp
                                                      <img src="{{ asset('storage/images/' . $twentySevent['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                @php
                                                  }
                                                @endphp
                                              @endforeach
                                            </div>
                                          </td>
                                        @endif
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle !important;font-size:12px;" width="1%">6. Pengukuran Redaman Power ONT Rx Level mengunakan
                                            Ibooster</td>
                                          <td style="vertical-align: middle !important;" width="1%" nowrap="">:
                                          </td>
                                          <td style="vertical-align: middle;">
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="kabel_6" value="Y" required="">
                                                <div class="badge" style="width:50px;background-color:#008000;color:white;font-weight:bold;">
                                                  OKE
                                                </div>
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="kabel_6" value="N">
                                                <div class="badge" style="width:50px;background-color:red;color:white;font-weight:bold;">
                                                  NOK
                                                </div>
                                              </label>
                                            </div>
                                          </td>
                                          <td style="vertical-align: middle !important;">
                                            <font size="1">ok</font>
                                          </td>
                                          @if ($pelanggansFoto->isNotEmpty())
                                          <td style="vertical-align: middle;">
                                            <div class="pull-right">
                                              @foreach ($pelanggansFoto as $group)
                                                @php
                                                  $photos = $group->toArray();
                                                  if (count($photos) >= 28) {
                                                      $twentyEight = $photos[27];
                                                @endphp
                                                      <img src="{{ asset('storage/images/' . $twentyEight['file']) }}" alt="Foto Pelanggan" width="120px" height="90px" class="img-thumbnail">
                                                @php
                                                  }
                                                @endphp
                                              @endforeach
                                            </div>
                                          </td>
                                        @endif
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
                                              <textarea name="catatan" placeholder="catatan..." style="width: 100%; font-size:12px;" class="fc-catatan  input-sm" required=""></textarea>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <th style="color:red;" width="1%" nowrap=""></th>
                                          <th width="1%"></th>
                                          <td colspan="3">
                                            <a href="validator.html">
                                                <input class="btn-custom btn-primary" type="submit" name="add_progress" value="Update Progress">
                                            </a>
                                          </td>
                                        </tr>
                                      </div>
                                      </tbody>
                                    </table>
                      
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