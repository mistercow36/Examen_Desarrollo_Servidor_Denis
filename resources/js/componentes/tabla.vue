<template>
    <table>
        <tr>
            <th v-for="campo in campos">
                <button class="cursor-pointer rounded text-lg bg-red-500 text-gray-200 hover:bg-amber-100 hover:text-gray-700">{{campo}}</button>
            </th>
            <th></th>
            <th></th>
        </tr>
        <tr v-for="fila in filas">
            <td v-for="valor in fila">{{valor}}</td>
            <td><button v-on:click="borrar(fila.id)">Borrar</button></td>
            <td><button @click="editar(fila.id)">Editar</button></td>
        </tr>

    </table>
</template>

<script>

import axios from "axios";
export default {
    name: "tabla",
    //lista de los atributos que voy a recibir de la lista
    props:["filas_serializado", "campos_serializado", "nombre_serializado"],
    data(){
        return{
            filas:[],
            campos:[],
            nombre:"",
        }
    },
    mounted(){
        this.filas=JSON.parse(this.filas_serializado);
        this.campos=JSON.parse(this.campos_serializado);
    },
    methods:{
        ordena:function(campo){
            this.filas = this.filas.sort((a,b)=>{
                if (a[campo]>b[campo])
                    return 1;
                else return -1
            })
        },

        borrar:function (id){
            var url =window.location.href;
            url=url +"/"+id;
            var self=this;

            axios.delete(url)
                .then((response)=> {
                    var datos = response.data;
                    console.log(response.data);

                    alert("respuesta" + response.data.saludo);
                    self.filas=response.data.alumnos;
                })
                .catch((error)=>
                    alert("Error en la solicitud delete " +error)
                )


        },
        editar:function (campo){
            var url =window.location.href;
            window.location.href=url+"/"+campo+" /edit";

        }
    }
}
</script>


<style scoped>

</style>
