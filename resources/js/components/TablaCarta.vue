<template>
	<div class="box-body">
		<table class="table table-bordered table-hover dataTable" id="tabla-data-productos">
			<thead>                    	
				<tr>
						<th>#</th>
						<th>PRODUCTO</th>
						<th>CODIGO PRODUCTO</th>
						<th>STOCK</th>
						<th>PRECIO</th>
						<th>CATEGORIA</th>
						<th>Quitar</th>
				</tr>                
			</thead>
			<tbody id="carta_items">
				<item-carta></item-carta>
			</tbody>
		</table>
	</div>
</template>
<script>
	export default{
		mounted(){
			axios.get('http://localhost:8000/sistema/carta')
				.then(res=>{
					this.productos = res.data;
					console.log(res.data);
				});
		},
		data(){
			return {
				productos : []
			}
		},
		methods:{
			
		}
	}
</script>