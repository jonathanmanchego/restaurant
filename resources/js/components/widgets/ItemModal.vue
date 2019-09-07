<template>  
    <tr>
        <td scope="row" >
            <input type="checkbox" v-model="listar" @change="checkItem">
        </td>
        <td>
            {{ producto.get_producto.nombre }}
        </td>
        <td scope="row">
            {{ producto.cantidad }}
        </td>
        <td>
            {{ producto.subtotal }}
            
        </td>
        <td>
            <input type="number" :max="producto.cantidad" v-model.number="prodToPay.cantPay">
        </td>
        <td>
            <input v-model="subTotal" />
        </td>
    </tr>
</template>
<script>
import events from '../../events/events.js';
export default {
    data(){
        return {
            listar : false,
            prodToPay : {
                producto_id : this.producto.get_producto.id,
                cantPay: 0,
                precioUnitario : parseFloat(this.producto.get_producto.precio).toFixed(3)
            }
        }
    },
    computed:{
        subTotal: function(){
            return this.prodToPay.cantPay * parseFloat(this.producto.get_producto.precio);
        }
    },
    props:{
        producto : Object
    },
    methods:{
        checkItem : function(){
            if(this.listar){
                this.$emit('checkItem',{
                    prod : this.prodToPay,
                    act : true
                    });
            }else{
                this.$emit('checkItem',{
                    prod : this.prodToPay,
                    act : false
                    });
            }
        }
    }
}
</script>
