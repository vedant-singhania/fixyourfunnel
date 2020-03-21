<template>
    <div class="container">
        <div id="myBtnContainer">
            <button class="btn btn-secondary active" @click="filterDate"> Date</button>
            <button class="btn btn-secondary" @click="filterName"> Name</button>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('console filter component')
        },
        methods:{
            filterDate(){
                //alert('date');
                axios.get('/posts/getPost', {
                    params: {
                        sortBy: "date"
                    }
                }).then(response => {
                   console.log(document.getElementsByTagName('html')[0].innerHTML);
                   //$('.')
                    document.getElementsByTagName('html')[0].innerHTML = response.data;
                    // $("container").html(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            filterName(){
                //alert('name');
                axios.get('/posts/getPost', {
                    params: {
                        sortBy: "name"
                    }
                }).then(response => {
                    console.log(response.data);
                    //$('.')
                    document.querySelectorAll('html')[0].innerHTML = response.data;
                    //$("container").html(response);
                })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

        }

    }
</script>
