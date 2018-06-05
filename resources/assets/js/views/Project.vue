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

      </div>
    </div>  
    <div class="project-wrapper">
      <div class="project">
        <div class="project__title">
          {{ project.title }}
          <span>por Flagship</span>
        </div>
        <div class="project__header">
          <div class="project__video">
            <iframe width="700" height="420" :src="project.video" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          </div>
          <div class="project__status">
            <div class="project__total">
              ${{ project.total }}
            </div>
            <div class="project__backers">
              aportados por <span>{{ project.backers }} personas</span>
            </div>
            <div class="project__objective">
              Meta: ${{ project.objective }}
            </div>
            <div class="project__button">
              Contribuir
            </div>
            <div class="bar" style="margin-top: 50px;">
              <div class="bar__current" style="min-width: 50%;">
              </div>
            </div>
            <div class="project__stats">
              <div>
                53%
              </div>
              <div>
                24 <span>dias restantes</span>
              </div>
            </div>
          </div>
          <div class="project__summary">
            <div class="project__locations">
              {{ project.location }}
            </div>
            {{ project.summary }}
            <div class="project__social">
              Comparte este proyecto:
              <div style="display: flex;">
                <div class="button" style="margin-right: 20px;">
                  Facebook
                </div>
                <div class="button">
                  Twitter
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="project__body">
          <div class="project__content">  
            <div v-html="project.content"></div>
          </div>
          <div class="project__rewards">
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
        project: {},
      };
    },
    mounted: function () {
      let self = this;
      axios.get('/api/project/' + this.$route.params.id)
        .then(function (response) {
            self.project = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });
    }
  }
</script>
