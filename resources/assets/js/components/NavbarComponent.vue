<template>
  <div class="navbar">
    <img v-if="this.color === 'white'" class="navbar__logo" src="/images/LogoFlagship.png" @click="$router.push({ path: '/' })">
    <img v-else class="navbar__logo" src="/images/LogoFlagship02.png" @click="$router.push({ path: '/' })">
    <div class="navbar__search">

    </div>
    <div v-if="!user" class="navbar__links">
      <div class="navbar__link" @click="redirectTo('/login')" :style="{ color: textColor }">Iniciar sesión</div>
      <div class="navbar__link" @click="redirectTo('/register')" :style="{ color: textColor }">Registrarse</div>
    </div>
    <div v-if="user" class="navbar__links">
      <div class="navbar__link" :style="{ color: textColor }" @click="$router.push({ path: '/profile/basic' })">Perfil</div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      user: null,
    };
  },
  props: {
    color: String,
  },
  methods: {
    redirectTo(url) {
      window.location.href = url;
    }
  },
  computed: {
    textColor: function () {
      if (this.color === 'white')
        return 'white';
      else 
        return 'black';
    }
  },
  mounted: function () {
    let self = this;
    axios.get('/api/user/')
      .then(function (response) {
        self.user = response.data;
      })
      .catch(function (error) {
        console.log(error);
      });
  }
}
</script>
