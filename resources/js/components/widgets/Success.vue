<template>
	<div id="modal-msg" class="bg-primary">
		<div class="modal-cont">
			<!-- <button class="close" @click="cerrar()"><span aria-hidden="true">&times;</span></button> -->
			<span class="modal-cont-msg">{{messagge}}</span>
		</div>
	</div>
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
			messagge: String
		},
		methods: {
			
		}
	};
</script>
<style>
	#modal-msg{
		position: absolute;
		width: 50%;
		z-index: 5;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		/*background-color: #0ECCFC;*/
	}
	.modal-cont{
		position: relative;
		width: 100%;
		display: flex;
		justify-content: center;
	}
	.modal-cont .close{
		position: absolute;
		right: 10px;
	}
	.modal-cont-msg{
		line-height: 5rem;
		font-size: 2rem;
		color: #fff;
	}
</style>