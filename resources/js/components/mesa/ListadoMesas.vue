<template>
	<div class="col-md-2">
        <label for="mesas">Mesa :</label>
        <select v-model="mesasTarget" id="mesas" class="form-control" required @change="alter($event)">
            <option value="0" disabled>N° Mesa</option>
            <option v-for="(mesa,key) in data" v-bind:key="key"  v-bind:value="mesa.id"># {{ mesa.numero }}</option>
        </select>
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
                mesasTarget : 0,
                data : mesas
			}
        },
        props:{
            value: Number
        },
		methods: {  
            emitResult(){
                // console.log("jaja");
                this.$emit('input', this.mesasTarget);
            },
			alter(e){
                this.emitResult();
            }
		}
	};
</script>
<style>
	
</style>