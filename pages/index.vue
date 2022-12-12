<template>
  <div>
    <template>
      <v-carousel
        v-if="$vuetify.breakpoint.name == 'xs'"
        continuous
        height="200px"
        cycle
        hide-delimiter-background
        next-icon=""
        prev-icon=""
      >
        <v-carousel-item>
          <v-img src="/1.png" height="" width="100%" contain />
        </v-carousel-item>
        <v-carousel-item>
          <v-img src="/2.png" height="" width="100%" contain />
        </v-carousel-item>
      </v-carousel>
      <v-carousel
        v-else
        continuous
        cycle
        hide-delimiter-background
        next-icon=""
        prev-icon=""
      >
        <v-carousel-item>
          <v-img src="/1.png" height="100%" contain />
        </v-carousel-item>
        <v-carousel-item>
          <v-img src="/2.png" height="100%" contain />
        </v-carousel-item>
      </v-carousel>
    </template>

    <quem-somos  style="margin-top: 20px" />
  </div>
</template>

<script>
import quemSomos from "../components/home/quemsomos.vue";

export default {
  name: "IndexPage",

  components: { quemSomos },

  data: () => ({
    model: 0,
    colors: ["primary", "secondary", "yellow darken-2", "red", "orange"],
  }),
};
</script>