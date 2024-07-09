<?php

require 'dbcon.php';

if(isset($_POST['save_pasien']))
{
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $alamat = mysqli_real_escape_string($con, $_POST['alamat']);
    $pemeriksa = mysqli_real_escape_string($con, $_POST['pemeriksa']);
    $diagnosa = mysqli_real_escape_string($con, $_POST['diagnosa']);
    $keterangan = mysqli_real_escape_string($con, $_POST['keterangan']);

    if($nama == NULL || $alamat == NULL || $pemeriksa == NULL || $diagnosa == NULL || $keterangan == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'Semua Bidang Wajib Di Isi'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO data_pasien (nama,alamat,pemeriksa,diagnosa,keterangan) VALUES ('$nama','$alamat','$pemeriksa','$diagnosa', '$keterangan')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Pasien Berhasil Dibuat'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Paien Gagal Dibuat'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_POST['update_pasien']))
{
    $pasien_id = mysqli_real_escape_string($con, $_POST['pasien_id']);

    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $alamat = mysqli_real_escape_string($con, $_POST['alamat']);
    $pemeriksa = mysqli_real_escape_string($con, $_POST['pemeriksa']);
    $diagnosa = mysqli_real_escape_string($con, $_POST['diagnosa']);
    $keterangan = mysqli_real_escape_string($con, $_POST['keterangan']);

    if($nama == NULL || $alamat == NULL || $pemeriksa == NULL || $diagnosa == NULL || $keterangan == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'Semua Bidang Wajib Di Isi'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE data_pasien SET nama='$nama', alamat='$alamat', pemeriksa='$pemeriksa', diagnosa='$diagnosa', keterangan= '$keterangan' 
                WHERE id='$pasien_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Pasien Berhasil Diupdate'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Pasien Gagal Diupdate'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_GET['pasien_id']))
{
    $pasien_id = mysqli_real_escape_string($con, $_GET['pasien_id']);

    $query = "SELECT * FROM data_pasien WHERE id='$pasien_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $pasien= mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Pasien Berhasil Mengambil berdasarkan id',
            'data' => $pasien
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Id Pasien Tidak Ditemukan'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_pasien']))
{
    $pasien_id = mysqli_real_escape_string($con, $_POST['pasien_id']);

    $query = "DELETE FROM data_pasien WHERE id='$pasien_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Pasien Berhasil Dihapus'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Pasien Gagal Dihapus'
        ];
        echo json_encode($res);
        return;
    }
}

?>