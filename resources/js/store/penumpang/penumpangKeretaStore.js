import * as penumpangService from '../../services/penumpang/penumpangKeretaServices'
import * as PerhitunganTesGs from '../../Perhitungan/TesGS.js'
import * as PerhitunganTesGen from '../../Perhitungan/TesGen.js'
export default ({
  namespaced:true,
  state:{
    dataPenumpang:[],
    jumlahPenumpangTesGs:[],
    jumlahPenumpangTesGen:[],
    hasilMapeTesGs:[],
    hasilMapeTesGen:[],
    hasilMapeTesGenTerbaik:[],
    hasilMapeTesGsTerbaik:[],
  },
  mutations:{
    importDataPenumpang(state,payload){
      state.dataPenumpang=payload
    },
    updateDatapenumpang(state,payload){
      let update=state.dataPenumpang.filter(item => item.id !=payload);
      state.dataPenumpang=update;
    },
    async TesGs(state,payload){
      state.dataPenumpang=payload;
      for (let index = 0; index < payload.length; index++) {
        state.jumlahPenumpangTesGs.push(payload[index].Jumlah_Penumpang);
        
      }
      let hasil=await PerhitunganTesGs.hitung(state.jumlahPenumpangTesGs);
      for (let index = 0; index < hasil.length; index++) {
        if(index<hasil.length-1){
          state.hasilMapeTesGs.push(hasil[index]);
        }else{
          state.hasilMapeTesGsTerbaik.push(hasil[index]);
          console.log(state.hasilMapeTesGsTerbaik,"index",index);
        }
      }
    },
    async TesGen(state,payload){
      state.dataPenumpang=payload;
      for (let index = 0; index < payload.length; index++) {
        state.jumlahPenumpangTesGen.push(payload[index].Jumlah_Penumpang);
        
      }
      let hasil=await PerhitunganTesGen.hitung(state.jumlahPenumpangTesGen);
      let panjang=0;
      for (let index = 0; index < hasil.length; index++) {
        if(index<hasil.length-1){
          state.hasilMapeTesGen.push(hasil[index]);
        }else{
          state.hasilMapeTesGenTerbaik.push(hasil[index]);
          console.log(state.hasilMapeTesGenTerbaik,"index",index);
        }
        panjang++;
      }
    },

  },
  getters:{
    gettersDataPenumpang(state){
      return state.dataPenumpang;
    },
    gettersJumlahPenumpang(state){
      console.log("inigetters jumlah Penumpang",state.jumlahPenumpangTesGs);
      return state.jumlahPenumpangTesGs;
    },
    gettersHasilMapeTesGs(state){
      console.log("HasilMapeTesGs",state.hasilMapeTesGs);
      return state.hasilMapeTesGs;
    },
    gettersHasilMapeTesGsTerbaik(state){
      console.log("HasilMapeTesGenTerbaik",state.hasilMapeTesGsTerbaik);
      return state.hasilMapeTesGsTerbaik;
    },
    gettersHasilMapeTesGen(state){
      console.log("HasilMapeTesGen",state.hasilMapeTesGen);
      return state.hasilMapeTesGen;
    },
    gettersHasilMapeTesGenTerbaik(state){
      console.log("HasilMapeTesGenTerbaik",state.hasilMapeTesGenTerbaik);
      return state.hasilMapeTesGenTerbaik;
    },
  },
  actions:{
    async prediksiAction(context){
      let result=await penumpangService.getPenumpangKereta();
      context.commit("TesGs",result);
      context.commit("TesGen",result);
    },
    async getDataPenumpangAction(context){
      let result=await penumpangService.getPenumpangKereta();
      console.log(result,context);
      console.log("sampai sini")
      context.commit('importDataPenumpang',result);
    },
    async addData(context,payload){
      let result = await penumpangService.addPenumpangKereta(payload);
      console.log(result,context);
    },
    async deleteAction(context,payload){
      let result = await penumpangService.deletePenumpangKereta(payload);
      context.commit("updateDatapenumpang",payload)
      console.log(result,context);
    },
    async updateData(context,payload){
      let result = await penumpangService.updatePenumpangKereta(payload);
      console.log(result,context);
    },
  
  }
})