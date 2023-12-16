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
        <a :href="'/api/v1/skill/index'">
            <p class="json text-center text-gray-500 font-bold">API links: </p>
            <p class="json text-center text-gray-500 font-bold">short_profil: <span class="font-medium">{{this.link() + '/api/v1/profil/index' }}</span></p>
            <p class="json text-center text-gray-500 font-bold">skills: <span>{{this.link() + '/api/v1/skill/index' }}</span></p>
            <p class="json text-center text-gray-500 font-bold">jobs: <span>{{this.link() + '/api/v1/job/index' }}</span></p>
            <p class="json text-center text-gray-500 font-bold">documentation: <span>{{this.link() + '/docs' }}</span></p>
        </a>
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
        link() {
            return window.location.origin;
        }
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
