<template>
    <div class="container">
        <div v-for="(orden,key) in ordenes" v-bind:key="key" class="row">
            <div class="col-md-12 input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Orden #{{ orden.id }}</span>
                </div>
                <input type="text" disabled class="form-control" :value=orden.mesa.numero>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Cantidad Productos</span>
                </div>
                <input type="text" disabled class="form-control" :value=orden.get_detalle_ordenes.length>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Costo Total</span>
                </div>
                <input type="text" disabled class="form-control" :value=orden.total>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Ver Detalle</span>
                </div>
                <button class="btn btn-info" @click=orden_mostrar><span class="fas fa-list"></span></button>
            </div>
        </div>
    </div>
</template>
<script>
import * as moment from 'moment';
export default{
    mounted(){
        axios.get('/sistema/orden')
            .then(res=>{
                this.ordenes = res.data;
            })
            .catch(err =>{
                console.error(err);
            });
    },
    created(){

    },
    data(){
        return {
            ordenes : []
        }
    },
    methods:{
        
    }
}
</script>