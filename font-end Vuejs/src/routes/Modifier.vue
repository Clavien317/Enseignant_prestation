<template>
    <div>
        <h1>Modifier enseignant</h1>
        <hr>
        <br>
        <br>
        <br>

        <form action="">
            <input type="text" v-model="prof.id" style="display: none;">
            <label for="">Matricule</label>
            <input type="text" v-model="prof.matricule">
            <br>
            <label for="">Nom</label>
            <input type="text" v-model="prof.nom">
            <br>
            <label for="">Taux horaire</label>
            <input type="text" v-model="prof.tauxH">
            <br>
            <label for="">Nombre d'h</label>
            <input type="text" v-model="prof.nbH">
            <br>
            <br>
            <br>
            <button @click="modifier">Modifier</button>
            <br>
            <br>
            <br>
        </form>
    </div>
</template>

<script>
import axios from 'axios'

export default{
    data()
    {
        return{
            prof:{
                matricule:"",
                nom:"",
                tauxH:"",
                nbH:""
            }
        }
    },
    mounted()
    {
        // console.log(this.$route.params.id);
        this.getProfs(this.$route.params.id)
    },
    methods:
    {
        getProfs(id){
            axios.get(`http://localhost:8000/api/modifier/${id}`).then(res=>
            {
                console.log(res.data);
                this.prof=res.data
            });
        },
       modifier(e)
        {
            // alert(this.prof);
            e.preventDefault()
            // console.log("qwerty");
            axios.post(`http://localhost:8000/api/modifier/modifier_traitement`,this.prof).then(res=>
            {
                // console.log("HELLO");
                console.log(res.data);

                this.prof={
                    matricule:"",
                    nom:"",
                    tauxH:"",
                    nbH:""
                }
            })
        }
    }
}
</script>

<style lang="css" scoped>
input
{
    width: 30%;
    height: 2vw;
    /*display: inline-block;*/
    margin-bottom: 1.5vw;
}

label
{
    min-width: 150px;
    display: inline-block;
    font-size: 20px;
    font-weight: bold;
}

button
{
    width: 20%;
    height: 2vw;
    background-color:  rgb(8, 63, 5);
    color: white;
    border: 0;
    margin-left: 4vw;
}
</style>