<template >
    <div class="container" >
        Orden N° {{ orden.id}} 
        <button @click="mostrarorden" class="btn btn-info">
                Notification <span class="badge badge-primary"></span>
        </button>
        <ul v-show=mostrar>
            <li v-for="i in 10" :key=i>{{ i }}</li>
        </ul>
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
        mostrarorden: function(){
            this.mostrar = !this.mostrar;
        }
    }
}
</script>