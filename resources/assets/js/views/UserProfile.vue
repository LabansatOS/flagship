<template>
<div>
  <div class="navbar">
    <!-- <img class="navbar__logo" src="http://flagship.mx/wp-content/uploads/2018/03/LogoMakr_6WpvRA-e1520960282853.png"> -->
    <div class="navbar__logo" style="color: black;" @click="$router.push({ path: '/' })">
        Flagship
    </div>
    <div class="navbar__search">

    </div>
    <div class="navbar__links">
      <div class="navbar__link">
        Login
      </div>
      <div class="navbar__link">
        Register
      </div>
    </div>
  </div>  
  <div class="settings-wrapper">
    <div class="settings">
      <div class="settings-nav">
        <div class="settings-nav__link" @click="$router.push({ path: 'basic' })">
          Datos básicos
        </div>
        <div class="settings-nav__link" @click="$router.push({ path: 'address' })">
          Domicilio
        </div>
        <div class="settings-nav__link" @click="$router.push({ path: 'id' })">
          Identificación oficial
        </div>
        <div class="settings-nav__link" @click="$router.push({ path: 'account' })">
          Cuenta para depósitos
        </div>
        <div class="settings-nav__link" @click="$router.push({ path: 'phones' })">
          Teléfonos
        </div>
      </div>
      <div class="settings__content">
        <router-view></router-view>
      </div>
    </div>
  </div>
</div>
</template>
<script>
export default {
  
}
</script>

