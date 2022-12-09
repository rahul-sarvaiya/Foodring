<template>
<div>
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-9">
            <div class="search"> <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder="Search for dishes..." v-model="data" id="s"> <button class="btn btn-primary" @click="searching()">Search</button> </div>
        </div>
    </div>

    <div class="row price justify-content-center align-items-center">
        <div class="col-md-7">
            <span class="fontprice">Price</span>
            <button @click="searchingunder100()" class="btn btn-info">Under &#8377;100</button>
            <button @click="searching100to300()" class="btn btn-info">&#8377;100 - &#8377;300</button>
            <button @click="searching300to500()" class="btn btn-info">&#8377;300 - &#8377;500</button>
            <button @click="searchingover1000()" class="btn btn-info">Over &#8377;1000</button>
            <button @click="getveg()" class="btn btn-success">Veg</button>
        </div>
    </div>
    <br />
    <br />
    <div>

        <restaurant v-if="!searchedDatavisible && !priceunder100visible && !price100to300visible && !price300to500visible && !priceover1000visible && !vegvisible" />
        <searchedPizzaCards v-if="searchedDatavisible" :searchedData="searchedData" />

        <div>
            <div v-if="priceunder100visible">
                <searchedPizzaCards :searchedData="priceunder100" />
            </div>
            <div v-if="price100to300visible">
                <searchedPizzaCards :searchedData="price100to300" />
            </div>
            <div v-if="price300to500visible">
                <searchedPizzaCards :searchedData="price300to500" />
            </div>
            <div v-if="priceover1000visible">
                <searchedPizzaCards :searchedData="priceover1000" />
            </div>
            <div v-if="vegvisible">
                <searchedPizzaCards :searchedData="veg" />
            </div>
        </div>

    </div>

</div>
</template>

<script>
import Button from '../components/Button.vue';
import searchedPizzaCards from '../components/SearchedPizzaCards.vue';
import Restaurant from '../components/restaurants.vue';
import axios from "axios";
export default {
    name: "app",
    data() {
        return {
            searchedData: [],
            data: "",
            priceunder100: [],
            price100to300: [],
            price300to500: [],
            priceover1000: [],
            veg: [],
            priceunder100visible: false,
            price100to300visible: false,
            price300to500visible: false,
            priceover1000visible: false,
            searchedDatavisible: false,
            vegvisible: false,
        }
    },
    components: {
        Button,
        searchedPizzaCards,
        Restaurant,
    },
    methods: {
        async searching() {
            if (this.data) {
                let url = `http://127.0.0.1:8000/api/searchproduct/${this.data}`;
                let result = await axios.get(url);
                this.searchedData = result.data;
                this.searchedDatavisible = true;
                this.priceunder100visible = false;
                this.price100to300visible = false;
                this.price300to500visible = false;
                this.priceover1000visible = false;
                this.vegvisible = false;

            } else {
                this.searchedData = [];
                this.searchedDatavisible = false;
                this.priceunder100visible = false;
                this.price100to300visible = false;
                this.price300to500visible = false;
                this.priceover1000visible = false;
                this.vegvisible = false;
            }

        },
        async searchingunder100() {
            this.searchedDatavisible = -false;
            this.priceunder100visible = true;
            this.price100to300visible = false;
            this.price300to500visible = false;
            this.priceover1000visible = false;
            this.vegvisible = false;
            let url = `http://127.0.0.1:8000/api/searchproductless100/${this.data}`;
            let result = await axios.get(url);
            this.priceunder100 = result.data;
        },
        async searching100to300() {
            this.searchedDatavisible = -false;
            this.priceunder100visible = false;
            this.price100to300visible = true;
            this.price300to500visible = false;
            this.priceover1000visible = false;
            this.vegvisible = false;
            let url = `http://127.0.0.1:8000/api/searchproduct100to300/${this.data}`;
            let result = await axios.get(url);
            this.price100to300 = result.data;
        },
        async searching300to500() {
            this.searchedDatavisible = -false;
            this.priceunder100visible = false;
            this.price100to300visible = false;
            this.price300to500visible = true;
            this.priceover1000visible = false;
            this.vegvisible = false;
            let url = `http://127.0.0.1:8000/api/searchproduct300to500/${this.data}`;
            let result = await axios.get(url);
            this.price300to500 = result.data;
        },
        async searchingover1000() {
            this.searchedDatavisible = false;
            this.priceunder100visible = false;
            this.price100to300visible = false;
            this.price300to500visible = false;
            this.priceover1000visible = true;
            this.vegvisible = false;
            let url = `http://127.0.0.1:8000/api/searchproductover1000/${this.data}`;
            let result = await axios.get(url);
            this.priceover1000 = result.data;
        },
        async getveg() {
            this.searchedDatavisible = false;
            this.priceunder100visible = false;
            this.price100to300visible = false;
            this.price300to500visible = false;
            this.priceover1000visible = false;
            this.vegvisible = true;
            let url = `http://127.0.0.1:8000/api/searchproductveg/${this.data}`;
            let result = await axios.get(url);
            this.veg = result.data;
        }

    }
};
</script>

<style>
.search {
    position: relative;
    box-shadow: 0 0 40px rgba(51, 51, 51, .1)
}

.search input {
    height: 50px;
    text-indent: 25px;
    border: 2px solid #d6d4d4
}

.search input:focus {
    box-shadow: none;
    border: 2px solid rgb(122, 158, 159)
}

.search .fa-search {
    position: absolute;
    top: 20px;
    left: 16px;
}

.search button {
    position: absolute;
    top: 5px;
    right: 5px;
    height: 40px;
    width: 110px;
}

.price {
    margin-top: 20px;
}

.fontprice {
    font-size: 20px;
    color: black;
}

.price button {
    margin-left: 10px;
}
</style>
