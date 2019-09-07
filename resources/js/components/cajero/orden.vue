<template >
    <div class="card-header d-flex align-items-center" >
        <span>Orden N° {{ orden.id}} </span>
        <button @click="toggleModal" class="ml-auto btn btn-secondary">
                <i class="fas fa-hand-holding-usd"></i>
        </button>
        <modal :productos="orden.get_detalle_ordenes" v-if="mostrar" @close="toggleModal"></modal>
    </div>
</template>
<script>
import events from '../../events/events.js';
import * as moment from 'moment';
export default{
    mounted(){
    },
    created(){
    },
    data(){
        return {
            mostrar : false
        }
    },
    props:{
        orden: Object
    },
    methods:{
        toggleModal: function(){
            this.mostrar = !this.mostrar;
        }
    }
}
</script>