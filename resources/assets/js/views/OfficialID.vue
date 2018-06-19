<template>
<div>
  <div class="settings__title">
    Dirección
  </div>
  <div class="settings__row">
    Es necesario presentar una identificación oficial para poder realizar inversiones y cumplir con la regulación correspondiente. Las identificaciones aceptadas son: INE/IFE, Pasaporte, Cédula profesional o licencia de conducir en caso de ser de vigencia permanente.
  </div>
  <image-upload url="/api/user/image" @image-uploaded="(url) => writeData('id_image', url)"></image-upload>
  <div class="settings__row">
    <div class="settings__button" @click="saveData">
      Guardar cambios
    </div>
  </div>
</div>
</template>
<script>
export default {
  data() {
    return {
      user: {},
    };
  },
  methods: {
    saveData() {
      self = this;
      axios.post('/api/profile/', self.user)
        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
    },
    getData() {
      let self = this;
      axios.get('/api/user/')
        .then(function (response) {
            self.user = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });
    },
    writeData(property, value) {
      Vue.set(this.user, property, value);
    },
  },  
  mounted: function () {
    this.getData();
  }
}
</script>

