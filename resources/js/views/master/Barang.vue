<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="card card-secondary color-palette-box">
        <div class="card-header">
          <div class="row">
            <div class="col-3">
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-info btn-block" v-b-modal.modal-create>
                    <i class="fa fa-plus"></i> Barang
                  </button>
                </div>
                <div class="col-6">
                  <button class="btn btn-info btn-block" @click="getDataTrash">
                    <i class="fa fa-trash-alt"></i> Trash
                  </button>
                </div>
              </div>
            </div>
            <div class="col-6 d-flex justify-content-center">
              <h3>
                <i class="fa fa-coins"></i> Master Barang
              </h3>
            </div>
            <div class="col-3">
              <input
                type="text"
                class="form-control"
                placeholder="Cari Kode / Nama Barang"
                v-model="searchQuery"
              />
            </div>
          </div>
        </div>
        <div class="card-body">
          <b-table
            striped
            hover
            :items="resultQuery"
            :fields="fields"
            :per-page="perPage"
            :current-page="currentPage"
            responsive="sm"
            small
          >
            <template v-slot:cell(No)="data">{{ data.index + 1 }}</template>
            <template v-slot:cell(satuan)="data">dus, pack, pcs</template>
            <template v-slot:cell(action)="data">
              <b-dropdown
                id="dropdown-dropleft"
                dropleft
                text="Action"
                variant="primary"
                class="m-2"
              >
                <b-dropdown-item @click="editData(data.index)">Edit</b-dropdown-item>
                <b-dropdown-item @click="deleteData(data.index)">Delete</b-dropdown-item>
              </b-dropdown>
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
    <!-- ============================ modal crate ==================== -->
    <b-modal id="modal-create" ref="modal-create" hide-footer>
      <template v-slot:modal-header="{ close }">
        <!-- Emulate built in modal header close button action -->
        <h5>Master Barang Baru</h5>

        <b-button size="sm" variant="danger" @click="closeModal()">
          <i class="fa fa-times-circle"></i>
        </b-button>
      </template>
      <div class="row">
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Kode Barang</label>
            </div>
            <div class="col-8">
              <input type="text" class="form-control" v-model="newData.kode" required />
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Nama Barang</label>
            </div>
            <div class="col-8">
              <input type="text" class="form-control" v-model="newData.name" required />
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Harga Beli</label>
            </div>
            <div class="col-8">
              <input
                type="number"
                min="0"
                class="form-control"
                v-model="newData.harga_beli"
                required
              />
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Harga Grosir</label>
            </div>
            <div class="col-8">
              <input
                type="number"
                min="0"
                class="form-control"
                v-model="newData.harga_grosir"
                required
              />
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Harga Retail</label>
            </div>
            <div class="col-8">
              <input
                type="number"
                min="0"
                class="form-control"
                v-model="newData.harga_retail"
                required
              />
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Satuan Besar</label>
            </div>
            <div class="col-4">
              <input type="number" min="0" class="form-control" v-model="satuan[0].qty" required />
            </div>
            <div class="col-4">
              <b-form-select v-model="satuan[0].satuan">
                <option
                  v-for="(item, index) in optionsSatuan"
                  v-bind:value="item.id"
                  :key="index"
                >{{ item.name }}</option>
              </b-form-select>
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Satuan Sedang</label>
            </div>
            <div class="col-4">
              <input type="number" min="0" class="form-control" v-model="satuan[1].qty" required />
            </div>
            <div class="col-4">
              <b-form-select v-model="satuan[1].satuan">
                <option
                  v-for="(item, index) in optionsSatuan"
                  v-bind:value="item.id"
                  :key="index"
                >{{ item.name }}</option>
              </b-form-select>
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Satuan Kecil</label>
            </div>
            <div class="col-4">
              <input type="number" min="0" class="form-control" v-model="satuan[2].qty" required />
            </div>
            <div class="col-4">
              <b-form-select v-model="satuan[2].satuan">
                <option
                  v-for="(item, index) in optionsSatuan"
                  v-bind:value="item.id"
                  :key="index"
                >{{ item.name }}</option>
              </b-form-select>
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <button class="btn btn-primary btn-block" @click="updateOrCreate">
            <i class="fa fa-save"></i> Simpan
          </button>
        </div>
      </div>
    </b-modal>

    <!-- =================== modal trash ======================== -->
    <b-modal id="modal-trash" ref="modal-trash" hide-footer>
      <template v-slot:modal-header="{ close }">
        <!-- Emulate built in modal header close button action -->
        <h5>Trash Master Barang</h5>

        <b-button size="sm" variant="danger" @click="close()">
          <i class="fa fa-times-circle"></i>
        </b-button>
      </template>
      <b-table striped hover :items="itemsTrash" :fields="fieldsTrash" small>
        <template v-slot:cell(action)="data">
          <button @click="restoreData(data.index)" class="btn btn-secondary">Restore</button>
        </template>
      </b-table>
    </b-modal>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2/dist/sweetalert2.js";
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
        { key: "No", thStyle: { width: "5%" } },
        "kode",
        { key: "name", sortable: true },
        { key: "harga_beli", sortable: true },
        { key: "harga_grosir", sortable: true },
        { key: "harga_retail", sortable: true },
        "satuan",
        "action"
      ],
      items: [],
      newData: {},
      itemsTrash: [],
      fieldsTrash: ["kode", "name", "action"],
      searchQuery: null,
      satuan: [{}, {}, {}],
      optionsSatuan: [{ value: this.name, text: name }]
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
          Swal.fire("Oops...", "Data gagal diunduh!", "error");
        });
    },
    getSatuan() {
      axios
        .get("/api/master/barang/getSatuan")
        .then(res => {
          this.optionsSatuan = res.data.result;
        })
        .catch(err => {
          Swal.fire("Oops...", "Data gagal diunduh!", "error");
        });
    },
    updateOrCreate() {
      axios
        .post("/api/master/barang/updateOrCreate", {
          kode: this.newData.kode,
          name: this.newData.name,
          harga_beli: this.newData.harga_beli,
          harga_grosir: this.newData.harga_grosir,
          harga_retail: this.newData.harga_retail,
          satuan: this.satuan
        })
        .then(res => {
          this.$refs["modal-create"].hide();
          this.getData();
          this.newData = {};
        })
        .catch(err => {
          Swal.fire("Oops...", "Data gagal disimpan!", "error");
        });
    },
    editData(index) {
      this.newData = this.items[index];
      this.satuan = this.satuan;
      this.$refs["modal-create"].show();
    },
    deleteData(index) {
      Swal.fire({
        title: "Apakah anda yakin?",
        text: "Ingin menghapus data ini!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus !"
      }).then(result => {
        if (result.value) {
          axios
            .delete("/api/master/barang/delete/" + this.items[index].id)
            .then(res => {
              Swal.fire("Deleted!", "Data berhasil dihapus!", "success");
              this.getData();
            })
            .catch(err => {
              Swal.fire("Oops...", "Data gagal dihapus!", "error");
            });
        }
      });
    },
    getDataTrash() {
      axios
        .get("/api/master/barang/getTrash")
        .then(res => {
          this.$refs["modal-trash"].show();
          this.itemsTrash = res.data.result;
        })
        .catch(err => {
          Swal.fire("Oops...", "Data gagal diunduh!", "error");
        });
    },
    restoreData(index) {
      axios
        .get("/api/master/barang/restoreData/" + this.itemsTrash[index].id)
        .then(res => {
          this.$refs["modal-trash"].hide();
          this.getData();
        })
        .catch(err => {
          Swal.fire("Oops...", "Data gagal disimpan!", "error");
        });
    },
    closeModal() {
      this.newData = "";
      this.$refs["modal-create"].hide();
    }
  },
  computed: {
    rows() {
      return this.items.length;
    },
    resultQuery() {
      if (this.searchQuery) {
        return this.items.filter(item => {
          return this.searchQuery
            .toLowerCase()
            .split(" ")
            .every(
              v =>
                item.kode.toLowerCase().includes(v) +
                item.name.toLowerCase().includes(v)
            );
        });
      } else {
        return this.items;
      }
    }
  },
  created() {
    this.getData();
    this.getSatuan();
  }
};
</script>