<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="card card-secondary color-palette-box">
        <div class="card-header">
          <div class="row">
            <h3 class="card-title">
              <i class="fas fa-coins"></i>
              Hutang
            </h3>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped table-sm table-bordered">
            <thead>
              <tr>
                <th style="width: 2%" class="text-center">No</th>
                <th style="width: 40%">Nama Suplier</th>
                <th style="width: 15%">Total Hutang</th>
                <th style="width: 10%">Status Hutang</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center">1</td>
                <td>
                  <router-link to="daftar-hutang">Mawar distributor</router-link>
                </td>
                <td>1.000.000</td>
                <td class="text-center">
                  <span class="bg-green">Lunas</span>
                </td>
              </tr>
              <tr>
                <td class="text-center">1</td>
                <td>
                  <router-link to="daftar-hutang">Mawar distributor</router-link>
                </td>
                <td>1.000.000</td>
                <td class="text-center">
                  <span class="bg-yellow">Belum Lunas</span>
                </td>
              </tr>
              <tr>
                <td class="text-center">1</td>
                <td>
                  <router-link to="daftar-hutang">Mawar distributor</router-link>
                </td>
                <td>1.000.000</td>
                <td class="text-center">
                  <span class="bg-red">Jatuh Tempo</span>
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