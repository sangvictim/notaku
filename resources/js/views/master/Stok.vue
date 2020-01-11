<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="card card-secondary color-palette-box">
        <div class="card-header">
          <div class="row">
            <div class="col-9 d-flex justify-content-center">
              <h3>
                <i class="fa fa-user-friends"></i> Master Stok
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
        { key: "kode", sortable: true },
        { key: "name", sortable: true },
        { key: "stok_barang", sortable: true }
      ],
      items: [],
      searchQuery: null
    };
  },
  methods: {
    getData() {
      axios
        .get("/api/master/stok/index")
        .then(res => {
          this.items = res.data.result;
        })
        .catch(err => {
          Swal.fire("Oops...", "Data gagal diunduh!", "error");
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