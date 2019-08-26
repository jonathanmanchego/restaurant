<template>
	<div class="modal fade" id="modal-default1">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title">Lita de Productos</h4>
	            </div>
	            <div class="modal-body">
	                <div class="row">
	                    <div class="col-md-9">
	                        <input type="text" style="text-transform:uppercase;" class="form-control" id="buscarprod">
	                    </div>
	                    <div class="col-md-3">
	                        
	                                    <button id="btn-agregar" type="button" class="btn btn-success btn-flat btn-block"><span class="fa fa-plus"></span> Agregar</button>
	                    </div>                                           
	                </div>
	                <div class="row">
	                    <div class="col-md-12">
	                        <table id="example1" class="table table-bordered table-hover">
	                            <thead>
	                                <tr>
	                                    <th>#</th>
	                                    <th>Codigo</th>
	                                    <th>Nombre</th>
	                                    <th>Precio</th>
	                                    
	                                    <th>Categoria</th>
	                                    <th>Agregar</th>
	                                </tr>
	                            </thead>
	                            <tbody id="busqueda_producto">
	                            	<item-tabla-productos v-for="(ele,key) in productos" v-bind:key="key" v-bind:item="ele"></item-tabla-productos>
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
	            </div>
	        </div>
	    </div>
	</div>
</template>
<script>
	import events from '../../events/events.js';
	export default{
		created(){
			
		},
		mounted(){
			axios.get('http://localhost:8000/sistema/producto')
				.then(res=>{
					this.productos = res.data;
					this.load = false;
					console.log(res.data);
				});
		},
		data(){
			return {
				productos : []
			}
		}
	}
</script>