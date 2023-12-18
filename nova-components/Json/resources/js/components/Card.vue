<template>
  <Card class="flex flex-col items-center justify-center">
    <div class="px-3 py-3">
        <h1 class="json text-center text-3xl text-gray-500 font-bold">Json</h1>

        <Multiselect
            @select="getApi"
            v-model="selectValue"
            :options="this.options"
            :create-option="true"
        />

        <p id="json" class=" text-white font-light">
            <vue-json-pretty :data="this.selectData"
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

        <p class="json text-center text-gray-500 font-bold">API links: </p>
        <a :href="'/api/v1/profil/index'" target="_blank">
            <p class="json text-center text-gray-500 font-bold">short_profil:
                <span class="font-medium">{{ this.link() + '/api/v1/profil/index'}}</span>
            </p>
        </a>
        <a :href="'/api/v1/skill/index'" target="_blank">
            <p class="json text-center text-gray-500 font-bold">skills:
                <span>{{this.link() + '/api/v1/skill/index' }}</span>
            </p>
        </a>
        <a :href="'/api/v1/job/index'" target="_blank">
            <p class="json text-center text-gray-500 font-bold">jobs:
                <span>{{this.link() + '/api/v1/job/index' }}</span>
            </p>
        </a>
        <a :href="'/api/v1/tool/index'" target="_blank">
            <p class="json text-center text-gray-500 font-bold">tools:
                <span>{{this.link() + '/api/v1/tool/index' }}</span>
            </p>
        </a>
        <a :href="'/docs'" target="_blank">
            <p class="json text-center text-gray-500 font-bold">documentation:
                <span>{{ this.link() + '/docs' }}</span>
            </p>
        </a>

    </div>
  </Card>
</template>

<script>
import VueJsonPretty from 'vue-json-pretty';
import 'vue-json-pretty/lib/styles.css';
import Multiselect from '@vueform/multiselect'

export default {
  props: [
    'card',
  ],
    components: {
        VueJsonPretty,
        Multiselect
    },
    data() {
        return {
            options:['profil','skills','jobs', 'tools'],
            selectValue: 'profil',
            profil: {},
            skills: {},
            jobs: {},
            selectData: this.profil,
        };
    },
    methods: {
        async getApi() {
            if (this.selectValue === 'profil') this.getProfil()
            else if (this.selectValue === 'skills') this.getSkills()
            else if (this.selectValue === 'jobs') this.getJobs()
            else if (this.selectValue === 'tools') this.getTools()
            return this.selectData
        },
        async getSkills() {
            return await Nova.request().get('/api/v1/skill/index')
                .then(response => {
                    if (this.selectValue === 'skills') this.selectData = response.data.data   // or {'skills': response.data.data}
                    return response.data.data
                })
        },
        async getJobs() {
            return await Nova.request().get('/api/v1/job/index')
                .then(response => {
                    if (this.selectValue === 'jobs') this.selectData = response.data.data
                    return response.data.data
                })
        },
        async getTools() {
            return await Nova.request().get('/api/v1/tool/index')
                .then(response => {
                    if (this.selectValue === 'tools') this.selectData = response.data.data
                    return response.data.data
                })
        },
        async getProfil() {
            return await Nova.request().get('/api/v1/profil/index')
                .then(response => {
                    this.profil = response.data.data[0]
                    if (this.selectValue === 'profil') this.selectData = response.data.data[0]
                    return response.data.data[0]
                })
        },
        link() {
            return window.location.origin;
        }
    },

  mounted() {
      this.selectValue = 'profil'
      this.getApi()
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
.selectbox{
    margin-bottom: 40px;
    width: 200px;
}
</style>

<style src="@vueform/multiselect/themes/default.css"></style>
