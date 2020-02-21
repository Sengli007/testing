<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="alert alert-success alert-block" v-if="show == true">
                    <strong>{{ message }}</strong>
                </div>
              
                <div class="card">
                    <div class="card-header bg-primary text-white">
                       Bus Type Name
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" v-model="type_name.name" placeholder="VIP">
                            </div>
                            <div class="row mt-4">
                            <button class="btn btn-md btn-primary" @click="addBusTypeName()">Save</button> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                       Bus Type List
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(bus_list, index) in bus_lists" :key="index">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ bus_list.name }}</td>
                                </tr> 
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
      data() {
          return {
                type_name:{
                  name: ''
              },
              message:'New Bus type added successfully',
              show:'false',
              bus_lists:[]
          
          }
      },
      methods: {
        addBusTypeName() {
           
            axios.post('busType', this.type_name).then( resp => {
                if( resp.data.success == true ){
                   this.bus_lists= resp.data.all_bus;
                   this.show= true;
                   //colsole.log(this.bus_list);
                   setTimeout(()=>{
                       this.show= false
                   }, 3000)
                }

                this.clear();
            });
            
        },
        
        getBusList(){
            axios.get('/showAllBusType').then(res => {
                this.bus_lists = res.data;
                //console.log(res.data);  
            });
        },

        clear() {
            this.type_name.name='';
        }
          
      },

      mounted() {
          this.getBusList();
      }
    }
</script>
