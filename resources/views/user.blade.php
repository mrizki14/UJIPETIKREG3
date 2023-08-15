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
    <link rel="stylesheet" href="{{asset('assets/css/user.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/layets.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/sass.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="{{asset('assets/css/cdntable.css')}}"> 
    <link rel="stylesheet" href="{{asset('assets/css/cdntablebs.css')}}"> 
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
                                    <div class="panel-tittle">LIST DATA USER</div>
                                    <div class="panel-option">  
                                        <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="uil uil-user-plus"></i>
                                            Create User
                                        </button>
                                        <form action="{{route('users.store')}}" method="POST">
                                            @csrf
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel">
                                                            <i class="uil uil-user-plus"></i>
                                                            Tambah Akun</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                   
                                                            <div class="row mt-2 mb-3 fs-6">
                                                                <label for="" class="col-sm-4">WITEL</label>
                                                                <div class="col-sm-8 fs-3">
                                                                    <select class="form-select" name="witel" required>
                                                                        <option value="1" selected>BANDUNG</option>
                                                                        <option value="2">BANDUNG BARAT</option>
                                                                        <option value="3">CIREBON</option>
                                                                        <option value="4">KARAWANG</option>
                                                                        <option value="5">SUKABUMI</option>
                                                                        <option value="6">TASIKMALAYA</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2 mb-3 fs-6">
                                                                <label for="" class="col-sm-4">Nama Lengkap</label>
                                                                <div class="col-sm-8 fs-6">
                                                                    <input class="form-control" name="name" type="text" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2 mb-3 fs-6">
                                                                <label for="" class="col-sm-4">Username</label>
                                                                <div class="col-sm-8 fs-6">
                                                                    <input class="form-control" name="username" type="text" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2 mb-3 fs-6">
                                                                <label for="" class="col-sm-4">Type Login</label>
                                                                <div class="col-sm-8 fs-6">
                                                                    <select class="form-select">
                                                                        <option value="1"selected>Local Password</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2 mb-3 fs-6">
                                                                <label for="" class="col-sm-4">Password</label>
                                                                <div class="col-sm-8 fs-6">
                                                                    <input class="form-control" name="password" type="password" required>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2 mb-3 fs-6">
                                                                <label for="" class="col-sm-4">Akses</label>
                                                                <div class="col-sm-8 fs-6">
                                                                    <select class="form-select" name="role_id" required>
                                                                       @foreach ($roles as $role)
                                                                           <option value="{{$role->id}}">{{$role->name}}</option>
                                                                       @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                       
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                @foreach ($users as $user)
                                <form action="{{route('users.update', $user->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">
                                                <i class="uil uil-pen"></i>
                                                Update Akun</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mt-2 mb-3 fs-6">
                                                    <label for="" class="col-sm-4">WITEL</label>
                                                    <div class="col-sm-8 fs-3">
                                                        <select class="form-select" name="witel">
                                                            @foreach ($witels as $key => $witel)
                                                            <option value="{{ $key }}"
                                                                {{ $user->witel == $key ? 'selected' : '' }}>
                                                                {{ $witel }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row mt-2 mb-3 fs-6">
                                                    <label for="" class="col-sm-4">Nama Lengkap</label>
                                                    <div class="col-sm-8 fs-6">
                                                        <input class="form-control" value="{{$user->name}}" name="name" type="text">
                                                    </div>
                                                </div>
                                                <div class="row mt-2 mb-3 fs-6">
                                                    <label for="" class="col-sm-4">Username</label>
                                                    <div class="col-sm-8 fs-6">
                                                        <input class="form-control" value="{{$user->username}}" name="username" type="text">
                                                    </div>
                                                </div>
                                                <div class="row mt-2 mb-3 fs-6">
                                                    <label for="" class="col-sm-4">Type Login</label>
                                                    <div class="col-sm-8 fs-6">
                                                        <select class="form-select">
                                                            <option value="1"selected>Local Password</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mt-2 mb-3 fs-6">
                                                    <label for="" class="col-sm-4">Password</label>
                                                    <div class="col-sm-8 fs-6">
                                                        <input class="form-control" name="password" type="password">
                                                    </div>
                                                </div>
                                                <div class="row mt-2 mb-3 fs-6">
                                                    <label for="" class="col-sm-4">Akses</label>
                                                    <div class="col-sm-8 fs-6">
                                                        <select class="form-select" name="role_id" required>
                                                        @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}"
                                                            {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                                            {{ $role->name }}
                                                        </option>
                                                        @endforeach 
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                                @endforeach
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-hover table-bordered" style="width: 100%;font-size:12px;text-align: center;">
                                                <thead>
                                                    <tr>
                                                        <td>NO</td>
                                                        <td>WITEL</td>
                                                        <td>NAMA</td>
                                                        <td>USERNAME</td>
                                                        <td>TYPE AUTH</td>
                                                        <td>AKSES</td>
                                                        <td>STATUS</td>
                                                        <td>OPTION</td>
                                                    </tr>
                                                </thead>
            
                                                <tbody>
                                                    @php
                                                        $no = 1
                                                    @endphp
                                                    @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>
                                                            @foreach ($witels as $key => $item)
                                                            {{$user->witel == $key ? $item  : '' }}
                                                            @endforeach
                                                        </td>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->username}}</td>
                                                        <td>Local Password</td>
                                                        <td>{{$user->role->name}}</td>
                                                        <td>Active</td>
                                                        <form action="{{ route('users.destroy', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        <td>
                                                            <a href="" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}" style="text-decoration: none;">
                                                                <i class="uil uil-pen"></i>
                                                                Update
                                                            </a>
                                                            <button class="btn btn-sm" type="submit"
                                                                onclick="return confirm('Apakah kamu yakin menghapus user ini?')">
                                                                <i class="uil uil-trash">Delete</i>
                                                            </button>
                                                            {{-- <a href="">
                                                                <i class="uil uil-trash"></i>
                                                                Delete
                                                            </a> --}}
                                                        </td>
                                                    </form>
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
        </section>
    </div>
    
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="https://kit.fontawesome.com/e360b5871d.js" crossorigin="anonymous"></script>
</body>
</html>
