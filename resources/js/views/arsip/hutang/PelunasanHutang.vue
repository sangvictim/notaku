<template>
  <div>
    <div class="content-header">
      <div class="container-fluid">
        <div class="card card-secondary color-palette-box">
          <div class="card-header">
            <div class="row">
              <h3 class="card-title">
                <i class="fas fa-coins"></i>
                Pelunasan Hutang > Nomor Faktur
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
                  <th style="width: 15%">Debit</th>
                  <th style="width: 10%">Kredit</th>
                  <th style="width: 10%">Pembayaran</th>
                  <th style="width: 2%">Pelunasan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center">1</td>
                  <td>FAK12345678</td>
                  <td>Mawar distributor</td>
                  <td>1.000.000</td>
                  <td>0</td>
                  <td></td>
                  <td class="text-center">
                    <router-link
                      to="pelunasan-hutang"
                      class="btn btn-info btn-sm"
                      data-toggle="modal"
                      data-target="#modal-pelunasan"
                    >
                      <i class="fas fa-dollar-sign"></i>
                    </router-link>
                  </td>
                </tr>
                <tr>
                  <td class="text-center">2</td>
                  <td colspan="3"></td>
                  <td>500.000</td>
                  <td>Cash</td>
                  <td class="text-center">
                    <router-link
                      to="pelunasan-hutang"
                      class="btn btn-danger btn-sm"
                      data-toggle="modal"
                      data-target="#modal-pelunasan"
                    >
                      <i class="fas fa-trash"></i>
                    </router-link>
                  </td>
                </tr>
                <tr>
                  <td class="text-center">3</td>
                  <td colspan="3"></td>
                  <td>300.000</td>
                  <td>Transfer</td>
                  <td class="text-center">
                    <router-link
                      to="pelunasan-hutang"
                      class="btn btn-danger btn-sm"
                      data-toggle="modal"
                      data-target="#modal-pelunasan"
                    >
                      <i class="fas fa-trash"></i>
                    </router-link>
                  </td>
                </tr>
                <tr>
                  <td colspan="4" class="text-right">Total hutang</td>
                  <td>0</td>
                  <td></td>
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
    <div
      class="modal fade"
      id="modal-pelunasan"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pelunasan Hutang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label>No. Faktur</label>
                  <input type="text" class="form-control" placeholder="No. Faktur" />
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Nama Supplier</label>
                  <input type="text" class="form-control" placeholder="Nama Supplier" />
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Jumlah Bayar</label>
                  <input type="number" min="0" class="form-control" placeholder="Jumlah Bayar" />
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Pembayaran</label>
                  <select class="form-control">
                    <option value="cash">Cash</option>
                    <option value="transfer">Transfer</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Bayar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>