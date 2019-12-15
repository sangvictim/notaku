<template>
  <div>
    <div class="content-header">
      <section class="content">
        <div class="container-fluid">
          <!-- COLOR PALETTE -->
          <div class="card card-secondary color-palette-box">
            <div class="card-header">
              <div class="row">
                <div class="col-2 d-flex align-items-center">
                  <h3 class="card-title">
                    <i class="fas fa-tv"></i>
                    Penjualan
                  </h3>
                </div>
                <div class="col-3 row d-flex align-items-center">
                  <label class="col-4">Tanggal</label>
                  <div class="col-8">
                    <input
                      type="text"
                      class="form-control form-control-sm"
                      v-model="tanggal"
                      disabled
                    />
                  </div>
                </div>
                <div class="col-4 row d-flex align-items-center">
                  <label class="col-4">No. Faktur</label>
                  <div class="col-8">
                    <input type="email" class="form-control form-control-sm" disabled />
                  </div>
                </div>
                <div class="col-3 row d-flex align-items-center">
                  <label class="col-6">Id. Customer</label>
                  <div class="col-6">
                    <input
                      type="email"
                      class="form-control form-control-sm"
                      placeholder="Id. Customer"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label>Kode Barang</label>
                    <input
                      type="text"
                      name="kode_barang"
                      id="kode_barang"
                      class="form-control"
                      autofocus
                      accesskey="F1"
                      placeholder="Kode Barang"
                    />
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input
                      type="text"
                      name="nama_barang"
                      id="nama_barang"
                      class="form-control"
                      placeholder="Nama Barang"
                      disabled
                    />
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label>Jumlah Barang</label>
                    <input
                      type="number"
                      min="0"
                      name="jumlah_barang"
                      id="jumlah_barang"
                      class="form-control"
                      placeholder="Jumlah Barang"
                    />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <table class="table table-scroll table-striped table-sm">
                    <thead>
                      <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 15%">Kode Barang</th>
                        <th style="width: 40%">Nama Barang</th>
                        <th style="width: 10%">Jumlah</th>
                        <th style="width: 15%" class="text-center">Harga</th>
                        <th style="width: 7%">#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="width: 2%">1.</td>
                        <td style="width: 15%">BRG201901</td>
                        <td style="width: 40%">Nama Barang satu</td>
                        <td style="width: 10%">5</td>
                        <td style="width: 15%" class="text-right">15.000</td>
                        <td style="width: 7%">
                          <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 2%">1.</td>
                        <td style="width: 15%">BRG201901</td>
                        <td style="width: 40%">Nama Barang satu</td>
                        <td style="width: 10%">5</td>
                        <td style="width: 15%" class="text-right">15.000</td>
                        <td style="width: 7%">
                          <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 2%">1.</td>
                        <td style="width: 15%">BRG201901</td>
                        <td style="width: 40%">Nama Barang satu</td>
                        <td style="width: 10%">5</td>
                        <td style="width: 15%" class="text-right">15.000</td>
                        <td style="width: 7%">
                          <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 2%">1.</td>
                        <td style="width: 15%">BRG201901</td>
                        <td style="width: 40%">Nama Barang satu</td>
                        <td style="width: 10%">5</td>
                        <td style="width: 15%" class="text-right">15.000</td>
                        <td style="width: 7%">
                          <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 2%">1.</td>
                        <td style="width: 15%">BRG201901</td>
                        <td style="width: 40%">Nama Barang satu</td>
                        <td style="width: 10%">5</td>
                        <td style="width: 15%" class="text-right">15.000</td>
                        <td style="width: 7%">
                          <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 2%">1.</td>
                        <td style="width: 15%">BRG201901</td>
                        <td style="width: 40%">Nama Barang satu</td>
                        <td style="width: 10%">5</td>
                        <td style="width: 15%" class="text-right">15.000</td>
                        <td style="width: 7%">
                          <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 2%">1.</td>
                        <td style="width: 15%">BRG201901</td>
                        <td style="width: 40%">Nama Barang satu</td>
                        <td style="width: 10%">5</td>
                        <td style="width: 15%" class="text-right">15.000</td>
                        <td style="width: 7%">
                          <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-4">
                  <div class="row">
                    <div class="col-3 d-flex align-items-center">
                      <span>Sub total</span>
                    </div>
                    <div class="col-9 text-right">
                      <h1 style="color: red; font-size: 5rem; font-weight: bold;">12.000</h1>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <select name="cara_bayar" class="form-control">
                        <option value="0">Cash</option>
                        <option value="1">Transfer</option>
                      </select>
                    </div>
                    <div class="col-8">
                      <input type="number" min="0" class="form-control" placeholder="Nominal" />
                    </div>
                  </div>
                  <div class="row py-1">
                    <div class="col-4 d-flex align-items-center">
                      <input
                        type="number"
                        min="0"
                        name="discount"
                        id="discount"
                        class="form-control"
                        placeholder="Discount"
                      />
                    </div>
                    <div class="col-3 d-flex align-items-center">
                      <select name="type_discount" class="form-control">
                        <option value="persen">%</option>
                        <option value="net">Rp</option>
                      </select>
                    </div>
                    <div class="col-5">
                      <input
                        type="text"
                        name="kode_promo"
                        id="kode_promo"
                        class="form-control"
                        placeholder="Kode Promo"
                      />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3">
                      <label>Total</label>
                    </div>
                    <div class="col-9 text-right">
                      <h1 style="color: blue; font-weight: bold;">12.000</h1>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4 d-flex align-items-center">
                      <label>Bayar</label>
                    </div>
                    <div class="col-8">
                      <input
                        type="number"
                        min="0"
                        name="jumlah_bayar"
                        id="jumlah_bayar"
                        class="form-control"
                        placeholder="jumlah bayar"
                      />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3">
                      <label>Kembalian</label>
                    </div>
                    <div class="col-9 text-right">
                      <h4 style="font-weight: bold;">12.000</h4>
                    </div>
                  </div>
                  <div class="row d-flex justify-content-between">
                    <button class="btn btn-primary btn-sm">
                      <i class="fa fa-save"></i> Simpan
                    </button>
                    <button class="btn btn-primary btn-sm">
                      <i class="fa fa-archive"></i> Pending
                    </button>
                    <button
                      class="btn btn-primary btn-sm"
                      data-toggle="modal"
                      data-target="#modal_list_pending"
                    >
                      <i class="fa fa-archive"></i> List pending
                    </button>
                    <button class="btn btn-primary btn-sm">
                      <i class="fa fa-file"></i> Baru
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.container-fluid -->
      <!-- Modal -->
    </div>
    <!-- /.content-header -->
    <div
      class="modal fade"
      id="modal_list_pending"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">...</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tanggal: new Date().toLocaleDateString()
    };
  }
};
</script>