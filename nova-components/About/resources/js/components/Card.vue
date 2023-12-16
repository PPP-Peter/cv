<template>
  <Card class="flex flex-col items-center justify-center">
    <div class="px-3 py-3">
      <h1 class="text-center text-3xl text-gray-500 font-light">O mne</h1>
    </div>

    <img alt="foto" class="foto" src="/storage/img/foto1.png"  height="120" id="foto"/>
<!--      <h1>{{ msg }}</h1>-->

<!--      <p>Profesný životopis</p>-->

      <div class="info">
          <p>
              <img src="/storage/img/map.svg" class="icon"/> Hervartov 68<br>
          </p>
          <p>
              <img src="/storage/img/phone.svg" class="icon"/> 0948098889<br>
          </p>
          <p>
              <img src="/storage/img/email.svg" class="icon"/> p.petermanik@gmail.com<br>
          </p>
          <p>
              <img src="/storage/img/calendar.svg" class="icon"/> 8.6.1992
          </p>
      </div>

  </Card>
</template>

<script>
import * as url from "url";

export default {
    computed: {
        url() {
            return url
        }
    },
  props: [
    'card',

    // The following props are only available on resource detail cards...
    // 'resource',
    // 'resourceId',
    // 'resourceName',
  ],

  mounted() {
    //
  },
}
</script>

<style>
#foto{
    height: 120px;
    filter:drop-shadow(6px 6px 10px gray)
}
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
</style>
