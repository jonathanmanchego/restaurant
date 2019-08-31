<template>
    <div class="container">
        <button class=" btn btn-primary" @click="send()">Prueba</button>
        <ol>
            <li v-for="(i,key) in producto" v-bind:key="key">{{ i }}</li>
        </ol>
    </div>
</template>
<script>
export default{

    mounted(){

    },
    created(){

    },
    data(){
        return {
            producto: {
                descripcion: "Ez",
                valor_unitario : 5.24,
                codigo: "PO53252",
                unidad_medida: "NIU",
                afectacion_igv : "Gravado",
                tasa_isc : null,
                cod_tipo_sistema_isc: null,
                pvp:  null,
                tasa_percep: null,
                tasa_detracc: null,
                user_id: 4
            }
        }
    },
    methods:{
        send: function(){
            axios
                .post('http://www.facturacion.runait.com/productos',this.producto)
                .then(res => {
                    console.log(res.data);
                })
                .catch(e=>{
                    console.error(e);
                });
        }
    }
}
</script>