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
                <div class="col-4 row d-flex align-items-center">
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
                  <label class="col-4">Customer</label>
                  <div class="col-8">
                    <input
                      type="text"
                      class="form-control form-control-sm"
                      placeholder="Id. Customer"
                      v-model="id_customer"
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
                      ref="code"
                      class="form-control"
                      style="text-transform:uppercase"
                      autofocus
                      accesskey="F1"
                      v-model="newBarang.code"
                      placeholder="Kode Barang"
                      v-on:keyup="CheckBarang"
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
                      v-model="newBarang.name"
                    />
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label>Jumlah Barang</label>
                    <input
                      type="number"
                      min="0"
                      ref="qty"
                      name="jumlah_barang"
                      id="jumlah_barang"
                      class="form-control"
                      placeholder="Jumlah Barang"
                      v-model="newBarang.qty"
                      v-on:keyup="addToChart"
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
                      <tr v-for="item in listBarang" :key="item.index">
                        <td style="width: 2%">1.</td>
                        <td style="width: 15%">{{item.code}}</td>
                        <td style="width: 40%">{{item.name}}</td>
                        <td style="width: 10%">{{item.qty}}</td>
                        <td style="width: 15%" class="text-right">{{ThousandSep(item.harga)}}</td>
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
                    <div class="col-4 d-flex align-items-center">
                      <span>Sub total</span>
                    </div>
                    <div class="col-8 text-right">
                      <h1
                        style="color: red; font-size: 3rem; font-weight: bold;"
                      >{{this.subTotal ? ThousandSep(this.subTotal) : 0}}</h1>
                    </div>
                  </div>
                  <!-- <div class="row">
                    <div class="col-4">
                      <select name="cara_bayar" class="form-control">
                        <option value="0">Cash</option>
                        <option value="1">Transfer</option>
                      </select>
                    </div>
                    <div class="col-8">
                      <input type="number" min="0" class="form-control" placeholder="Nominal" />
                    </div>
                  </div>-->
                  <!-- <div class="row py-1">
                    <div class="col-4 d-flex align-items-center">
                      <select name="type_discount" class="form-control">
                        <option value="persen">%</option>
                        <option value="net">Rp</option>
                      </select>
                    </div>
                    <div class="col-8 d-flex align-items-center">
                      <input
                        type="number"
                        min="0"
                        name="discount"
                        id="discount"
                        class="form-control"
                        placeholder="Discount"
                      />
                    </div>
                  </div>-->
                  <!-- <div class="row">
                    <div class="col-3">
                      <label>Total</label>
                    </div>
                    <div class="col-9 text-right">
                      <h1 style="color: blue; font-weight: bold;">12.000</h1>
                    </div>
                  </div>-->
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
                        v-model="jmlBayar"
                        v-on:keydown="bayar"
                      />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3">
                      <label>Kembalian</label>
                    </div>
                    <div class="col-9 text-right">
                      <h4 style="font-weight: bold;">{{ThousandSep(kembalian)}}</h4>
                    </div>
                  </div>
                  <div class="row d-flex justify-content-between">
                    <button class="btn btn-primary btn-sm" v-on:click="sellProduct">
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
import axios from "axios";
import Swal from "sweetalert2/dist/sweetalert2.js";
export default {
  data() {
    return {
      tanggal: new Date().toLocaleDateString("id"),
      newBarang: {
        code: "",
        name: "",
        qty: 0,
        harga: 0,
        id: null
      },
      listBarang: [],
      subTotal: 0,
      jmlBayar: 0,
      kembalian: 0,
      id_customer: 0
    };
  },
  methods: {
    ThousandSep(x) {
      if (x === undefined || x === null) return "";
      const v = x.toString().split(".");
      return (
        v[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") +
        (v[1] ? "," + v[1] : "")
      );
    },
    CheckBarang(e) {
      if (e.keyCode === 13) {
        axios
          .post("api/transaksi/penjualan/findproduct", {
            kode: this.newBarang.code
          })
          .then(res => {
            this.newBarang = {
              code: res.data.result.kode,
              name: res.data.result.name,
              harga: res.data.result.harga,
              id: res.data.result.id,
              qty: 1
            };
            this.$refs.qty.focus();
          })
          .catch(err => {
            Swal.fire("Oops...", "Data barang tidak di temukan", "error");
          });
      }
    },
    addToChart(e) {
      if (e.keyCode === 13) {
        if (this.newBarang.harga > 0 && this.newBarang.qty > 0) {
          this.subTotal =
            this.subTotal + this.newBarang.harga * this.newBarang.qty;
          this.listBarang.push(this.newBarang);
          this.newBarang = {};
          this.$refs.code.focus();
        } else {
          Swal.fire(
            "Oops...",
            "Masukkan kode product terlebih dahulu",
            "error"
          );
        }
      }
    },
    bayar(e) {
      if (e.keyCode === 13) {
        this.kembalian = this.jmlBayar - this.subTotal;
      }
    },
    sellProduct() {
      if (this.listBarang.length > 0) {
        axios
          .post("api/transaksi/penjualan/sellproduct", {
            id_customer: this.id_customer,
            subtotal: this.subTotal,
            total: this.subTotal,
            total_bayar: this.jmlBayar,
            kembalian: this.kembalian,
            productDetail: this.listBarang
          })
          .then(res => {
            Swal.fire("Oops...", "Produk berhasil di jual", "success");
            this.id_customer = 0;
            this.subTotal = 0;
            this.jmlBayar = 0;
            this.kembalian = 0;
            this.listBarang = [];
          })
          .catch(err => {
            Swal.fire("Oops...", "Produk gagal di jual", "error");
          });
      } else {
        Swal.fire("Oops...", "Masukkan data product terlebih dahulu", "error");
      }
    }
  }
};
</script>