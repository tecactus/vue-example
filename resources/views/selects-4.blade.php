@extends('layouts.base')

@section('content')

  <div id="app">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">

        <div v-if="mostrarCorrecto" class="alert alert-success" role="alert">
          Correcto!
        </div>

        <div class="form-group" v-bind:class="errores.nombre ? 'has-error' : ''">
          <label class="control-label">Nombre</label>
          <input type="text" class="form-control" name="nombre" v-model="nombre">
          <p v-if="errores.nombre" class="help-block">@{{ errores.nombre[0] }}</p>
        </div>
        <div class="form-group">
          <label class="control-label">Tipo</label>
          <select class="form-control" name="tipo_mascota_id" v-model="tipo_mascota_id">
            <option v-for="tipo in tipos" v-bind:value="tipo.id">@{{ tipo.nombre }}</option>
          </select>
        </div>
        <div class="form-group" v-bind:class="errores.raza_id ? 'has-error' : ''">
          <label class="control-label">Raza</label>
          <select class="form-control" name="raza_id" v-model="raza_id">
            <option v-for="raza in razas" v-bind:value="raza.id">@{{ raza.nombre }}</option>
          </select>
          <p v-if="errores.raza_id" class="help-block">@{{ errores.raza_id[0] }}</p>
        </div>
        <button v-bind:disabled="!nombre || !raza_id" type="button" class="btn btn-primary" v-on:click="registrarMascota()">Registrar Mascota</button>
      </div>
    </div>

    <div class="row mt40">
      <h2 class="text-center">Mascotas</h2>
      <div class="col-md-6 col-md-offset-3">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>id</th>
              <th>nombre</th>
              <th>tipo</th>
              <th>raza</th>
            </tr>
          </thead>
          <tbody>
              <tr v-if="mascotas.length" v-for="mascota in mascotas">
                <td>@{{ mascota.id }}</td>
                <td>@{{ mascota.nombre }}</td>
                <td>@{{ mascota.raza.tipo_mascota.nombre }}</td>
                <td>@{{ mascota.raza.nombre }}</td>
              </tr>

              <tr v-if="!mascotas.length">
                <td colspan="4" class="text-center">
                  No hay registros
                </td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection

@push('scripts')

  <script>
    var app = new Vue({
      el: '#app',
      data: {
        nombre: null,
        tipo_mascota_id: null,
        raza_id: null,
        mascotas: null,
        tipos: null,
        razas: null,
        errores: [],
        mostrarCorrecto: false,
      },
      computed: {
        datos: function () {
          var datos = {
            nombre: this.nombre,
            raza_id: this.raza_id,
          }
          return datos;
        }
      },
      methods: {
        limpiarFormulario: function () {
          this.nombre = null;
          this.tipo_mascota_id = null;
          this.raza_id = null;
        },
        getMascotas: function () {
          this.mascotas = null;
          this.$http.get('/mascotas/')
            .then(function (response) {
              this.mascotas = response.data;
            })
            .catch(function (response) {
              console.log(response.data);
            })
        },
        getTipos: function () {
          this.tipos = null;
          this.$http.get('/tipo-mascotas/')
            .then(function (response) {
              this.tipos = response.data;
            })
            .catch(function (response) {
              console.log(response.data);
            })
        },
        getRazas: function () {
          this.razas = null;
          this.raza_id = null;
          this.$http.get('/tipo-mascotas/' + this.tipo_mascota_id + '/razas')
            .then(function (response) {
              this.razas = response.data;
            })
            .catch(function (response) {
              console.log(response.data);
            })
        },
        registrarMascota: function () {
          this.errores = [];
          this.mostrarCorrecto = false;

          this.$http.post('/mascotas/', this.datos)
            .then(function (response) {
              this.mostrarCorrecto = true;
              this.limpiarFormulario();
              this.getMascotas();
            })
            .catch(function (response) {
              this.errores = response.data;
            })
        }
      },
      watch: {
        tipo_mascota_id: function (val, oldVal) {
          if (val) {
            this.getRazas();
          }
        }
      },
      mounted: function () {
        this.getMascotas();
        this.getTipos();
      },
    })
  </script>

@endpush