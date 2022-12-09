<template>
<!-- <div class="col-md-3">
        <div class="card" v-for="item in dominos" :key="item.do_id">
            {{item.offers}} 
            <h5 class="card-text mb-2 text-muted"><b>{{item.restaurant_name}}</b></h5>
        </div>
    </div> -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card"  v-for="item in dominos" :key="item.do_id">
                <div class="card-data">
                <i class="ti-gift"></i>
                {{item.offers}}
                </div>
                <div class="card-name">
                <h5 class="card-text mb-2 text-muted"><b>{{item.restaurant_name}}</b></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" v-for="item in pizzahut" :key="item.po_id">
                <div class="card-data">
                <i class="ti-gift"></i>
                {{item.offers}}
                </div>
                <div class="card-name">
                <h5 class="card-text mb-2 text-muted"><b>{{item.restaurant_name}}</b></h5>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="card" v-for="item in ovenstory" :key="item.oo_id">
                <div class="card-data">
                <i class="ti-gift"></i>
                {{item.offers}}
                </div>
                <div class="card-name">
                <h5 class="card-text mb-2 text-muted"><b>{{item.restaurant_name}}</b></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" v-for="item in lapinos" :key="item.lo_id">
                <div class="card-data">
                <i class="ti-gift"></i>
                {{item.offers}}
                </div>
                <div class="card-name">
                <h5 class="card-text mb-2 text-muted"><b>{{item.restaurant_name}}</b></h5>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import axios from "axios";
export default {
    name: "Offers",
    data() {
        return {
            dominos: [],
            pizzahut: [],
            ovenstory: [],
            lapinos: []
        }
    },
    async mounted() {
        let result = await axios.get("http://127.0.0.1:8000/api/getdominospizzasoffers");
        this.dominos = result.data;
        let result2 = await axios.get("http://127.0.0.1:8000/api/getpizzahutpizzasoffers");
        this.pizzahut = result2.data;
        let result3 = await axios.get("http://127.0.0.1:8000/api/getovenstorypizzasoffers");
        this.ovenstory = result3.data;
        let result4 = await axios.get("http://127.0.0.1:8000/api/getlapinospizzasoffers");
        this.lapinos = result4.data;
    }

};
</script>

<style scoped>

.card{
  height:150px;
}
.card-data{
  background-color: #333749 ;
  color: white;
  padding: 20px;
  height:120px;

}
.card h5 {
    margin-top: 10px;
    text-align: center;
}
</style>
