<template>
    <div class="cajero-vista">
        <div v-if="loading" class="cajero-item empty">

        </div>
        <div v-if="loading" class="cajero-item empty">

        </div>
        <div v-if="loading" class="cajero-item empty">

        </div>
        <div v-if="loading" class="cajero-item empty">

        </div>
        <div v-for="(orden,key) in ordenes" v-bind:key="key" class="card cajero-item">
            <orden v-bind:orden=orden></orden>
            <div class=" card-body cajero-item-container">
                <div class="cajero-item-header">
                    <span>ORDEN N°{{ orden.id }}</span>
                    </div>
                <div class="cajero-item-content d-flex">
                    <div class="fila-cajero-item">
                        <div class="item-col">
                            <span>Mesa : </span>
                            <span>{{ orden.mesa.numero }}</span>
                        </div>
                        <div class="item-col">
                            <span>Mozo:</span>
                            <span>{{ orden.get_empleado.nombre }}</span>
                        </div>
                    </div>
                    <div class="fila-cajero-item">
                        <div class="item-col">
                            <span>Productos : </span>
                            <span>{{ orden.cantidad_items }}</span>
                        </div>
                        <div class="item-col">
                            <span>Costo Total:</span>
                            <span>{{ parseFloat(orden.total).toFixed(2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</template>
<script>
import events from '../../events/events.js';
import * as moment from 'moment';
export default{
    mounted(){
        axios.get('http://localhost:8000/sistema/orden')
            .then(res=>{
                this.loading = false;
                this.ordenes = res.data;
                this.totalProductos();
            })
            .catch(err =>{
                console.error(err);
            });
    },
    created(){

    },
    data(){
        return {
            ordenes : [],
            loading: true
        }
    },
    methods:{
        totalProductos: function(){
            let total = 0;
            this.ordenes.forEach(x=>{
                x.get_detalle_ordenes.forEach(y=>{
                    total += y.cantidad;
                });
                x.cantidad_items = total;
                total = 0;
                x.mostrar = false;
            });
        }
    }
}
</script>
<style>
.cajero-vista{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-gap: .5rem;
    width: 95%;
    margin: 0 auto;
}
.cajero-vista .cajero-item{
    width: 100%;
    border: 1px solid #000;
    /* padding: 5%; */
    cursor: pointer;
}
.cajero-vista .cajero-item.empty{
    width: 100%;
    height: 220px;
    transition: all 1s ease;
    border:none;
    border-radius: 2%;
    background: linear-gradient(266deg, #c0c0c0, rgb(175, 175, 175), #c0c0c0);
    background-size: 600% 600%;
    animation: loading 1.5s infinite linear;
}
.cajero-vista .cajero-item .cajero-item-container{
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: 1fr 1fr;
}
.cajero-vista .cajero-item .cajero-item-container .cajero-item-header{
    display: flex;
    justify-content: center;
    line-height: 3.5rem;
}
.cajero-vista .cajero-item .cajero-item-container .cajero-item-header .span{
    font-size: 2rem;
}
.cajero-vista .cajero-item .cajero-item-container .cajero-item-content {
    display: flex;
    flex-direction: column;
}
.cajero-vista .cajero-item .cajero-item-container .cajero-item-content .fila-cajero-item{
    display: flex;
    width: 100%;
    line-height: 2rem;
}
.cajero-vista .cajero-item .cajero-item-container .cajero-item-content .fila-cajero-item .item-col{
    width: 50%;
}
 @-webkit-keyframes loading {
    0%{background-position:0% 46%}
    50%{background-position:100% 55%}
    100%{background-position:0% 46%}
}
@-moz-keyframes loading {
    0%{background-position:0% 46%}
    50%{background-position:100% 55%}
    100%{background-position:0% 46%}
}
@keyframes loading {
    0%{background-position:0% 46%}
    50%{background-position:100% 55%}
    100%{background-position:0% 46%}
}
</style>