<template>
  <div>
    <div class="header">
      <div class="navbar">
        <!-- <img class="navbar__logo" src="http://flagship.mx/wp-content/uploads/2018/03/LogoMakr_6WpvRA-e1520960282853.png"> -->
        <div class="navbar__logo" @click="$router.push({ path: '/' })">
          Flagship
        </div>
        <div class="navbar__search">

        </div>
        <div class="navbar__links">

        </div>
      </div>
      <div class="header__content">
        Invertir en las mejores marcas del país nunca había sido tan fácil
      </div>
    </div>
    <div class="projects-wrapper">
      <div class="projects">
        <div class="projects__header">
          Proyectos
          <div class="button">
            Ver más
          </div>
        </div>
        <div class="project-card" v-for="project in projects" :key="project.id" @click="$router.push({ path: `/project/${project.id}` })">
          <div class="project-card__image">

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
              50%
               <span>completado</span>
            </div>
            <div class="project-card__stat">
              3 <span>dias</span>
            </div>
            <div class="project-card__stat">
              0 <span>patrocinadores</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="blog-wrapper">
      <div class="blog">
        <div style="width: 100%; display: flex; justify-content: center; font-size: 30px; font-weight: 700; margin-bottom: 30px;">
          Blog
        </div>
        <div class="blog-entry">
          <div class="blog-entry__title">
            Lorem Ipsum
          </div>
          <div class="blog-entry__description">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in bibendum arcu. Quisque iaculis velit sit amet pellentesque cursus. Aenean varius faucibus faucibus. In orci ipsum, bibendum vitae ante nec, consequat tempus massa. Sed et dignissim nulla. 
          </div>
        </div>
        <div class="blog-entry">
          <div class="blog-entry__title">
            Lorem Ipsum
          </div>
          <div class="blog-entry__description">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in bibendum arcu. Quisque iaculis velit sit amet pellentesque cursus. Aenean varius faucibus faucibus. In orci ipsum, bibendum vitae ante nec, consequat tempus massa. Sed et dignissim nulla. 
          </div>
        </div>
        <div class="blog-entry">
          <div class="blog-entry__title">
            Lorem Ipsum
          </div>
          <div class="blog-entry__description">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in bibendum arcu. Quisque iaculis velit sit amet pellentesque cursus. Aenean varius faucibus faucibus. In orci ipsum, bibendum vitae ante nec, consequat tempus massa. Sed et dignissim nulla. 
          </div>
        </div>
        <div class="blog__button-wrapper">
          <div class="button">
            Ver más
          </div>
        </div>
      </div>
    </div>
    <div class="footer-wrapper"> 
      <div class="footer">
        <div class="footer__column">
          <p style="font-weight: 500; font-size: 16px;">Nuestras redes sociales</p>

          <p>Facebook</p>
          <p>Twitter</p>
          <p>Instagram</p>
        </div>
        <div class="footer__column">
        </div>
        <div class="footer__column">
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