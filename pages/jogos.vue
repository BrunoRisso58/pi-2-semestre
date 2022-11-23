<template>

    <div v-if="$vuetify.breakpoint.name !== 'xs'">
    </div>

    <div v-else>
    </div>

</template>

<script>
    import header from '../components/header/header.vue'
    import HeaderMobile from '../components/header/headerMobile.vue'
    export default {
        components: { header, HeaderMobile },

    }
</script>
    
<style>
    
</style>