<template>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h3>Ingredients</h3>
                <div class="col-6 " id="ingreds">
                    <ul id="list">

                    </ul>
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-warning" @click="convertUnits" v-text="buttonText"></button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['ings'],

        mounted() {
            var obj = JSON.parse(this.ings);
            if(this.status){
                console.log("metric");
                var elem = document.getElementById('list');
                if(elem){
                    elem.innerHTML = "";
                    obj.forEach(function(i){
                        console.log(elem);
                        document.getElementById('#list');
                        const workLiTag = document.createElement("li");
                        var res = i['name'] + ' ' + i['pivot']['quantity'] + 'g';
                        workLiTag.innerHTML = res;
                        document.querySelector("#list").appendChild(workLiTag);
                        console.log(i);
                    })
                }
            }
            console.log('Component mounted.')
        },

        data: function (){
            return {
                status: true
            }
        },

        methods:{
            convertUnits(){
                //alert(this.ings);
                this.status = !this.status;
            }
        },

        computed:{
            buttonText(){
                var obj = JSON.parse(this.ings);
                if(this.status){
                    console.log("metric");
                    var elem = document.getElementById('list');
                    if(elem){
                        elem.innerHTML = "";
                        obj.forEach(function(i){
                            console.log(elem);
                            document.getElementById('#list');
                            const workLiTag = document.createElement("li");
                            var res = i['name'] + ' ' + i['pivot']['quantity'] + 'g';
                            workLiTag.innerHTML = res;
                            document.querySelector("#list").appendChild(workLiTag);
                            console.log(i);
                        })
                    }
                }
                else{
                    var elem = document.getElementById('list');
                    if(elem){
                        elem.innerHTML = "";
                        obj.forEach(function(i){
                            console.log(elem);
                            document.getElementById('#list');
                            const workLiTag = document.createElement("li");
                            var res = i['name'] + ' ' + (i['pivot']['quantity']/28.35).toFixed(2) + 'oz';
                            workLiTag.innerHTML = res;
                            document.querySelector("#list").appendChild(workLiTag);
                            console.log(i);
                        })
                    }
                }
                //console.log(obj);


                return (this.status) ? "Convert to imperial" : "Convert to metric";
            }
        }
    }
</script>
