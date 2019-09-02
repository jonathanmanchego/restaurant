<template>
    <div class="cajero-vista">
        <div v-for="(orden,key) in ordenes" v-bind:key="key" class="cajero-item">
            <orden v-bind:orden=orden ></orden>
            <div  class="cajero-item-container">
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
        axios.get('/sistema/orden')
            .then(res=>{
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
            ordenes : []
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
    grid-gap: .2rem;
    width: 95%;
    margin: 0 auto;
}
.cajero-vista .cajero-item{
    width: 100%;
    border: 1px solid #000;
    padding: 5%;
    cursor: pointer;
}
.cajero-vista .cajero-item:hover{
    background-color: rgba(69, 102, 173, 0.4);
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
</style>