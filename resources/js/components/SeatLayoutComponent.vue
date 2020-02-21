
<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-7 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Seat No Entry
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
                                          <input type="text" style="text-align: center" v-if="col != hide_col || last_seat == row" class="passenger-seat" v-model="tables[row-1][col-1].seat">
                                      </td>
                                  </tr>

                               </tbody>
                            </table>

                            <button class="btn btn-primary" @click="save()">Save</button>
                           
                        </div>
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
   data(){
       return {
           seat_ary:[],
            seat_rows:6,
           seat_cols:5,   
           layout_name: '2+1',
           hide_col: '',
            tables: [],
            last_seat_available: true,
            last_seat: ''
        }
   },
   methods:{

    //    setModel(row,col) {
    //        return this.tables[row][col];
    //    },

        save() {
           console.log(this.tables);
           axios.post('busSeat', {bus_seat_ary: this.tables}).then (resp => {
               if(resp.data == 'success') {
                   console.log('bus seat save succefully');
               }
           })

       },

        addBus() {
            //console.log(this.bus);
            axios.post('bus', this.bus).then( resp => {
                if( resp.data == 'success'){
                    console.log('success');
                   
                }
            });
        }
       

    },

    mounted() {

        if(this.layout_name == '1+2') {
            this.hide_col = 2;
        }else if(this.layout_name == '2+1' || this.layout_name == '2+2') {
            this.hide_col = 3;
        }

        if(this.last_seat_available == true) {
            this.last_seat = this.seat_rows;
        }


        for(var i=0; i<this.seat_rows;i++){
            var cols_arr = [];
            
            for(var j=0; j<this.seat_cols; j++) {

                var data = {
                    row: i,
                    col: j,
                    seat: ''
                };

               cols_arr.push(data);
            }
            this.tables.push(cols_arr);

        }

        console.log(this.tables);
    }


}

</script>