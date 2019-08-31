<template>
    <div class="container">
        <div class="row">
            <div class="col-md-5 input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Mesa</span>
                </div>
                <input type="text" disabled class="form-control" :value=orden.mesa.numero>
            </div>
            <div class="col-md-5 input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Fecha</span>
                </div>
                <input type="text" disabled class="form-control" :value="orden.fecha">
            </div>
            <div class="col-md-5 input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Mesa</span>
                </div>
                <input type="text" disabled class="form-control" :value=orden.mesa.numero>
            </div>
        </div>
        <div class="row">

        </div>
        <div class="row">
            
        </div>
        <div class="row">

        </div>
        <div class="row">

        </div>
    </div>
</template>
<script>
import * as moment from 'moment';
export default{
    mounted(){

    },
    created(){

    },
    data(){
        return {
            orden: {
                mesa: {
                    id: 3,
                    numero: 5
                },
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