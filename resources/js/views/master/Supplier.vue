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
                    <i class="fa fa-plus"></i> Supplier
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
                <i class="fa fa-user-secret"></i> Master Supplier
              </h3>
            </div>
            <div class="col-3">
              <input
                type="text"
                class="form-control"
                placeholder="Cari Kode / Nama Supplier"
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
        <h5>Master Supplier Baru</h5>

        <b-button size="sm" variant="danger" @click="closeModal()">
          <i class="fa fa-times-circle"></i>
        </b-button>
      </template>
      <div class="row">
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Kode Supplier</label>
            </div>
            <div class="col-8">
              <input
                type="text"
                style="text-transform:uppercase"
                class="form-control"
                v-model="newData.kode"
                required
              />
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Nama Supplier</label>
            </div>
            <div class="col-8">
              <input type="text" class="form-control" v-model="newData.name" required />
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Address</label>
            </div>
            <div class="col-8">
              <input type="text" class="form-control" v-model="newData.address" required />
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Contact</label>
            </div>
            <div class="col-8">
              <input type="number" min="0" class="form-control" v-model="newData.contact" required />
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Pic Name</label>
            </div>
            <div class="col-8">
              <input type="text" class="form-control" v-model="newData.pic_name" required />
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Pic Address</label>
            </div>
            <div class="col-8">
              <input type="text" class="form-control" v-model="newData.pic_address" required />
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Pic Phone 1</label>
            </div>
            <div class="col-8">
              <input type="number" class="form-control" v-model="newData.pic_contact_1" required />
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-4">
              <label>Pic Phone 2</label>
            </div>
            <div class="col-8">
              <input type="number" class="form-control" v-model="newData.pic_contact_2" required />
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
        "address",
        "contact",
        "pic_name",
        "pic_address",
        "pic_contact_1",
        "pic_contact_2",
        "action"
      ],
      items: [],
      newData: {},
      itemsTrash: [],
      fieldsTrash: ["kode", "name", "action"],
      searchQuery: null
    };
  },
  methods: {
    getData() {
      axios
        .get("/api/master/supplier/index")
        .then(res => {
          this.items = res.data.result;
        })
        .catch(err => {
          Swal.fire("Oops...", "Data gagal diunduh!", "error");
        });
    },
    updateOrCreate() {
      axios
        .post("/api/master/supplier/updateOrCreate", {
          kode: this.newData.kode,
          name: this.newData.name,
          address: this.newData.address,
          contact: this.newData.contact,
          pic_name: this.newData.pic_name,
          pic_address: this.newData.pic_address,
          pic_contact_1: this.newData.pic_contact_1,
          pic_contact_2: this.newData.pic_contact_2
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
            .delete("/api/master/supplier/delete/" + this.items[index].id)
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
        .get("/api/master/supplier/getTrash")
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
        .get("/api/master/supplier/restoreData/" + this.itemsTrash[index].id)
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
  }
};
</script>