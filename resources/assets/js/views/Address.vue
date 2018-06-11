<template>
<div>
  <div class="settings__title">
    Dirección
  </div>
  <div class="settings__row">
    <div class="input input--double">
      <div class="input__label">
        Calle y numero
      </div>
      <input class="input__field" :value="user.street" @input="(event) => writeData('street', event.target.value)">
    </div>
    <div class="input">
      <div class="input__label">
        Colonia
      </div>
      <input class="input__field" :value="user.neighborhood" @input="(event) => writeData('neighborhood', event.target.value)">
    </div>
  </div>
  <div class="settings__row">
    <div class="input">
      <div class="input__label">
        Ciudad o delegación
      </div>
      <input class="input__field" :value="user.city" @input="(event) => writeData('city', event.target.value)">
    </div>
    <div class="input">
      <div class="input__label">
        Estado
      </div>
      <input class="input__field" :value="user.state" @input="(event) => writeData('state', event.target.value)">
    </div>
    <div class="input">
      <div class="input__label">
        Código postal
      </div>
      <input class="input__field" :value="user.zip_code" @input="(event) => writeData('zip_code', event.target.value)">
    </div>
  </div>
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
  },
}
</script>

