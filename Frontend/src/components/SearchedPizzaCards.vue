<template>
<div>
    <div class="row notfound justify-content-center align-items-center" v-if="searchedData==='Result not found'">
        Result not found ...
    </div>
    <div v-else class="container">
        <div class="row" v-for="(item, index) in searchedData" :key="item" :index="index">
            <div class="col-md-3" v-for="item2 in searchedData[index]" :key="item2" >
                    <div class="card">
                        <img class="card-img-top" :src="item2.product_image" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{item2.product_name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">&#8377; {{item2.product_price}}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{item2.restaurant_name}}</h6>
                            <h6 class="card-text">It is {{item2.types}}</h6>
                            <a :href="item2.link" class="btn btn-info">checkout &nbsp; →</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>
export default {
    name: "searchedPizzaCards",
    props: {
        searchedData: Object
    }

}
</script>

<style scoped>
.card-img-top {
    height: 150px;
}

.cards {
    display: flex;
    flex-wrap: nowrap;
}

.notfound{
    font-size: 25px;
}

.btn{
    margin-top: 15px;
    margin-left: 95px;
    height: 40px;
    background-color: rgb(0,123,255);
}

.btn:hover{
    background-color:#007BEB;
    border-color: #007bff;
}
</style>
