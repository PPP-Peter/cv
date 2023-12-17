<template>
  <Card class="flex flex-col items-center justify-center">
    <div class="px-3 py-3">
<!--      <h1 class="text-center text-3xl text-gray-500 font-light">Chart</h1>-->
    </div>
      <vue-echarts :option="this.option" class="chart"  ref="chart" />
  </Card>
</template>

<script>

import { VueEcharts } from "vue3-echarts";
export default {
  props: [
    'card',
  ],
    components: {
        VueEcharts
    },
    data() {
        return {
            portfolio:false,
            arrow:false,
            list: ['Item 1', 'Item 2', 'Item 3', 'Item 4', 'Item 5', 'Item 6'],
            option: {
                tooltip: {
                    trigger: 'item' + ' %'
                },
                legend: {
                    orient: 'horizontal',
                    top: 'top',
                    left: 'center',
                },
                series: [{
                    label: {
                        show: true,
                    },
                    top: '50',
                    radius: ['40%', '70%'],
                    data: [
                        {'value': 20, name: 'HTML', itemStyle: {color: '#BBDEFB'}},
                        {'value': 20, name: 'CSS', itemStyle: {color: '#90CAF9'}},
                        {'value': 20, name: 'SQL', itemStyle: {color: '#64B5F6'}},
                        {'value': 15, name: 'Javascript', itemStyle: {color: '#42A5F5'}},
                        {'value': 20, name: 'PHP', itemStyle: {color: '#2196F3'}},
                        {'value': 15, name: 'Wordpress', itemStyle: {color: '#1E88E5'}},
                        {'value': 20, name: 'Vue', itemStyle: {color: '#1976D2'}},
                        {'value': 20, name: 'Laravel', itemStyle: {color: '#1565C0'}},
                    ],
                    emphasis: {
                        label: {
                            show: true,
                            fontSize: 18,
                            fontWeight: 'bold'
                        }
                    },
                    type: "pie",
                    itemStyle: {
                        shadowColor: 'rgba(0, 0, 0, 0.5)',
                        borderColor: 'white',
                        borderWidth: 3.5
                    },
                }],
            },
        }
    },

  mounted() {
    //
  },
}
</script>


<style scoped>
.chart {
    height: 270px;
    width: 400px;
}
a {
    color: #42b983;
}
p, h1{
    text-align: center;
}

</style>
