<template>
	<tr :id="'item-productos-'+item.id">
	    <td>{{item.id}}</td>
	    <td>{{item.codigo}}</td>
	    <td>{{item.nombre}}</td>
	    <td>{{item.precio}} </td>
	    
	    <td>{{item.categoria.nombre}}</td>
	    <td>
	        <div class="btn-group">
	            <button class="btn btn-success" id="btn-agregarprod" @click="agregarProd(item)">
	                <span class="fa fa-plus"></span>
	            </button>
	        </div>
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

			}
		},
		props:{
			item: Object,
			index : Number
		},
		methods: {
			agregarProd: (x)=>{
				x.item_id = 0;
				x.stock = 0;
				events.$emit('add-producto',x);
			}
		}
	}
</script>