<template>
  <div>
    <apexchart 
      type="bar" 
      height="400" 
      :options="chartOptions" 
      :series="series"
    />
  </div>
</template>

<script>
import ApexCharts from "apexcharts";
import VueApexCharts from "vue3-apexcharts";

export default {
  name: "LineChartExample",
  components: {
    apexchart: VueApexCharts,
  },
  data() {
    return {
      chartOptions: {
        chart: {
          id: "ventas-chart",
        },
        xaxis: {
          categories: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
        },
        title: {
          text: "Expedientes por mes",
          align: "center",
        },
      },
      series: [
        {
          name: "Ventas",
          data: [10, 41, 35, 51, 49, 62, 69],
        },
      ],
    };
  },
  methods: {
    obtenerExpedientes() {
      this.axios.get("/expediente").then((response) => {
        this.items = response.data;
        console.log("Expedientes obtenidos:", this.items);
      }).catch(error => {
        console.error("Error al obtener expedientes:", error);
      });
    },
  },
  mounted() {
    this.obtenerExpedientes();
  },
};
</script>
