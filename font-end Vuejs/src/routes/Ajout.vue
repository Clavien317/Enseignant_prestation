<template>
    <div>
        <h1>Ajouter enseignant</h1>
        <hr>
        <br>
        <br>
        <form action="" @submit="Ajoutprof">
           
            <label>Matricule</label> <input type="text" v-model="matricule">
            <br>
            <br>
            <label>Nom</label> <input type="text" v-model="nom">
            <br>
            <br>
            <label>Taux horaire</label> <input type="text" v-model="tauxH">
            <br>
            <br>
            <label>Nombre d'heure</label> <input type="text" v-model="nbH">
            <br>
            <br>
            <br>
            <br>
            <br>
            <button type="submit">Ajouter</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios'
export default
{
 data()
    {
        return{}
    },

methods:
{
    async Ajoutprof(event)
       {
        event.preventDefault();
        
        const enseignant = {
        matricule: this.matricule,
        nom: this.nom,
        tauxH: this.tauxH,
        nbH : this.nbH,
      };

        await axios.post("http://127.0.0.1:8000/api/ajout/ajout_traitement",enseignant,(response)=>
       {
        console.log(response.data);
                    matricule="",
                    nom="",
                    tauxH="",
                    nbH=""
       });

       }
    },
}

</script>

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