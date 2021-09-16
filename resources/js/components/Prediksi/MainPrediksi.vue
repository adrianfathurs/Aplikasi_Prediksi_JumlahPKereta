<template>
  <div class="col-12 pt-4">
    <div class="card">
      <div class="card-header row">
        <div class="col-10">
          <h3 >Hasil Model TES-Golden Section Search Multi Variable</h3>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Alpha</th>
              <th>Beta</th>
              <th>Gamma</th>
              <th>Nilai MAPE</th>
              
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item,index) in hasilMapeTesGs" :key="index">
              <td>{{++index}}</td>
              <td>{{item.alpha}}</td>
              <td>{{item.beta}}</td>
              <td>{{item.gamma}}</td>
              <td>{{item.hasil}}</td>
              </tr>
            </tbody>
          </table>
          <div>
            <b><h4 style="color:green">Hasil Terbaik:</h4></b> 
            <ul v-for="(items,index) in hasilMapeTesGsTerbaik" :key="index">
              <li>Alpha : {{ items.alpha}}</li>
              <li>Beta :{{ items.beta}}</li>
              <li>Gamma :{{ items.gamma}}</li>
              <li>Nilai MAPE : {{ items.hasil}}</li>
            </ul>
          </div>
        </div>    
    </div>
    <div class="card">
      <div class="card-header row">
        <div class="col-10">
          <h3 >Hasil Model TES-Genetika</h3>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Alpha</th>
              <th>Beta</th>
              <th>Gamma</th>
              <th>Nilai MAPE</th>
              
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item,index) in hasilMapeTesGen" :key="index">
              <td>{{++index}}</td>
              <td>{{item.x}}</td>
              <td>{{item.y}}</td>
              <td>{{item.z}}</td>
              <td>{{item.fitnes}}</td>
              </tr>
            </tbody>
          </table>
          <div>
            <b><h4 style="color:green">Hasil Terbaik:</h4></b> 
            <ul v-for="(items,index) in hasilMapeTesGenTerbaik" :key="index">
              <li>Alpha : {{ items.x}}</li>
              <li>Beta :{{ items.y}}</li>
              <li>Gamma :{{ items.z}}</li>
              <li>Nilai MAPE : {{ items.fitnes}}</li>
            </ul>
          </div>
        </div>    
    </div>
  </div>
</template>
<script>
import {mapGetters} from 'vuex'
export default {
  computed:{
    ...mapGetters({
      jumlahPenumpang:"penumpangKeretaStore/gettersJumlahPenumpang",
      hasilMapeTesGs:"penumpangKeretaStore/gettersHasilMapeTesGs",
      hasilMapeTesGen:"penumpangKeretaStore/gettersHasilMapeTesGen",
      hasilMapeTesGenTerbaik:"penumpangKeretaStore/gettersHasilMapeTesGenTerbaik",
      hasilMapeTesGsTerbaik:"penumpangKeretaStore/gettersHasilMapeTesGsTerbaik",
    })
  },
  mounted() {
    this.$store.dispatch('penumpangKeretaStore/prediksiAction');
    
  },  
}
</script>
