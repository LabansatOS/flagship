<template>
<div>
  <user-component color="black"></user-component>  
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

