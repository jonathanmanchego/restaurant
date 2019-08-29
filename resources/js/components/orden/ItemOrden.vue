<template>
	
	<tr :id="item.id">
		<td>{{item.codigo}}</td>
		<td>{{item.nombre}}</td>
		<td>{{item.precio}}</td>
		<td>
			{{item.stock}}
		</td>
        <td>
			<input type="number" class="borde border-secondary text-center form-control-plaintext" min="1" :max="item.stock" autocomplete="off" style="width:35%" v-model="item.cantidad">
		</td>
		<td>
			<div class="input-group">
                <span class="input-group-addon">Total:</span>
                <input type="text" class="form-control" placeholder="0" name="subtotal" readonly="readonly"  v-model="item.subtotal = item.precio * item.cantidad">
            </div>
		</td>
		<td>
			<button class="btn btn-danger" @click="eliminarProd(index,item.id,item.item_id)"><span class="fa fa-close"></span></button>
		</td>
	</tr>
</template>
<script>
	import events from '../../events/events.js';
	export default{
		created(){
		},
		mounted(){

		},
		data(){
			return {
                laoding: true
			}
        },
		props:{
			item: Object,
			index : Number
		},
		methods:{
			eliminarProd : (pos,item_id,x)=>{
				events.$emit('remove-item',pos,item_id,x);
            }
		}
	}
</script>