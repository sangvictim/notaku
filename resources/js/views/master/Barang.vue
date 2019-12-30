<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="card card-secondary color-palette-box">
        <div class="card-header">
          <div class="row">
            <div class="col-2">
              <button class="btn btn-info">
                <i class="fa fa-plus"></i> Barang
              </button>
            </div>
            <div class="col-7 d-flex justify-content-center">
              <h3>
                <i class="fa fa-coins"></i> Master Barang
              </h3>
            </div>
            <div class="col-3">
              <input type="text" class="form-control" placeholder="Cari Kode / Nama Barang" />
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped table-sm table-bordered">
            <thead>
              <tr>
                <th style="width: 2%" class="text-center">No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Beli</th>
                <th>Harga Grosir</th>
                <th>Harga Retail</th>
                <th style="width: 5%" class="text-center">#</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center">1</td>
                <td>BRG12345</td>
                <td>Nama Barang 1</td>
                <td>1.000.000</td>
                <td>1.000.000</td>
                <td>500.000</td>
                <td class="text-center">
                  <div class="btn-group dropleft">
                    <button
                      class="btn btn-info btn-sm dropdown-toggle dropdown-toggle-split"
                      data-toggle="dropdown"
                    >
                      <i class="fa fa-cog str-only"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a href class="dropdown-item">Edit</a>
                      <a href class="dropdown-item">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
</template>

<script>
export default {};
</script>