<template>
    <div>
        <h1 class="text-center">Gestionar Mascotas</h1>
        <hr>

    <!-- Trigger the modal with a button -->
    <button @click="modificar=false; abrirModal()" type="button" class="btn btn-success btn-lg" >Registrar mascota</button>

    <!-- Modal -->
    <div  class="modal" :class="{mostrar:modal}">
        <div class="modal-dialog modal-dialog-scrollable">

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ tituloModal }}</h4>
                    <button @click="cerrarModal()" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal Body-->
                <div class="modal-body row">
                    <div class="col-6">
                        <label for="nombre">Nombre</label>
                        <input v-model="mascota.nombre" id="nombre" placeholder="Nombre de la mascota" type="text" class="form-control" >
                        <span class="text-danger" v-if="errores.nombre">{{errores.nombre[0]}}</span>
                    </div><br>
                   
                    <div class="col-6">
                        <label for="razas">Raza</label>  
                        <select v-model="mascota.raza_id"  id="razas" class="form-control">
                            <option value="null">Seleccione una raza</option>
                           <option v-for="raz in razas" :key="raz.id" v-bind:value="raz.id">{{raz.nombre}}</option>
                        </select>
                         <span class="text-danger" v-if="errores.raza_id">{{errores.raza_id[0]}}</span>
                    </div><br>
                    <div class="col-6">
                       <label for="etapas">Etapas</label>
                        <select v-model="mascota.etapa_id"  id="etapas" class="form-control">
                            <option value="null">Seleccione una etapa</option>
                           <option v-for="etapa in etapas" :key="etapa.id" v-bind:value="etapa.id">{{etapa.nombre}}</option>
                        </select>
                         <span class="text-danger" v-if="errores.etapa_id">{{errores.etapa_id[0]}}</span>
                        
                    </div>
                    <br>
                    <div class="col-6">
                       <label for="estado">Estado</label>
                         <input type="checkbox" v-model="mascota.estado">
                    </div>
                    <div class="col-12">
                        <label for="detalle">Detalle</label>
                         <ckeditor v-model="mascota.detalle" id="detalle" placeholder="Detalles" ></ckeditor>
                         
                         <span class="text-danger" v-if="errores.detalle">{{errores.detalle[0]}}</span>
                    </div>
                    <div class="py-3 m-3">
                        <label for="files">fotos</label>
                        <input class="hidden" @change="imageChange" type="file" name="files[]" ref="files" id="files" multiple>
                        <span class="text-danger" v-if="errores.imagen">{{errores.imagen[0]}}</span>
                    </div>
                    <table class="table-auto w11/12 m-auto bg-white rounded my-10">
                        <thead>
                            <tr>
                            <th class="px-4 py-2 border">id</th>
                            <th class="px-4 py-2 border">images</th>
                            <th class="px-4 py-2 border">Actions</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            <tr v-for="(picture,index) in pictures" :key="index">
                                <td class="border px-4 py-2"> {{picture.id}}</td>
                                <td class="border px-4 py-2 flex-wrap justify-center"> <img v-for="(img,index) in picture.images" :key="index" :src="img" width="100px" height="100px"></td>
                                <td class="border px-4 py-2"> {{image.id}}</td>
                            </tr>
                        </tbody>
                    </table>
                   <!-- <div class="m-auto">
                        <p v-for="(image,index) in images" :key="index">{{image.name}}</p>
                    </div>-->

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
        <th scope="col">Nombre</th>
        <th scope="col">Detalle</th>
        <th scope="col">Estado</th>
        <th scope="col" colspan="2" class="text-center">Accion</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="mas in mascotas" :key="mas.id">
            
            <th scope="row">{{ mas.id }}</th>
                <td>{{ mas.nombre }}</td>
                <td>{{ mas.detalle }}</td>
                 <td>{{ mas.estado }}</td>
               <!-- <td v-for="picture,index in pictures" :key="index">
                    <img v-for="(img, index) in picture.images" :key="index" :src="img" alt="" width="10px" height="10px">
                </td>-->
                <td>
                    <button  @click="modificar=true; abrirModal(mas);" class="btn btn-warning">Editar</button>
                </td>
                <td>
                    <button @click="eliminar(mas.id)" class="btn btn-danger"  >Eliminar</button>

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
            
            talla:{
                id:'',
                nombre:'',
            },
             tallas:[],
            /*****Imagenes */
            id_image:0,
                images:[],
                pictures:'',
                
            /*****Etapas */
            etapa:{
                id:'',
                nombre:'',
            },
            etapas:[],
            /********RAZAS */
            id_raza:0,
            raza:{
                nombre:'',
                talla_id:null,
                
            },
            razaSeleccionada:null,
            razas:[],
            /*********Mascotas */
            id:0,
            mascota:{
                nombre:'',
                detalle:'',
                estado:false,
                raza_id:null,
                etapa_id:null,

            },
            errores:{},
            modificar:true,
            modal:0,
            tituloModal:'',
            mascotas:[],



        }
    },
    /*-----------METODOS-----*/
    methods: {
        async listar(){
            const res = await axios.get('mascotas');
            this.mascotas=res.data;
            
        },
        async guardar(){
            try {
                if (this.modificar){
                const res = await axios.put('/mascotas/' + this.id, this.mascota)
                }else{
                console.log('raza', this.razaSeleccionada)
                const res = await axios.post('mascotas',this.mascota)
                }
                this.uploadImages();
                this.cerrarModal();
                this.listar();
                
            } catch (error) {
               if (error.response.data){
                   this.errores =error.response.data.errors;
               }
               console.log(error.response.data);
            }   
        },
        async eliminar (id){
           const res = await axios.delete('/mascotas/'+id);
            this.listar();
        },
        /*********RAZAS***/
        async listarTallas(){
           const res = await axios.get('tallas');
            this.tallas=res.data;
        },
        async listarRazas(){
           const res = await axios.get('razas');
            this.razas=res.data;
        },
       
        /*********ETAPAS***/
        async listarEtapas(){
           const res = await axios.get('etapas');
            this.etapas=res.data;
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
            
           try {
               if(this.modificar){
                    formData.append('_method','PATCH');
                    axios.post('mascotas/' + this.id,formData,config) 
                    .then(response =>{
                    self.$refs.files.value = '';
                    self.images = [];
                    console.log('Si se modifico');
                    })
                    .catch(error =>{
                        console.log(error);
                    })
                 }else{
                    axios.post('/mascota/imagenes',formData,config)
                    .then(response =>{
                    self.$refs.files.value = '';
                    self.images = [];
                    self.getImages();
                    });
                }
           } catch (error) {
               if (error.response.data){
                   this.errores = error.response.data.errors;
               }
               console.log(error.response.data);
           }
            
        },
        getImages(){
            axios 
            .get('/mascota/imagenes/')
            .then(response => {
                this.pictures = response.data.images;
            })
            .catch(error=>{

            })
        },

        abrirModal(data={}){
            this.modal = 1;
            if (this.modificar) {
                this.id = data.id;
                this.tituloModal = "Editar Mascota";
                this.mascota.nombre = data.nombre;
                this.mascota.estado = data.estado;
                this.mascota.detalle = data.detalle;
                this.mascota.raza_id = data.raza_id;
                this.mascota.etapa_id = data.etapa_id;
                
              
               
            }else{
                this.id = 0;
                this.tituloModal = 'Registrar Mascota';
                this.mascota.nombre ='' ;
                this.mascota.detalle = '';
                this.mascota.estado = false;
                this.mascota.raza_id = null;
                this.mascota.etapa_id = null;
                
            }

        },
        cerrarModal(){
            this.modal = 0;
            this.errores = {};
        },
    },
    created(){
        this.getImages();
        this.listarTallas();
        this.listarRazas();
        this.listarEtapas();
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