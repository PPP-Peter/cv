<template>
  <Card class="flex flex-col items-center justify-center">
    <div class="px-3 py-3">
      <h1 class="json text-center text-3xl text-gray-500 font-bold">Json</h1>
      <p id="json" class=" text-white font-light">
          <vue-json-pretty :data="this.profil"
                           :deep="1"
                           :editable="true"
                           :collapsedNodeLength="1"
                           @showLine="true"
                           @showLength="true"
                           @showSelectController="true"
                           @renderNodeKey="true"
                           @collapsedOnClickBrackets="true"
                           @showIcon="true"
          />
        </p>
    </div>
  </Card>
</template>

<script>
import VueJsonPretty from 'vue-json-pretty';
import 'vue-json-pretty/lib/styles.css';

export default {
  props: [
    'card',

    // The following props are only available on resource detail cards...
    // 'resource',
    // 'resourceId',
    // 'resourceName',
  ],
    components: {
        VueJsonPretty
    },
    data() {
        return {
            profil: {},
            skills: {},
        };
    },
    methods: {
        async getSkills() {
            return await Nova.request().get('/api/v1/skill/index')
                .then(response => {
                    this.skills = response.data.data[0]
                    return response.data
                })
        },
        async getProfil() {
            return await Nova.request().get('/api/v1/profil/index')
                .then(response => {
                    this.profil = response.data.data[0]
                    return response.data
                })
        },
    },

  mounted() {
    this.getProfil()
    this.getSkills()
  },
}
</script>

<style>
h1 .json{
    margin-bottom: 20px;
}
#json{
    background-color: rgba(0,0,0, 0.6);
    padding: 20px;
    border-radius: 6px;
    color:white;
}
</style>
