<template>
	<div class="row">
		<div class="col-lg-12">
			<div class="box box-danger">
				<div class="box-body">
					<div class="form-group col-md-12">                     
						<!-- <mesas v-model="orden_actual.mesa"></mesas> -->
							<input name="mesa" id="mesas" class="form-control" type="hidden" :value="mesaSelected.id" readonly="readonly" />
							<br><h3>&nbsp;<b>Mesa Nro : {{ mesaSelected.numero}}</b> <a class="btn btn-primary"  href="/sistema/mesas-show"><i class="fa fa-search-plus"></i></a></h3>
						<div class="col-md-2">
							<label for="">Producto:</label>
							<button id="" type="button" class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#modal-default1" >Productos <span class="fas fa-list"></span></button>
						</div>
						<div class="col-md-4"></div>
						<div class="col-md-2">
							<label for="procesar">Procesar:</label>
							<button id="procesar" class="btn btn-success btn-block" @click="calcular()">Calcular<i class="fas fa-calculator"></i></button>
						</div>
						<div class="col-md-2">
							<label for="procesar">Terminar:</label>
							<button id="procesar" class="btn btn-success btn-block" @click="send()">Enviar <i class="fas fa-paper-plane"></i></button>
						</div>
					</div>
					<table id="tbventas" class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>Codigo</th>
								<th>Nombre</th>
								<th>Precio</th>
								<th>Stock</th>
								<th>Cantidad</th>
								<th>Importe</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="listaOrden">
							<item-orden v-for="(item,key) in orden_actual.detalle" v-bind:key="key" v-bind:item="item"></item-orden>
						</tbody>
					</table>
					<div class="form-group">
						<div class="col-xs-6 col-md-3">
							<div class="input-group">
								<span class="input-group-addon">Total:</span>
								<input type="text" class="form-control" placeholder="" name="subtotal" readonly="readonly" v-model="orden_actual.total">
							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="input-group">
								<span class="input-group-addon">Fecha:</span>
								<input type="text" class="form-control" placeholder="" name="igv" readonly="readonly" :value="time">
							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="input-group">
								<span class="input-group-addon">Descuento:</span>
								<input type="text" class="form-control" placeholder="" name="descuento" value="0.00" readonly="readonly">
							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="input-group">
								<span class="input-group-addon">Total:</span>
								<input type="text" class="form-control" placeholder="" readonly="readonly">
							</div>
						</div>
					</div>   
				</div>
				<div class="box-footer">
					<div class="col-lg-3"></div>
					
				</div>
			</div>
		</div>
		<tabla-productos v-bind:titles="['#','Stock','Nombre','Precio','Categoria','Agregar']" v-bind:ruta="'sistema/carta'"></tabla-productos>
	</div> 
</template>
<script>
	import events from '../../events/events.js';
	import * as moment from 'moment';
	export default{
		created(){
			events
				.$on('add-producto',(item) =>{
					let aux = -1;
					for(let i = 0; i < this.orden_actual.detalle.length;i++){
						if(this.orden_actual.detalle[i].id == item.id){
							aux = i;	
						}
					}
					if(aux != -1){
						console.log("Repetido");
					}else{
						this.orden_actual.detalle.push(item);	
					}
					
					// item.cantidad = 1;
					// item.subtotal = 1 * item.precio;
					// this.orden_actual.detalle.push(item);
					// this.calculateTotal();
				});
		},
		mounted(){
		},
		data(){
			return {
				time: moment(Date.now()).format("MM-DD-YYYY"),
				orden_actual : {
					mesa: 0,
					total : 0,
					detalle: []
				}
			}
		},
		computed:{
			mesaSelected : function(){
				let ans = 0;
				mesas.forEach(x=>{
					if(x.numero == mesa){
						ans = x;
					}
				});
				return ans;
			}
		},
		methods:{
			send: function(){
				console.log(this.orden_actual);
			},
			calcular: function(){
				let ans = 0;
				if(this.orden_actual.detalle.length > 0){
					this.orden_actual.detalle.forEach(item =>{
						ans += item.subtotal;
					});
				}
				this.orden_actual.total = ans;
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