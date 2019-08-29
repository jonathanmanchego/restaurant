<template>
	<div class="box-body tabla-container">
		<div class="gen-btn">
			<div class="gen-item">
				<a class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-default1" ><span class="fa fa-list"></span>  PRODUCTOS</a>
			</div>
			<div class="gen-item">
				<button class="btn btn-success btn-block" @click="agregarProd()">GUARDAR</button>
			</div>
		</div>
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
				<spiner v-show="load"></spiner>
				<item-carta v-for="(producto,key) in productos" v-bind:key="key" v-bind:item="producto" v-bind:index="key"></item-carta>
			</tbody>
		</table>
		<success v-show="success"  messagge="CARTA GUARDADA"></success>
	</div>
</template>
<script>
	import events from '../../events/events.js';
	export default{
		created(){
			events.$on('remove-item',(key,item_id,carta_item_id) =>{
				if(carta_item_id != 0){
				    this.data = {
				        producto_id : item_id,
				        carta_id : carta_actual.id
				    };
				    axios
				    	.post('/sistema/carta/removiendo',this.data)
				    	.then(res=>{
				    		console.log(res.data);
				    		this.productos.splice(key,1);
				    	});
			    }else{
			    	this.productos.splice(key,1);
			    }
			});
			events.$on('add-producto',(item) =>{
				item.item_id = 0;
				item.stock = 0;
				this.productos.push(item);
			});
		},
		mounted(){
			axios.get('http://localhost:8000/sistema/carta')
				.then(res=>{
					this.productos = res.data;
					this.load = false;
					console.log(res.data);
				});
		},
		data(){
			return {
				productos : [],
				data : {},
				load: true,
				success: false
			}
		},
		methods:{
			agregarProd : function(){
				let ToSend = {
					data : this.productos,
					carta_id : carta_actual.id
				};
				axios
					.post('http://localhost:8000/sistema/carta/instanciando',ToSend)
					.then(res =>{
						this.productos.forEach((x,pos)=>{
							x.item_id = res.data[pos].id;
						});
						this.success = true;
						setTimeout(()=>{
							this.success = false;
						},2500);
						console.log(res.data);
					})
					.catch((e)=>{
						console.log(e);
					});
			}
		}
	}
</script>
<style>
.tabla-container{
	position: relative;
}
.gen-btn{
	display: flex;
	justify-content: space-around;
	width: 100%;
}
.gen-item{
	width: 40%;		
}
</style>