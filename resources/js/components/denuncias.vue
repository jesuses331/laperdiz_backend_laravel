<template>
    <div>
        <h1 class="text-center">Denuncias</h1>
        <hr>

    <!-- Trigger the modal with a button -->
    <button @click="modificar=false; abrirModal()" type="button" class="btn btn-success btn-lg" >Hacer Denuncias</button>

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
                        <input v-model="denuncia.titulo" id="titulo" placeholder="Titulo" type="text" class="form-control" >
                         <span class="text-danger" v-if="errores.titulo">{{errores.titulo[0]}}</span>
                    </div>
                    <div>
                        <label for="descripcion">Descripcion</label>
                        <textarea v-model="denuncia.descripcion" id="descripcion" placeholder="descripcion" type="textarea" class="form-control" rows="10"></textarea>
                         <span class="text-danger" v-if="errores.descripcion">{{errores.descripcion[0]}}</span>
                    </div>
                    <div>
                        <label for="ciudad">Ciudad</label>
                        <input v-model="denuncia.ciudad" id="ciudad" placeholder="ciudad" type="text" class="form-control" >
                        <span class="text-danger" v-if="errores.ciudad">{{errores.ciudad[0]}}</span>
                    </div> <br>
                    <div>
                        <label for="files">fotos</label>
                        <input class="hidden" @change="imageChange" type="file" name="files[]" ref="files" id="files" multiple>
                    </div>
                    <div class="m-auto">
                        <p v-for="(image,index) in images" :key="index">{{image.name}}</p>
                    </div>
                      <!--  <input  id="detalle" placeholder="Detalle de la mascota" type="text" class="form-control" >
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
        <th scope="col">Descripcion</th>
        <th scope="col">Ciudad</th>
        <th scope="col" colspan="2" class="text-center">Accion</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="den in denuncias" :key="den.id">
        <th scope="row">{{ den.id }}</th>
        <td>{{ den.titulo }}</td>
        <td>{{ den.descripcion }}</td>
        <td>{{ den.ciudad }}</td>
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
            denuncia:{
                titulo:'',
                fecha:'1992-03-07',
                descripcion:'',
                ciudad:'',
                

            },
            errores:{},
            denunciaSeleccionada:null,
            modificar:true,
            modal:0,
            tituloModal:'',
            denuncias:[],



        }
    },
    methods: {
        
        async listar(){
           const res = await axios.get('denuncias');
            this.denuncias=res.data;
        },
       async guardar(){

           try {
               if (this.modificar){
                const res = await axios.put('/denuncias/' + this.id, this.denuncia)

                
                 }else{
               
                    const res = await axios.post('denuncias',this.denuncia)
                            
                }
                this.uploadImages();
                this.cerrarModal();
                this.listar();
                
           } catch (error) {
                if (error.response.data){
                   this.errores = error.response.data.errors;
               }
               console.log(error.response.data);
           }
            
            
        },
        async eliminar (id){
           const res = await axios.delete('denuncias/'+ id);
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
                this.tituloModal = "Editar Denuncia";
                this.denuncia.fecha = '1992-03-07';
                this.denuncia.titulo = data.titulo;
                this.denuncia.descripcion = data.descripcion;
                this.denuncia.ciudad = data.ciudad;
            }else{
                this.id = 0;
                this.tituloModal = 'Registrar Denuncia';
                this.denuncia.titulo ='' ;
                this.denuncia.descripcion = '';
            }
            

        },
        cerrarModal(){
            this.modal = 0;
            this.errores = {};
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
                axios.post('denuncias/' + this.id,formData,config) 
                .then(response =>{
                self.$refs.files.value = '';
                self.images = [];
                console.log('Si se modifico');
                })
                .catch(error =>{
                    console.log(error);
                })
            }else{
            axios.post('/denuncia/imagenes',formData,config )
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