<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                 
                <div class="alert alert-success alert-block" v-if="show == true">
                    <strong>{{ message }}</strong>
                </div>

                <div class="card">
                    <div class="card-header bg-primary text-white">
                       Bus Layout Name
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="name">Layout  Name</label>
                                <input type="text" id="name" class="form-control" v-model="bus_layout.layout_name" placeholder="1+1">
                            </div>
                            <div class="row">
                                <label>Layout Column</label>
                                <input type="text" class="form-control" v-model="bus_layout.layout_col" placeholder="3">
                            </div>
                            <div class="row mt-4">
                            <button class="btn btn-md btn-primary" @click="addBusLayoutName()">Save</button> 
                            </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                       Bus Layout List
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Bus Layout Name</th>
                                    <th>Bus Layout Col</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(layout_list, index) in layout_lists" :key="index">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ layout_list.bus_layout_name }}</td>
                                     <td>{{ layout_list.bus_layout_col }}</td>
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
                bus_layout:{
                  layout_name: '',
                  layout_col: ''
                
              },

              layout_lists:[],
              message:'New Bus layout added successfully',
              show:'false',
          
          }
      },
      methods: {
        addBusLayoutName() {
            axios.post('busLayout', this.bus_layout).then( resp => {
                if( resp.data.success == true){
                   this.layout_lists= resp.data.all_layout;
                   this.show= true;
                    setTimeout(()=>{
                       this.show= false
                   }, 3000)
                this.clear();
                }
            });
        },
        clear() {
            this.bus_layout.layout_name='';
            this.bus_layout.layout_col='';

        },

        getLayoutList() {
            axios.get('/showAllLayout').then(res => {
                this.layout_lists = res.data;
                //console.log(res.data);  
            });
        }
          
      },

      mounted() {
          this.getLayoutList();
      }
    }
</script>
