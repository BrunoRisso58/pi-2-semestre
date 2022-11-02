<template>
    <div>
        <v-row>
            <v-col align="center">
                <v-card
                class="px-10 py-10 my-10 mx-10"
                color="white"
                max-width="300px">

                    <div >

                        <h1>LOGIN</h1>

                        <br />

                        <v-text-field
                            label="Nome"
                            solo
                        />

                        <v-text-field
                            label="Senha"
                            solo
                            :type="'password'"
                        />

                        <v-btn
                            color="primary"
                        >
                            ENTRAR
                        </v-btn>
                    </div>

                </v-card>
            </v-col>
        </v-row>
    </div>
</template>

<style>

</style>

<script>

</script>