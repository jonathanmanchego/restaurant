<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <success v-if="good" messagge="Productos Cancelado Satisfactoriamente" @close="good = false"></success>
                    <error v-if="bad" messagge="No hay productos seleccionados" @close="bad = false"></error>
                    <!-- <button type="button" class="close" productos-dismiss="modal" aria-label="Close"> -->
                    <button class="close" @click="$emit('close')"><i class="fas fa-times"></i></button>
                    <table class="table table-bordered table-hover table-responsive table-custom">
                        <thead class="thead-inverse">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad Total</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Cantidad a Cancelar</th>
                                <th scope="col">Subtotal a Cancelar</th>
                            </tr>
                            </thead>
                            <tbody>
                                <item-modal v-on:checkItem="addToSelecteds($event,$event)" v-for="item in productos" :producto=item :key="item.id"></item-modal>
                                <tr>
                                    <td colspan="6">
                                        <button type="button" class="btn btn-primary btn-block" @click="cancelarOrden()"> Cancelar</button>
                                    </td>
                                </tr>
                            </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </transition>
</template>
<script>
import events from '../../events/events.js';
export default {
    created(){
    },
    mounted(){
    },
    data(){
        return {
            total : 0,
            productosSeleccionados : [],
            bad : false,
            good: false
        }
    },
    props:{
        productos: Array
    },
    methods:{
        addToSelecteds : function(obj,lt){
            let aux = -1;
            this.productosSeleccionados.forEach((l,key)=>{
                if(l.producto_id == obj.prod.producto_id){
                    aux = key;
                }
            });
            if(aux == -1){
                if(obj.act){
                    this.productosSeleccionados.push(obj.prod);
                }     
            }else{
                if(!obj.act){
                    this.productosSeleccionados.splice(aux,1);
                }
            }
            console.log(this.productosSeleccionados);
        },
        cancelarOrden : function(){
            console.log("-----------------",this.productosSeleccionados);
            if(this.productosSeleccionados.length > 0){
                ///////////TAMBIEN DEBEMOS VERIFICAR QUE TENGAN CANTIDADES MAYORES QUE CERO
                let aux = true;
                this.productosSeleccionados.every(function(x){
                    (x.cantPay>0)? aux = true:aux = false;
                    return aux;
                });
                console.log(aux);
                if(aux){
                    this.productos.every((x,k)=>{
                        this.productosSeleccionados.every((y,ky)=>{
                            if(y.producto_id == x.get_producto.id){
                                x.cantidad -= y.cantPay;
                                return false;
                            }
                            return true;
                        });
                        return true;
                    });
                    this.good = true;
                }
            }else{
                this.bad = true;
            }
            console.log("----------------",this.productos);
        }
    }
}
</script>
<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: flex;
  transition: opacity .3s ease;
  justify-content: center;
  align-items: center;
}

.modal-wrapper {
  display: flex;
  width: 80%;
}

.modal-container {
  width: 100%;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;
  padding: 1%;
}
.table-custom{
    width: 85%;
    margin: 0 auto;
}
.row-item{
    display: grid;
    grid-template-columns: repeat(7,1fr);
}

.modal-header h3 {
  margin-top: 0;
  color: #1f2985;
}

.modal-body {
  margin: 20px 0;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}
.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>