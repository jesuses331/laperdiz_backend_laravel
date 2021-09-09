<template>
    <div>
        <h1 class="text-center">Capacitaciones</h1>
        <hr>

    <!-- Trigger the modal with a button -->
    <button @click="modificar=false; abrirModal()" type="button" class="btn btn-success btn-lg" >Registrar Capacitacion</button>

    <!-- Modal -->
    <div  class="modal" :class="{mostrar:modal}">
        <div class="modal-dialog">

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ tituloModal }}</h4>
                    <button @click="cerrarModal()" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal Body-->
                <div class="modal-body">
                    <div>
                        <label for="titulo">Titulo</label>
                        <input v-model="curso.titulo" id="titulo" placeholder="Titulo" type="text" class="form-control" >
                    </div>
                    <div>
                        <label for="lugar">Lugar</label>
                        <input v-model="curso.lugar" id="lugar" placeholder="Lugar" type="text" class="form-control" >
                          
                        
                    </div>
                    <div>
                        <label for="ciudad">Ciudad</label>
                        <input v-model="curso.ciudad" id="ciudad" placeholder="ciudad" type="text" class="form-control" >
                    </div>
                    <div>
                        <label for="hora">Hora</label>
                        <input v-model="curso.hora" id="hora" placeholder="Hora" type="time" class="form-control" >
                    </div>
                    <div>
                        <label for="fecha">Fecha</label>
                        <input v-model="curso.fecha" id="fecha" placeholder="fecha" type="date" class="form-control" >
                    </div>

                   <!-- <div>
                        <label for="files">fotos</label>
                        <input class="hidden" @change="imageChange" type="file" name="files[]" ref="files" id="files" multiple>
                    </div>
                    <div class="m-auto">
                        <p v-for="(image,index) in images" :key="index">{{image.name}}</p>
                    </div>
                        <input  id="detalle" placeholder="Detalle de la mascota" type="text" class="form-control" >
                    </div>
                    <div>
                        <label for="razas">Raza</label>
                        <select v-model="mascota.raza_id"  id="razas" class="form-control">
                            <option value="null">Seleccione una raza</option>
                           <option v-for="raz in razas" :key="raz.id" v-bind:value="raz.id">{{raz.nombre}}</option>
                        </select>
                        <p>{{mascota.raza_id}}</p>
                        
                    </div>
                     <div>
                        <label for="etapas">Etapas</label>
                        <select v-model="mascota.etapa_id"  id="etapas" class="form-control">
                            <option value="null">Seleccione una etapa</option>
                           <option v-for="etapa in etapas" :key="etapa.id" v-bind:value="etapa.id">{{etapa.nombre}}</option>
                        </select>
                        <p>{{mascota.etapa_id}}</p>
                        
                    </div>-->
                    
                

                </div>
                <div class="modal-footer">
                    <button @click="guardar()" type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
                    <button @click="cerrarModal();" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

        </div>
    </div>   
    <br>
    
    <table class="table ">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">titulo</th>
        <th scope="col">Lugar</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Hora</th>
        <th scope="col">Fecha</th>
        <th scope="col" colspan="2" class="text-center">Accion</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="den in cursos" :key="den.id">
        <th scope="row">{{ den.id }}</th>
        <td>{{ den.titulo }}</td>
        <td>{{ den.lugar }}</td>
        <td>{{ den.ciudad }}</td>
        <td>{{ den.hora }}</td>
        <td>{{ den.fecha }}</td>
        <td>
            <button  @click="modificar=true; abrirModal(den)" class="btn btn-warning">Editar</button>
        </td>
        <td>
            <button @click="eliminar(den.id)" class="btn btn-danger">Eliminar</button>

        </td>
        </tr>
        
    </tbody>
    </table>

</div>
    
</template>

<script>
export default {
    data(){
        return {
            /*****Imagenes */
            id_image:0,
                images:[],
                pictures:'',
           
            /*********Mascotas */
            id:0,
            curso:{
                titulo:'',
                lugar:'',
                ciudad:'',
                hora:'',
                fecha:'',
              
               
                

            },
            denunciaSeleccionada:null,
            modificar:true,
            modal:0,
            tituloModal:'',
            cursos:[],



        }
    },
    methods: {
        
        async listar(){
           const res = await axios.get('cursos');
            this.cursos=res.data;
        },
       async guardar(){
            if (this.modificar){
                const res = await axios.put('/cursos/' + this.id, this.curso)

                
            }else{
               
                const res = await axios.post('cursos/',this.curso)
                            
            }
           // this.uploadImages();
            this.cerrarModal();
            this.listar();
            
        },
        async eliminar (id){
           const res = await axios.delete('cursos/'+ id);
            this.listar();
        },

        /*********RAZAS***/
        /*async listarRazas(){
           const res = await axios.get('/razas');
            this.razas=res.data;
        },
        /*********ETAPAS***
        async listarEtapas(){
           const res = await axios.get('/etapas');
            this.etapas=res.data;
        },*/

        abrirModal(data={}){
            this.modal = 1;
            if (this.modificar) {
                this.id = data.id;
                this.tituloModal = "Editar Curso";
                this.curso.titulo = data.titulo;
                this.curso.lugar = data.lugar;
                 this.curso.hora = data.hora;
                this.curso.fecha = '1992-03-07';
               
                this.curso.ciudad = data.ciudad;
            }else{
                this.id = 0;
                this.tituloModal = 'Registrar Curso';
                this.denuncia.titulo ='' ;
                this.denuncia.descripcion = '';
            }
            

        },
        cerrarModal(){
            this.modal = 0;
        },
        imageChange(){
            for (let i = 0; i < this.$refs.files.files.length; i++) {
                
                this.images.push(this.$refs.files.files[i]);
                console.log(this.images);
            }
        },
        uploadImages(){
            
            var self=this;
            let formData = new FormData();
            for (let i = 0; i < this.images.length; i++) {
                
                let file = self.images[i];
                formData.append('files['+ i +']', file);

            }
            
            const config = {
                headers: { "Content-Type" : "multipart/form-data"}
            }
            
           
            if(this.modificar){
                formData.append('_method','PATCH');
                axios.post('cursos/' + this.id,formData,config) 
                .then(response =>{
                self.$refs.files.value = '';
                self.images = [];
                console.log('Si se modifico');
                })
                .catch(error =>{
                    console.log(error);
                })
            }else{
            axios.post('/cursos/imagenes/',formData,config )
            .then(response =>{
             self.$refs.files.value = '';
            self.images = [];
                    
            console.log('Si se guardo');
                })
                .catch(error =>{
                    console.log(error);
                })
            }
            
            
        },
    },
    created(){
       this.listar();
        
       
       
    }
    
}
</script>

<style>
    .mostrar{
        display: list-item;
        opacity: 100;
        background: rgba(39, 38, 38, 0.432);
    }
</style>