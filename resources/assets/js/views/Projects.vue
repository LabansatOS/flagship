<template>
<div>
  <user-component color="black"></user-component> 
  <div class="projects-wrapper">
    <div class="projects">
      <div class="projects__header">
        Proyectos
      </div>
      <div class="project-card" v-for="project in projects" :key="project.id" @click="$router.push({ path: `/project/${project.id}` })">
        <div class="project-card__image" :style="{ backgroundImage: 'url(/storage/' + project.image + ')'}">

        </div>
        <div class="project-card__title">
          {{ project.title }}
        </div>
        <div class="project-card__subtitle">
          por Flagship
        </div>
        <div class="project-card__description">
          {{ project.summary.substring(0, 80) }}
        </div>
        <div class="project-card__bar">
          <div class="bar">
            <div class="bar__current" style="min-width: 50%;">
            </div>
          </div>
        </div>
        <div class="project-card__stats">
          <div class="project-card__stat">
            0% <span>completado</span>
          </div>
          <div class="project-card__stat">
            0 <span>dias</span>
          </div>
          <div class="project-card__stat">
            0 <span>patrocinadores</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>
<script>
export default {
  data() {
    return {
      projects: {},
    };
  },
  mounted: function () {
    let self = this;
    axios.get('/api/projects/')
      .then(function (response) {
          self.projects = response.data;
      })
      .catch(function (error) {
          console.log(error);
      });
  }
}
</script>

