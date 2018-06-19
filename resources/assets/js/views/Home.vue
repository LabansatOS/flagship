<template>
  <div>
    <div class="header">
      <user-component color="white"></user-component>
      <div class="header__content">
        <div style="background-color: rgba(0,0,0,0.5); padding: 5px 10px;">
          Ser socio de tu restaurante favorito nunca fue tan facil
        </div>
      </div>
    </div>
    <div class="about-wrapper">
      <div class="about">
        <div class="about__title">Crowdfunding inmobiliario / Fondeo colectivo en restaurantes</div>
        <div class="about__content">Agrupamos las inversiones de pequeños, medianos y grandes ahorradores, para transformarlos en grandes inversionistas de restaurantes.</div>
        <div class="about__items">
          <div class="about__item">
            Desde $50,000
          </div>
          <div class="about__item">
            Rendimiento del 12%-23%
          </div>
        </div>
      </div>
    </div>
    <div class="projects-wrapper">
      <div class="projects projects--home">
        <div class="projects__header">
          Proyectos
          <div class="button" @click="$router.push({ path: `/projects/` })">
            Ver más
          </div>
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
              0%
               <span>completado</span>
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
    <div class="about-wrapper">
      <div class="about about--steps">
        <div class="about__title">Cómo funciona</div>
        <div class="about__steps">
          <div class="about__step">1. Un restaurante busca abrir una nueva sucursal</div>
          <div class="about__step">2. Flagship analiza su viabilidad y potencial de éxito</div>
          <div class="about__step">3. Publicamos el proyecto en la plataforma</div>
          <div class="about__step">4. Tu inviertes junto con otras personas en el proyecto que más te interesa</div>
          <div class="about__step">5. Recibe mes a mes el pago de un porcentaje de las ventas de tu restaurante seleccionado.</div>
        </div>
      </div>
    </div>
    <div class="about-wrapper about-wrapper--stats">
      <div class="about">
        <div class="about__title">Recibe mas por tu dinero</div>
        <div class="about__content">
          <canvas id="myChart" width="300" height="100"></canvas>
        </div>
      </div>
    </div>
    <div class="testimonials-wrapper">
      <div class="testimonials">
        <div class="testimonials__header">
          Testimonios
        </div>
        <div v-if="current===0" class="testimonials__single">
          <div class="testimonials__content">
            Gracias a Flagship, pude finalmente asociarme en los helados favoritos <br> de mi hija.
          </div>
          <div class="testimonials__title">
            César
          </div>
        </div>
        <div v-if="current===1" class="testimonials__single">
          <div class="testimonials__content">
            Finalmente tengo una alternativa de inversión que genera rendimientos <br> que veo mes a mes en mi cuenta.
          </div>
          <div class="testimonials__title">
            Blanca
          </div>
        </div>
        <div v-if="current===2" class="testimonials__single">
          <div class="testimonials__content">
            Nunca pensé que invertir y poner mi dinero a trabajar era tan fácil. <br> Ahora compruebo que todos podemos hacerlo.
          </div>
          <div class="testimonials__title">
            Carmen
          </div>
        </div>
        <!-- <div class="testimonials__buttons">
          <div class="testimonials__button" @click="increase()">
            <
          </div>
          <div class="testimonials__button" @click="decrease()">
            >
          </div>
        </div> -->
      </div>
    </div>
    <div class="footer-wrapper"> 
      <div class="footer">
        <div class="footer__row">
          <div class="footer__column">
            <p style="font-weight: 500; font-size: 16px;">¿Quieres invertir?</p>
            <p>¿Cómo funciona?</p>
            <p>Seguridad y confianza</p>
            <p>Ver oportunidades</p>
            <p>Conoce a los desarrolladores</p>
          </div>
          <div class="footer__column">
            <p style="font-weight: 500; font-size: 16px;">¿Eres desarrollador?</p>
            <p>Levanta capital</p>
            <p>Selección de proyectos</p>
          </div>
          <div class="footer__column">
            <p style="font-weight: 500; font-size: 16px;">Acerca de Flagship.mx</p>
            <p>Sobre nosotros</p>
            <p>Medios y prensa</p>
            <p>Aviso de privacidad</p>
            <p>Términos y condiciones</p>
          </div>
          <div class="footer__column">
            <p style="font-weight: 500; font-size: 16px;">Centro de educación</p>
            <p>Artículos</p>
            <p>Ayuda y soporte</p>
            <p>Preguntas frecuentes</p>
            <p>Glosario</p>
          </div>
        </div>
        <div class="footer__row" style="font-size: 12px;">
           Regulación: En México se promulgó una nueva ley para regular las actividades de plataformas de fondeo colectivo y en general de tecnología financiera. En términos del artículo octavo transitorio de la ley para regular las instalaciones de tecnología financiera, la autorización para llevar a cabo operaciones dentro de esta plataforma de financiamiento colectivo se encuentra en trámite, por lo que la operación actual no es una actividad supervisada por las autoridades mexicanas. En Flagship, trabajamos para que tu dinero se maneje con los más altos estándares y apegados a la regulación vigente
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import Chart from 'chart.js';
  import 'chartjs-plugin-datalabels';

  export default {
    data() {
      return {
        projects: {},
        current: 0,
      };
    },
    methods: {
      increase() {
        this.current++;
        if (this.current > 2)
        {
          this.current = 0;
        }
      },
      decrease() {
        this.current--;
        if (this.current < 0)
        {
          this.current = 2;
        }
      }
    },
    mounted: function () {
      let self = this;
      axios.get('/api/projects/main')
        .then(function (response) {
            self.projects = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });

      setInterval(function() {
        self.increase();
      }, 5000);

      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Fibras", "Bancos", "Cetes", "IPC", "Flagship.mx"],
          datasets: [{
            label: 'Rendimiento anual',
            data: [3.43, 5.33, 7.12, 8.01, 14.06],
            backgroundColor: [
              '#E00F0F',
              '#E00F0F',
              '#E00F0F',
              '#E00F0F',
              '#1B38AD',
            ],
            borderWidth: 1
          }]
        },
        options: {
          plugins: {
            datalabels: {
              color: 'white',
              font: {
                weight: 'bold'
              },
            }
          },
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }],
            xAxes: [{
              barPercentage: 0.6
            }]
          }
        }
      });
    }
  }
</script>