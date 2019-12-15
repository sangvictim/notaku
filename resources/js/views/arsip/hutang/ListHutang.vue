<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="card card-secondary color-palette-box">
        <div class="card-header">
          <div class="row">
            <h3 class="card-title">
              <i class="fas fa-coins"></i>
              Daftar Hutang > Nama supplier
            </h3>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped table-sm table-bordered">
            <thead>
              <tr>
                <th style="width: 2%" class="text-center">No</th>
                <th style="width: 15%">No Faktur</th>
                <th style="width: 40%">Nama Suplier</th>
                <th style="width: 15%">jumlah Hutang</th>
                <th style="width: 10%">Status Hutang</th>
                <th style="width: 2%">Pelunasan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center">1</td>
                <td>FAK12345678</td>
                <td>Mawar distributor</td>
                <td>1.000.000</td>
                <td class="text-center">
                  <span class="bg-green">Lunas</span>
                </td>
                <td class="text-center">
                  <router-link to="pelunasan-hutang" class="btn btn-info btn-sm">
                    <i class="fas fa-dollar-sign"></i>
                  </router-link>
                </td>
              </tr>
              <tr>
                <td class="text-center">1</td>
                <td>FAK12345678</td>
                <td>Mawar distributor</td>
                <td>1.000.000</td>
                <td class="text-center">
                  <span class="bg-yellow">Belum Lunas</span>
                </td>
                <td class="text-center">
                  <router-link to="pelunasan-hutang" class="btn btn-info btn-sm">
                    <i class="fas fa-dollar-sign"></i>
                  </router-link>
                </td>
              </tr>
              <tr>
                <td class="text-center">1</td>
                <td>FAK12345678</td>
                <td>Mawar distributor</td>
                <td>1.000.000</td>
                <td class="text-center">
                  <span class="bg-red">Jatuh Tempo</span>
                </td>
                <td class="text-center">
                  <router-link to="pelunasan-hutang" class="btn btn-info btn-sm">
                    <i class="fas fa-dollar-sign"></i>
                  </router-link>
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