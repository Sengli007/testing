
<template>
    <div class="container">
        <div class="row">
            <div class="card bg-primary text-white col-lg-12 mb-5">
                <div class="card-body">
                    <h4> Bus Info and Bus Seat Layout</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card" style="width: 18rem;">
                    <div class="card-header bg-primary text-white">
                       Bus Info
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Bus Name:</b>{{ bus_seat_entry.bus_no }}</li>
                        <li class="list-group-item"><b>Bus Type:</b>{{ bus_seat_entry.bus_type_id }}</li>
                        <li class="list-group-item"><b>Bus Total Row:</b>{{ bus_seat_entry.tt_seat_row }}</li>
                        <li class="list-group-item"><b>Bus Total Col:</b>{{ bus_layout.bus_layout_col }} / {{ bus_layout.bus_layout_name }}</li>
                        <li class="list-group-item"><b>Last Row Seat Availbility:</b>{{ bus_seat_entry.last_seat }}</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Bus Seat Layout
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="text text-white driver-seat">
                                Driver 
                            </div>
                            <table class="table table">
                               <tbody>
                                  <tr v-for="(row, rowindex) in seat_rows" :key="rowindex">
                                      <td v-for="(col, colindex) in seat_cols" :key="colindex">
                                          <input type="text" style="text-align: center" v-if="col != hide_col || last_seat == row" class="passenger-seat" v-model="tables[row-1][col-1].seat" readonly>
                                      </td>
                                  </tr>

                               </tbody>
                            </table>

                           
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
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
   props: ['bus_seat_entry','bus_layout','bus_seat'],
   data(){
       return {
          seat_ary:[],
           seat_rows:'',
           seat_cols:'',   
           layout_name:'',
           hide_col: '',
            tables: [],
            last_seat_available: '',
            last_seat: '',
            bus_id:''
        }
   },
   methods:{

   
    },


    mounted() {
        // this.seat_ary= this.bus_seat;
        this.seat_rows= this.bus_seat_entry.tt_seat_row;
        this.seat_cols= this.bus_layout.bus_layout_col;
        this.layout_name= this.bus_layout.bus_layout_name;
        this.last_seat_available= this.bus_seat_entry.last_seat;


        if(this.layout_name == '1+1' || this.layout_name == '1+2') {
            this.hide_col = 2;
        }else if(this.layout_name == '2+1' || this.layout_name == '2+2') {
            this.hide_col = 3;
        }

        if(this.last_seat_available == true) {
            this.last_seat = this.seat_rows;
        }

        var count = 0;
        for(var i=0; i<this.seat_rows;i++){
            var cols_arr = [];
            
            for(var j=0; j<this.seat_cols; j++) {
                
                var seat_no= [];
                var data = {
                    row: i,
                    col: j,
                    seat: this.bus_seat[count].seat_no
                };
                count++;

               cols_arr.push(data);
            }
            this.tables.push(cols_arr);

        }

        console.log(this.tables);
    }


}

</script>