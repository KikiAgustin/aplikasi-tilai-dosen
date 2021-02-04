<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12 col-lg-6">
            <form action="" method="POST">

                <input type="hidden" name="id_akupuntur" value="<?= $edit_akupuntur['id_akupuntur']; ?>">

                <div class="form-group">
                    <label for="exampleFormControlSelect1" class="font-weight-bold">Edit Status Pesanan</label>
                    <select class="form-control" name="status" id="exampleFormControlSelect1">
                        <option>--Pilih--</option>
                        <option value="0">Belum diproses</option>
                        <option value="1"> Sedang diproses</option>
                        <option value="2"> Selesai</option>
                        <option value="3"> Failed</option>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Edit Pesanan</button>

            </form>
        </div>

    </div>

</div>
<!-- /.container-fluid -->