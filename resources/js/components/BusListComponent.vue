<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Bus List
                    </div>
                    <div class="card-body">
                       <table class="table table-bordered">
                           <thead>
                               <tr>
                                    <th>ID</th>
                                    <th>Bus No.</th>
                                    <th>Bus Row</th>
                                    <th>Bus Layout Id</th>
                                    <th>Last Seat Available</th>
                                    <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr v-for="(bus, index) in all_bus" :key="index">
                                   <td>{{ index + 1}}</td>
                                   <td>{{bus.bus_no}}</td>
                                   <td>{{bus.tt_seat_row}}</td>
                                   <td>{{bus.bus_layout_id}}</td>
                                   <td>{{bus.last_seat}}</td>
                                   <td>
                                       <button class="btn btn-sm btn-primary" @click="viewDetail(bus.id)">View Layout</button>
                                   </td>
                               </tr>
                           </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



<style>
    .driver-seat{
       background: rgb(199, 199, 199);
       border: 1px solid gray;
       padding: 10px 10px 10px 10px;
       margin: 5px;
       width: 100%;
   }
   .passenger-seat{
       background: rgb(199, 199, 199);
       width: 100%;
       padding: 7px;
   }

</style>

<script>
    export default {
       
        props: ['all_bus','all_layout'],
        data() {
          return {
               
          }

       

          

      },

      methods: {

          viewDetail(id) {
              window.location.href= 'busSeat/'+id+'/Show';
          },

        
           
      }
     
    }
    
</script>
