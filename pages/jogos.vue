<template>

    <div v-if="$vuetify.breakpoint.name !== 'xs'">
        <jogos></jogos>
    </div>

    <div v-else>
    </div>

</template>

<script>

    import jogos from '../components/jogos/jogos.vue';

    export default {
        components: { jogos, },

    }
</script>
    
<style>
    
</style>