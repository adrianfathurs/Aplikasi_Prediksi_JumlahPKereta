<template>
  <div class="col-md-12 mt-3">
    <div class="card">
      <div class="card-header"><h2><b>Triple Exponential Smoothing</b></h2></div>
        <form id="quickForm">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="alpha">Nilai Alpha</label>
                  <input type="number" name="alpha" required class="form-control" id="alpha" placeholder="Enter Alpha Value" v-model="alpha">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="beta">Nilai Beta</label>
                  <input type="number" name="beta" required class="form-control" id="beta" placeholder="Enter Beta Value" v-model="beta">
                </div> 
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="gamma">Nilai Gamma</label>
                  <input type="number" name="gamma" required class="form-control" id="gamma" placeholder="Enter Gamma Value" v-model="gamma">
                </div>    
              </div>   
            </div>
            <div class="row">
              <div class="col ml-2">
                <div class="form-group">
                  <label for="periodePrediksi">Periode Prediksi (m)</label>
                  <input type="number" name="periodePrediksi" required class="form-control" id="periodePrediksi" placeholder="Enter Periode Forecasting Value" v-model="periodePrediksi">
                </div>
              </div>
            </div>
          </div>
        </form>
          <div class="card-footer">
            <button  @click="hitung()" v-show="execute" class="btn btn-success">Hitung</button>
            <button  @click="reset()" v-show="!execute" class="btn btn-primary">Reset</button>
          </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header" style="display:flex">
              <h2><b>Grafik</b></h2>
              <div style="marginLeft:65vw">
                <button class="btn btn-primary" v-show="!executeGrafik" @click="tampilkanGrafik()">Tampilkan Grafik</button>
                <button class="btn btn-warning" v-show="executeGrafik" @click="tampilkanGrafik()">Tutup Grafik</button>
              </div>
              </div>
              <div class="card-body" style="clear:both">
                <Grafik v-show="executeGrafik" :periodePred="periodePrediksi" ></Grafik>
              </div>
          </div>
        </div>
      </div>  
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header"><h2><b>Hasil</b></h2></div>
              <div class="card-body">
                {{dataParameter[0]}}
                {{dataParameter[1]}}
                {{dataParameter[2]}}
                {{dataParameter[3]}}
              </div>
          </div>
        </div>
      </div>  
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header"><h2><b>Dataset Sistem (Training Data)</b></h2></div>
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Data Jumlah Penumpang</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item,index) in dataActual" :key="index">
                    <td>{{++index}}</td>
                    <td>{{item}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
       
        <div class="col">
          <div class="card">
            <div class="card-header"><h2><b>Data Berasal dari Badan Pusat Statistika ( Tahun 2011 - Tahun 2021/(Bulan Mei) )</b></h2></div>
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Data Jumlah Penumpang</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item,index) in dataPenumpangBPS" :key="index">
                    <td>{{++index}}</td>
                    <td>{{item}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
      </div>
       <div class="col">
          <div class="card">
            <div class="card-header"><h2><b>Data Prediksi</b></h2></div>
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Data Jumlah Penumpang</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item,index) in dataPrediksi" :key="index">
                    <td>{{++index}}</td>
                    <td>{{item}}</td>
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
import {mapGetters} from 'vuex'
import Grafik from './Grafik'
export default {
  data() {
    return {
      alpha:null,
      beta:null,
      gamma:null,
      periodePrediksi:null,
      execute:true,
      executeGrafik:false,
    }
  },
  components:{
    Grafik
  },
  computed:{
    ...mapGetters({
      dataPrediksi:'penumpangKeretaStore/gettersHasilDataPrediksi',
      dataActual:'penumpangKeretaStore/gettersHasilDataActual',
      dataParameter:'penumpangKeretaStore/gettersHasilDataParameter',
      dataPenumpangBPS:'penumpangKeretaStore/gettersDataPenumpangBPS'
    })
  },
  methods: {
    hitung(){
      this.execute=true;
      var obj={
        alpha:this.alpha,
        beta:this.beta,
        gamma:this.gamma,
        periodePrediksi:this.periodePrediksi
      }
      this.$store.dispatch("penumpangKeretaStore/prediksiAction",obj);
      this.execute=false;
    },
    tampilkanGrafik(){
      this.executeGrafik=!this.executeGrafik;
    },
    reset(){
      window.location.reload()
    }
  },
  mounted() {
  },
}
</script>