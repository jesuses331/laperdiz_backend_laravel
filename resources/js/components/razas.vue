<template>
    <div>
        <h1 class="text-center">Gestionar Razas</h1>
        <hr>

    <!-- Trigger the modal with a button -->
    <button @click="modificar=false; abrirModal()" type="button" class="btn btn-success btn-lg" >Registrar Razas</button>

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
                        <label for="nombre">Nombre</label>
                        <input v-model="raza.nombre" id="nombre" placeholder="Nombre" type="text" class="form-control" >
                    </div>
                    <div >
                       <label for="tallas">Talla</label>
                        <select v-model="raza.talla_id"  id="tallas" class="form-control">
                            <option value="null">Seleccione una talla</option>
                           <option v-for="talla in tallas" :key="talla.id" v-bind:value="talla.id">{{talla.nombre}}</option>
                        </select>
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
        <th scope="col">Nombre</th>
        
        <th scope="col" colspan="2" class="text-center">Accion</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="raza in razas" :key="raza.id">
        <th scope="row">{{ raza.id }}</th>
        <td>{{ raza.nombre }}</td>
        
        <td>
            <button  @click="modificar=true; abrirModal(raza)" class="btn btn-warning">Editar</button>
            
        </td>
        <td>
            <button @click="eliminar(raza.id)" class="btn btn-danger">Eliminar</button>

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
           
            /*********Mascotas */
            id:0,
            raza:{
                nombre:'',
                talla_id:null
            },
            denunciaSeleccionada:null,
            modificar:true,
            modal:0,
            tituloModal:'',
            razas:[],



        }
    },
    methods: {
        
        async listar(){
           const res = await axios.get('razas');
            this.razas=res.data;
        },
         async listarTallas(){
           const res = await axios.get('tallas');
            this.tallas=res.data;
        },
       async guardar(){
            if (this.modificar){
                const res = await axios.put('razas/' + this.id, this.raza)
                
                
            }else{
               
                const res = await axios.post('razas',this.raza)
                            
            }
           // this.uploadImages();
            this.cerrarModal();
            this.listar();
            
        },
        async eliminar (id){
           const res = await axios.delete('razas/'+ id);
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
                this.tituloModal = "Editar Raza";
                this.raza.nombre = 'jesus';
                this.raza.talla_id = data.talla_id;
               
               
                
            }else{
                this.id = 0;
                this.tituloModal = 'Registrar Razas';
                this.raza.nombre = '';
                this.raza.talla_id = null;
                
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
                axios.post('razas/' + this.id,formData,config) 
                .then(response =>{
                self.$refs.files.value = '';
                self.images = [];
                console.log('Si se modifico');
                })
                .catch(error =>{
                    console.log(error);
                })
            }else{
            axios.post('/padrinos/imagenes/',formData,config )
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
        this.listarTallas();
       
       
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