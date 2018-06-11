<template>
<div>
  <div class="settings__title">
    Datos Básicos
  </div>
  <div class="settings__row">
    <div class="input">
      <div class="input__label">
        Nombre
      </div>
      <input class="input__field" :value="user.name" @input="(event) => writeData('name', event.target.value)">
    </div>
    <div class="input">
      <div class="input__label">
        Apellidos
      </div>
      <input class="input__field" :value="user.last_name" @input="(event) => writeData('last_name', event.target.value)">
    </div>
    <div class="input">
      <div class="input__label">
        Fecha de Nacimiento
      </div>
      <div style="display: flex;">
        <input type="date" class="input__field" :value="user.birthday" @input="(event) => writeData('birthday', event.target.value)">
      </div>
    </div>
  </div>
  <div class="settings__row">
    <div class="input">
      <div class="input__label">
        RFC
      </div>
      <input class="input__field" :value="user.rfc" @input="(event) => writeData('rfc', event.target.value)">
    </div>
    <div class="input">
      <div class="input__label">
        Nacionalidad
      </div>
      <div class="input__field">
        <div class="input-radio">
          <input type="radio" id="nationality" value="mexicana" :checked="user.nationality === 'mexicana'" @input="(event) => writeData('nationality', event.target.value)">
          <i class="form-icon"></i> Mexicana
        </div>
        <div class="input-radio">
          <input type="radio" id="nationality" value="extranjera" :checked="user.nationality === 'extranjera'" @input="(event) => writeData('nationality', event.target.value)">
          <i class="form-icon"></i> Extranjera
        </div>
      </div>
    </div>
    <div class="input">
      <div class="input__label">
        Inversionista calificado
      </div>
      <div class="input__field">
        <div class="input-radio">
          <input type="radio" id="investor" value="0" :checked="user.qualified_investor === 0" @input="(event) => writeData('qualified_investor', parseInt(event.target.value))">
          <i class="form-icon"></i> No calificado
        </div>
        <div class="input-radio">
          <input type="radio" id="investor" value="1" :checked="user.qualified_investor === 1" @input="(event) => writeData('qualified_investor', parseInt(event.target.value))">
          <i class="form-icon"></i> Calificado
        </div>
      </div>
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
      self = this;
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

