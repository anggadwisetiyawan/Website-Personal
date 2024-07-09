<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--  Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="app-icon.png">

    <title>REKAMEDIS RUMAH SAKIT XYZ</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
</head>
<body>

<!-- Add Pasient -->
<div class="modal fade" id="pasienAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="savePasien">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Pemeriksa</label>
                    <input type="text" name="pemeriksa" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Diagnosa</label>
                    <input type="text" name="diagnosa" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan Pasien</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit  Modal -->
<div class="modal fade" id="pasienEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Pasien</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updatePasien">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="pasien_id" id="pasien_id" >

                <div class="mb-3">
                    <label for="">nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Pemeriksa</label>
                    <input type="text" name="pemeriksa" id="pemeriksa" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Diagnosa</label>
                    <input type="text" name="diagnosa" id="diagnosa" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Keterangan</label>
                    <input type="text" name="keterangan" id="keterangan" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Pasien</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View Pasien Modal -->
<div class="modal fade" id="pasienViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Lihat Pasien</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="">Nama</label>
                    <p id="view_name" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Alamat</label>
                    <p id="view_email" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Pemeriksa</label>
                    <p id="view_phone" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Diagnosa</label>
                    <p id="view_course" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Keterangan</label>
                    <p id="view_course" class="form-control"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hospital" viewBox="0 0 16 16">
  <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1zM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25zM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25zM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25z"/>
  <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1zm2 14h2v-3H7zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1zm0-14H6v1h4zm2 7v7h3V8zm-8 7V8H1v7z"/>
</svg>
                    <h4>REKAMEDIS RUMAH SAKIT XYZ
                        
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#pasienAddModal">
                            Tambah Pasien
                        </button>
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Pemeriksa</th>
                                <th>Diagnosa</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'dbcon.php';

                            $query = "SELECT * FROM data_pasien";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $pasien);
                                {
                                    ?>
                                    <tr>
                                        <td><?= $pasien['id'] ?></td>
                                        <td><?= $pasien['nama'] ?></td>
                                        <td><?= $pasien['alamat'] ?></td>
                                        <td><?= $pasien['pemeriksa'] ?></td>
                                        <td><?= $pasien['diagnosa'] ?></td>
                                        <td><?= $pasien['keterangan'] ?></td>
                                        <td>
                                            <button type="button" value="<?=$pasien['id'];?>" class="viewPasienBtn btn btn-info btn-sm">Lihat</button>
                                            <button type="button" value="<?=$pasien['id'];?>" class="editPasienBtn btn btn-success btn-sm">Edit</button>
                                            <button type="button" value="<?=$pasien['id'];?>" class="deletePasienBtn btn btn-danger btn-sm">Hapus</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src= "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.rtl.min.css"/>

    <script>
        
        $(document).on('submit', '#savePasien', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_pasien", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res =  jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        $('#data_pasienAddModal').modal('hide');
                        $('#savePasien')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.editPasienBtn', function () {

            var pasien_id = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "code.php?pasien_id=" + pasien_id,
                success: function (response) {

                    var res =  jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#pasien_id').val(res.data.id);
                        $('#nama').val(res.data.nama);
                        $('#alamat').val(res.data.alamat);
                        $('#pemeriksa').val(res.data.pemeriksa);
                        $('#diagnosa').val(res.data.diagnosa);
                        $('#keterangan').val(res.data.keterangan);

                        $('#pasienEditModal').modal('show');
                    }

                }
            });

        });

        $(document).on('submit', '#updatePasien', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_pasien", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res =  jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessageUpdate').addClass('d-none');

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                        
                        $('#pasienEditModal').modal('hide');
                        $('#pasienpasien')[0].reset();

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.viewpasienBtn', function () {

            var pasien_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "code.php?pasien_id=" + pasien_id,
                success: function (response) {

                    var res =  jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#view_nama').text(res.data.nama);
                        $('#view_alamat').text(res.data.alamat);
                        $('#view_pemeriksa').text(res.data.pemeriksa);
                        $('#view_diagnosa').text(res.data.diagnosa);
                        $('#view_keterangan').text(res.data.keterangan);
                        $('#pasienViewModal').modal('show');
                    }
                }
            });
        });

        $(document).on('click', '.deletePasienBtn', function (e) {
            e.preventDefault();

            if(confirm('Apakah anda yakin untuk menghapus data ini?'))
            {
                var pasien_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'delete_pasien': true,
                        'pasien_id':pasien_id
                    },
                    success: function (response) {

                        var res =  jQuery.parseJSON(response);
                        if(res.status == 500) {

                            alert(res.message);
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);

                            $('#myTable').load(location.href + " #myTable");
                        }
                    }
                });
            }
        });

    </script>

</body>
</html>