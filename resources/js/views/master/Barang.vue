<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="card card-secondary color-palette-box">
        <div class="card-header">
          <div class="row">
            <div class="col-2">
              <button class="btn btn-info" v-b-modal.modal-create>
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
          <b-table
            striped
            hover
            :items="items"
            :fields="fields"
            :per-page="perPage"
            :current-page="currentPage"
            responsive="sm"
            small
          >
            <template v-slot:cell(No)="data">{{ data.index + 1 }}</template>
            <template v-slot:cell(action)="data">
              <div class="btn-group dropleft">
                <button
                  class="btn btn-info btn-sm dropdown-toggle dropdown-toggle-split"
                  data-toggle="dropdown"
                >
                  <i class="fa fa-cog str-only"></i>
                </button>
                <div class="dropdown-menu">
                  <a href class="dropdown-item">Edit</a>
                </div>
              </div>
            </template>
          </b-table>
          <div class="row">
            <div class="col-3">
              <div class="row">
                <div class="col-7">Show per page:</div>
                <div class="col-5">
                  <div>
                    <b-form-select v-model="perPage" :options="perPageList"></b-form-select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-9">
              <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage"></b-pagination>
            </div>
          </div>
        </div>
      </div>
    </div>
    <b-modal id="modal-create" ref="modal-create" title="Master Barang Baru" hide-footer>
      <div class="row">
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Kode Barang</label>
            </div>
            <div class="col-8">
              <input type="text" class="form-control" v-model="newData.kode" />
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Nama Barang</label>
            </div>
            <div class="col-8">
              <input type="text" class="form-control" v-model="newData.name" />
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Harga Beli</label>
            </div>
            <div class="col-8">
              <input type="number" min="0" class="form-control" v-model="newData.harga_beli" />
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Harga Grosir</label>
            </div>
            <div class="col-8">
              <input type="number" min="0" class="form-control" v-model="newData.harga_grosir" />
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Harga Retail</label>
            </div>
            <div class="col-8">
              <input type="number" min="0" class="form-control" v-model="newData.harga_retail" />
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <button class="btn btn-primary btn-block" @click="createData">
            <i class="fa fa-save"></i> Simpan
          </button>
        </div>
      </div>
    </b-modal>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      perPage: 10,
      perPageList: [
        { value: 10, text: "10" },
        { value: 25, text: "25" },
        { value: 50, text: "50" },
        { value: 100, text: "100" },
        { value: 200, text: "200" }
      ],
      currentPage: 1,
      fields: [
        "No",
        "kode",
        { key: "name", sortable: true },
        { key: "harga_beli", sortable: true },
        { key: "harga_grosir", sortable: true },
        { key: "harga_retail", sortable: true },
        "action"
      ],
      items: [],
      newData: {}
    };
  },
  methods: {
    getData() {
      axios
        .get("/api/master/barang/index")
        .then(res => {
          this.items = res.data.result;
        })
        .catch(err => {
          alert(JSON.stringify(err));
        });
    },
    createData() {
      axios
        .post("/api/master/barang/store", {
          kode: this.newData.kode,
          name: this.newData.name,
          harga_beli: this.newData.harga_beli,
          harga_grosir: this.newData.harga_grosir,
          harga_retail: this.newData.harga_retail
        })
        .then(res => {
          this.$refs["modal-create"].hide();
          this.getData();
          this.newData = {};
        });
    },
    editData(id) {
      axios
        .get("/api/master/barang/edit", { id: id })
        .then(res => {
          this.newData = res.data.result;
        })
        .catch(err => {
          alert(JSON.stringify(err));
        });
    }
  },
  computed: {
    rows() {
      return this.items.length;
    }
  },
  created() {
    this.getData();
  }
};
</script>