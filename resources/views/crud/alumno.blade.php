@extends('layout')
@section("contenido")
    <h1>Alumnos</h1>
    <tabla filas_serializado="{{$alumnos}}" campos_serializado="{{$campos}}" nombre="{{$nombres}}"></tabla>
    <table>
        <tr>
            <th>Numero</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>DNI</th>
        </tr>

            <?php
                $alumnos = DB::table('alumnos')->get();
                $i = 0;
                foreach($alumnos as $alumno){
                    echo "<tr>";
                    echo "<td>".++$i."</td>";
                    echo "<td>".$alumno->nombre."</td>";
                    echo "<td>".$alumno->apellidos."</td>";
                    echo "<td>".$alumno->direccion."</td>";
                    echo "<td>".$alumno->dni."</td>";
                    

                    echo "<td><button v-on:click='borrar(".$alumno->id.")'>Borrar</button></td>";
                    echo "<td><button v-on:click='editar(".$alumno->id.")'>Editar</button></td>";
                    echo "</tr>";
                }

            ?>
    </table>
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

@endsection
