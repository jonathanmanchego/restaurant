<template>
	
	<tr :id="item.id">
		<td>{{item.id}}</td>
		<td>{{item.nombre}}</td>
		<td>{{item.codigo}}</td>
		<td>
			<input type="number" class="borde border-secondary text-center form-control-plaintext" :id="'counter_'+item.id" autocomplete="off" style="width:35%" v-model="item.stock">
		</td>
		<td>
			{{item.precio}}
		</td>
		<td>
			{{item.categoria.nombre}}
		</td>
		<td>
			<button class="btn btn-danger" @click="eliminarProd(index,item.id,item.item_id)"><span class="fas fa-close"></span></button>
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