<template>
<div>
  <div class="settings__title">
    Cuenta para depósitos
  </div>
  <div class="settings__row">
    Necesitamos nos indiques a qué cuenta realizarte los depósitos de ingresos generados por tus inversiones o reembolsos. Debe ser una cuenta a tu nombre. Asegúrate de que sea correcta.
  </div>
  <div class="settings__row">
    <div class="input">
      <div class="input__label">
        Cuenta CLABE
      </div>
      <input class="input__field" :value="user.clabe" @input="(event) => writeData('clabe', event.target.value)">
    </div>
  </div>
  <div class="settings__row">
    Es necesario confirmar tu cuenta CLABE. Para confirmarla puedes hacer un depósito para tu siguiente inversión desde esa cuenta CLABE.
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

