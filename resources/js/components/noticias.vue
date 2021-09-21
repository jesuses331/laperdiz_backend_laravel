<template>
    <div>
        <h1 class="text-center">Gestionar Noticias</h1>
        <hr>

    <!-- Trigger the modal with a button -->
    <button @click="modificar=false; abrirModal()" type="button" class="btn btn-success btn-lg" >Registra Noticias</button>

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
                        <label for="autor">Autor</label>
                        <input v-model="noticia.autor" id="autor" placeholder="autor " type="text" class="form-control" >
                    </div>
                    <div>
                        <label for="titulo">Titulo</label>
                        <input v-model="noticia.titulo" id="titulo" placeholder="Titulo " type="text" class="form-control" >
                    </div>
                    <div>
                        <label for="descripcion">Descripcion</label>
                        <input v-model="noticia.descripcion" id="descripcion" placeholder="Detalle de la notiica" type="text" class="form-control" >
                    </div>
                    <br> 
                   <!-- <div>
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
                    <div>
                        <label for="files">fotos</label>
                        <input class="hidden" @change="imageChange" type="file" name="files[]" ref="files" id="files" multiple>
                    </div>

                

                </div>
                <div class="modal-footer">
                    <button @click="guardar();" type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
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
        <th scope="col">autor</th>
         <th scope="col">fecha</th>
        <th scope="col">titulo</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Ciudad</th>
        <th scope="col" colspan="2" class="text-center">Accion</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="not in noticias" :key="not.id">
        <th scope="row">{{ not.id }}</th>
         <th >{{ not.autor }}</th>
        <th >{{ not.fecha }}</th>
        <td>{{ not.titulo }}</td>
        <td>{{ not.descripcion }}</td>
        <td>{{ not.ciudad }}</td>
        <td>
            <button  @click="modificar=true; abrirModal(not)" class="btn btn-warning">Editar</button>
        </td>
        <td>
            <button @click="eliminar(not.id)" class="btn btn-danger"  >Eliminar</button>

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
            id_image:0,
                images:[],
                pictures:'',
            /*********Mascotas */
            id:0,
            noticia:{
                fecha:null,
                autor:'',
                titulo:'',
                descripcion:'',
                ciudad:'santa cruz'

            },
            modificar:true,
            modal:0,
            tituloModal:'',
            noticias:[],



        }
    },
    methods: {
        async listar(){
           const res = await axios.get('noticias');
            this.noticias=res.data;
        },
        async guardar(){
            if (this.modificar){
                const res = await axios.put('/noticias/' + this.id, this.noticia)

                
            }else{
                console.log(this.noticia);
                const res = await axios.post('noticias',this.noticia)
                            
            }
            this.uploadImages();
            this.cerrarModal();
            this.listar();
            
        },
        async eliminar (id){
           const res = await axios.delete('/noticias/'+id);
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
                axios.post('noticias/' + this.id,formData,config) 
                .then(response =>{
                self.$refs.files.value = '';
                self.images = [];
                console.log('Si se modifico');
                })
                .catch(error =>{
                    console.log(error);
                })
            }else{
            axios.post('/noticia/imagenes',formData,config )
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
        abrirModal(data={}){
            this.modal = 1;
            if (this.modificar) {
                this.id = data.id;
                this.tituloModal = "Editar Noticia";
                this.noticia.autor = data.autor;
                this.noticia.titulo = data.titulo;   
                this.noticia.descripcion = data.descripcion;
            }else{
                this.id = 0;
                this.tituloModal = 'Registrar Noticia';
                this.noticia.autor ='',
                this.noticia.titulo ='';
                this.noticia.descripcion = '';
               
                
                console.log(this.noticia);
            }

        },
        cerrarModal(){
            this.modal = 0;
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