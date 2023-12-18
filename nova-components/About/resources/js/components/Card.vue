<template>
  <Card class="flex flex-col items-center justify-center">
    <div class="px-3 py-3">
      <h1 class="text-center text-3xl text-gray-500 font-light">O mne</h1>
    </div>

      <img src="/storage/img/foto1.png" alt="foto1" class="target foto animate__flipInY" ref="target"  title="dvojitý klik pre editaciu"
           @mouseover="isHovering = true"
           @mouseout="isHovering = false"
           :class="{animate__flipInY: isHovering}"
      >

      <Moveable
          className="moveable"
          v-bind:target="['.target']"
          v-bind:draggable="true"
          v-bind:warpable="true"

          @warp="onWarp"
          @drag="onDrag"
          @scale="onScale"
          @rotate="onRotate"
      />

<!--      <p>Profesný životopis</p>-->

      <div class="info">
          <p>
              <img src="/storage/img/map.svg" class="icon"/> {{ settings.address }}<br>
          </p>
          <p>
              <img src="/storage/img/phone.svg" class="icon"/> <a :href="'tel:' +  settings.phone">{{ settings.phone }}</a> <br>
          </p>
          <p>
              <img src="/storage/img/email.svg" class="icon"/> <a :href="'mailto:' +  settings.email"> {{ settings.email }}</a><br>
          </p>
          <p>
              <img src="/storage/img/calendar.svg" class="icon"/> 8.6.1992
          </p>
      </div>

  </Card>
</template>

<script>
import * as url from "url";
import Moveable from "vue3-moveable";

export default {
    components: {
        Moveable,
    },
    computed: {
        url() {
            return url
        }
    },
  props: [
    'card',
  ],
    data() {
        return {
            isHovering: false,
            settings: {},
        }
    },
    methods: {
        async getSettings() {
            return await Nova.request().get('/api/v1/settings')
                .then(response => {
                    this.settings = response.data.data
                    console.log(response.data.data)
                    return response.data.data
                })
        },
        onWarp({ transform }) {
            this.$refs.target.style.transform = transform;
        },
        onDrag({ transform }) {
            this.$refs.target.style.transform = transform;
        },
        onScale({ drag }) {
            this.$refs.target.style.transform = drag.transform;
        },
        onRotate({ drag }) {
            this.$refs.target.style.transform = drag.transform;
        },

    },
  mounted() {
      this.getSettings()
      document.querySelector('.moveable-control-box').style.display="none"
  },
}
</script>

<style>

.icon{
    height:20px;
}
.info{
    margin-top: 20px ;
}
.info p{
    display: flex;
    margin-bottom: 20px ;
}
.info p img{
    padding-right: 12px;
    padding-left: 20px;
}

.foto{
    height:155px;
    width:130px;
    filter:drop-shadow(6px 6px 10px gray);
}
.foto:hover{
    cursor:move;
    filter:contrast(110%) drop-shadow(6px 6px 10px gray);
    transform: translate(0px, -22px);
    transition:1s;
}
</style>
