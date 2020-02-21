<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                       Bus Name
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <label>Bus No.</label>
                                <input type="text" class="form-control" v-model="bus.b_no">
                            </div>
                            <div class="row">
                                <label for="">Bus Type</label>
                                <select v-model="bus.b_type" class="custom-select">
                                    <option v-for="b_type in bus_types" :key="b_type.index" v-bind:value="b_type.id">
                                        {{ b_type.name }} 
                                    </option>
                                </select>
                            </div>
                            <div class="row">
                                <label for="">Bus Layout</label>
                                <select v-model="bus.b_layout_id" class="custom-select">
                                    <option v-for="b_layout in bus_layouts" :key="b_layout.index" v-bind:value="b_layout.id">
                                        {{ b_layout.bus_layout_name }} 
                                    </option>
                                </select>
                            </div>
                            <div class="row">
                                <label for="">Total Seat Row</label>
                                <input type="number" id="" class="form-control" v-model="bus.b_row">
                            </div>
                            <div class="row">
                                <label for="">Seat At Last Line</label>
                            </div>
                            <div class="row">
                                <input type="checkbox" id="" v-model="bus.b_last_seat" value="1">
                            </div>
                            <div class="row mt-4">
                            <button class="btn btn-md btn-primary" @click="addBus()">Generate</button> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>   
        </div>
    </div>
</template>


<script>
    export default {
       
        props: ['bus_types','bus_layouts'],
        data() {
          return {
                bus:{
                  b_no:'',
                  b_type:'',
                  b_row:'',
                  b_layout_id:'',
                  b_last_seat:''
                },
                
                bus_id:''

          }
      },
      methods: {

        addBus() {
           //console.log(this.bus);

           axios.post('busRegister', {bus_seat_ary: this.bus}).then (resp => {
               if(resp.data != '') {
                   this.bus_id= resp.data;
                //    console.log(this.bus_id);
                   
                    window.location.href = 'busSeat/'+this.bus_id+'/Entry';
               }
           })

        }
       
    }
}
</script>
