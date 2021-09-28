<template>
    <div>
        <h1 class="text-center">Padrinos de viaje</h1>
        <hr>

    <!-- Trigger the modal with a button -->
    <button @click="modificar=false; abrirModal()" type="button" class="btn btn-success btn-lg" >Registrar Padrinos</button>

    <!-- Modal -->
    <div  class="modal" :class="{mostrar:modal}">
        <div class="col-8 modal-dialog  modal-dialog-scrollable">

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
                        <input v-model="padrino.nombre" id="nombre" placeholder="Nombre" type="text" class="form-control" >
                    </div>
                    <div>
                        <label for="apellido">Apellido</label>
                        <input v-model="padrino.apellido" id="apellido" placeholder="Apellido" type="text" class="form-control" >
                    </div>
                    <div>
                        <label for="origen">Origen</label>
                        <input v-model="padrino.origen" id="origen" placeholder="Origen" type="text" class="form-control" >
                    </div>
                    <div>
                        <label for="destino">Destino</label>
                        <input v-model="padrino.destino" id="destino" placeholder="Destino" type="text" class="form-control" >
                    </div>
                    <div>
                        <label for="fecha">Fecha</label>
                        <input v-model="padrino.fecha" id="fecha" placeholder="fecha" type="date" class="form-control" >
                    </div>
                    <div>
                        <label for="telefono">Telefono</label>
                        <input v-model="padrino.telefono" id="telefono" placeholder="Telefono" type="text" class="form-control" >
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
        <th scope="col">Apellido</th>
        <th scope="col">Origen</th>
        <th scope="col">Destino</th>
        <th scope="col">Fecha</th>
        <th scope="col">Telefono</th>
        <th scope="col" colspan="2" class="text-center">Accion</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="den in padrinos" :key="den.id">
        <th scope="row">{{ den.id }}</th>
        <td>{{ den.nombre }}</td>
        <td>{{ den.apellido }}</td>
        <td>{{ den.origen }}</td>
        <td>{{ den.destino }}</td>
        <td>{{ den.fecha }}</td>
         <td>{{ den.telefono }}</td>
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
            padrino:{
                nombre:'',
                origen:'',
                destino:'',
                fecha:'',
                telefono:'',
            },
            denunciaSeleccionada:null,
            modificar:true,
            modal:0,
            tituloModal:'',
            padrinos:[],



        }
    },
    methods: {
        
        async listar(){
           const res = await axios.get('padrinos');
            this.padrinos=res.data;
        },
       async guardar(){
            if (this.modificar){
                const res = await axios.put('/padrinos/' + this.id, this.padrino)

                
            }else{
               
                const res = await axios.post('padrinos/',this.padrino)
                            
            }
           // this.uploadImages();
            this.cerrarModal();
            this.listar();
            
        },
        async eliminar (id){
           const res = await axios.delete('padrinos/'+ id);
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
                this.tituloModal = "Editar Padrino";
                this.padrino.nombre = data.nombre;
                this.padrino.apellido = data.apellido;
                this.padrino.origen = data.origen;
                this.padrino.destino = data.destino;
                this.padrino.fecha = data.fecha;
                 this.padrino.telefono = data.telefono;
               
                
            }else{
                this.id = 0;
                this.tituloModal = 'Registrar Padrino';
                this.padrino.nombre = '';
                this.padrino.apellido = '';
                this.padrino.origen = '';
                this.padrino.destino = '';
                this.padrino.fecha = '';
                this.padrino.telefono = '';
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
                axios.post('padrinos/' + this.id,formData,config) 
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