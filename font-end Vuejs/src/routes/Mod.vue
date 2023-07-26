<script>
import axios from 'axios'
export default
{
    name:"Modifier",
    data() {
  return {
    model:{
        enseignants:{
            matricule:null,
            nom:null,
            tauxH:null,
            nbH:null
        }
    }
  }
},
    mounted()
    {
        // console.log(this.$route.params.id);
        this.getProfs(this.$route.params.id);

    },

methods:
{
async getProfs(id)
    {
       await axios.get(`http://localhost:8000/api/modifier/${id}`).then(response=>
        {
            console.log(response.data.enseignant); 
            this.model.enseignants = response.data.enseignant
        })
    },
    async Modifprof(event)
    {
        event.preventDefault()
        // const enseignant = {
        //     matricule: this.model.enseignants.matricule,
        //     nom: this.model.enseignants.nom,
        //     tauxH: this.model.enseignants.tauxH,
        //     nbH: this.model.enseignants.nbH,
        // };

        await axios.put(`http://localhost:8000/api/modifier/modifier_traitement`, this.model.enseignants)
        .then(response => {
            console.log(response.data);
            // this.$route.push("/liste")

            this.model.enseignants={
                matricule:"",
                nom:"",
                tauxH:"",
                nbH:""
            }
        })
    }
    },
}

</script>

<template>
    <div>
        <h1>Ajouter enseignant</h1>
        <hr>
        <br>
        <br>
        <form action="" @submit="Modifprof">
           
            <label>Matricule</label> <input type="text" :name="matricule" v-model="model.enseignants.matricule">
            <br>
            <br>
            <label>Nom</label> <input type="text" :name="nom" v-model="model.enseignants.nom">
            <br>
            <br>
            <label>Taux horaire</label> <input type="text" :name="tauxH" v-model="model.enseignants.tauxH">
            <br>
            <br>
            <label>Nombre d'heure</label> <input type="text" :name="nbH" v-model="model.enseignants.nbH">
            <br>
            <br>
            <br>
            <br>
            <br>
            <button type="submit" @click="Modifprof()">Modifier</button>
        </form>
    </div>
</template>



<style lang="css" scoped>
input,select
{
    width: 30%;
    height: 2vw;
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
    margin-left: 2vw;
}

.err
{
    /*background-color: red;
    color: white;*/
    color: red;
    width: 50%;
    margin-left: 25%;
}
</style>