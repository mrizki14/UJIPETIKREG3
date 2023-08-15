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

                                <form action="" method="">
                                    <div class="form-group">
                                        <label for="" style="">Periode :</label>
                                        <div class="bulan">
                                            <select class="form-cs" type="text" name="bulan" id="">
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07" selected>Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                                </select>
                                        </div>                     
                                        <div class="tahun">
                                            <select class="form-cs" type="text" name="tahun" id="">
                                                <option value="01" selected>2023</option>
                                                <option value="02">2023</option>
                                                <option value="03">2023</option>
                                            </select>
                                        </div>                     
                                        <div class="tombol">
                                            <button type="submit" name="filter" class="button">
                                                <i class="uil uil-setting"></i>
                                                Filter
                                            </button>   
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Export Excel
                                            </button>                                  </div>
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
                                            <tr>
                                                <td style="text-align: left; padding-left: 15px;">
                                                    <i class="uil uil-plus-square"></i>
                                                    <a href="">BANDUNG</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href=""">100</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">75</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">25</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">75</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0%</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0%</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0%</a>
                                                </td>
                                            </tr>
                          
                                            <tr>
                                                <td style="text-align: left; padding-left: 15px;">
                                                    <i class="uil uil-plus-square"></i>
                                                    <a href="">BANDUNG BARAT</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">75</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0%</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0%</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0%</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left; padding-left: 15px;">
                                                    <i class="uil uil-plus-square"></i>
                                                    <a href="">CIREBON</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">75</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0%</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0%</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0%</a>
                                                </td>
                                            </tr>
                          
                                            <tr>
                                                <td style="text-align: left; padding-left: 15px;">
                                                    <i class="uil uil-plus-square"></i>
                                                    <a href="">KARAWANG</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">75</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0%</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0%</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0%</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  style="text-align: left; padding-left: 15px;">
                                                    <i class="uil uil-plus-square"></i>
                                                    <a href="">SUKABUMI</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">75</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0%</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0%</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="">0%</a>
                                                </td>
                                            </tr>
                          
                                            <tr>
                                              <td style="text-align: left; padding-left: 15px;">
                                                <i class="uil uil-plus-square"></i>
                                                <a href="">TASIKMALAYA</a>
                                              </td>
                                              <td style="text-align: center;">
                                                <a href="">0</a>
                                              </td>
                                              <td style="text-align: center;">
                                                <a href="">0</a>
                                              </td>
                                              <td style="text-align: center;">
                                                <a href="">0</a>
                                              </td>
                                              <td style="text-align: center;">
                                                <a href="">75</a>
                                              </td>
                                              <td style="text-align: center;">
                                                <a href="">0%</a>
                                              </td>
                                              <td style="text-align: center;">
                                                <a href="">0%</a>
                                              </td>
                                              <td style="text-align: center;">
                                                <a href="">0%</a>
                                              </td>
                                            </tr>
                          
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
</html>