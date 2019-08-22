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
			{{item.cat}}
		</td>
		<td>
			<button class="btn btn-danger" @click="eliminarProd(item.id)"><span class="fa fa-close"></span></button>
		</td>
	</tr>
</template>
<script>
	export default{
		mounted(){

		},
		data(){
			return {
				// item : {
				// 	id : 10,
				// 	codigo : "asa",
				// 	nombre : "papa ..",
				// 	stock : 50,
				// 	precio : 23.50,
				// 	categoria: "desayuno"
				// }
			}
		},
		props:{
			item: Object
		},
		methods:{

		}
	}
</script>