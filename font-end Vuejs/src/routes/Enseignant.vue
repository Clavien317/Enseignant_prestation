<script>
import axios from 'axios'

export default
{
 data()
    {
        return{
            profs: Array,
            minPrest:null,
            maxPrest:null,
            somme:null,
            img: "src/assets/delete.png",
            modif:"src/assets/update.png",
            add:"src/assets/plus_math_50px.png"
        }
    },

  mounted(){
        console.log("Enseignant liste est montee");
        this.getMinPrestation();
        this.getMaxPrestation();
        this.getSomme()
    },
    created()
    {
        this.getProfs();
    },

methods:
{
    supprimer() {
            confirm("voulez-vous supprimer vraiment...");
            // Récupération de l'ID de l'élément à supprimer depuis l'URL
            const elementId = this.$route.params.id;
            // Envoi de la requête DELETE vers le serveur
            axios.get(`http://localhost:8000/api/supprimer/${elementId}`, (response => {
                // Succès : l'élément a été supprimé de la base de données
                console.log(response.data);
            }));
            this.getProfs();

        },
    async getProfs() {
  try {
    const response = await axios.get("http://localhost:8000/api/api/listeProf");
    if (response.data.profs) {
      this.profs = response.data.profs;
      console.log(this.profs);
    }else
    {
        console.log("DATA VIDE");
    }
  } catch (error) {
    console.error(error);
  }
},
supprimer(elementId) {
            // Envoi de la requête DELETE vers le serveur pour supprimer l'élément
            axios.get(`http://localhost:8000/api/supprimer/${elementId}`)
                .then(response => {
                // Succès : l'élément a été supprimé de la base de données
                console.log(response.data);
                // Mise à jour de la liste des éléments affichés
                this.getProfs();
            })
                .catch(error => {
                // Erreur lors de la suppression de l'élément
                console.error(error);
            });
        },
    getMinPrestation() {
      axios.get('http://localhost:8000/api/minprestation')
        .then(response => {
          // console.log(response.data);
          this.minPrest = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    },
    getMaxPrestation() {
      axios.get('http://localhost:8000/api/maxprestation')
        .then(response => {
          // console.log(response.data);
          this.maxPrest = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    },
    getSomme()
    {
        axios.get('http://localhost:8000/api/sommeprestation')
        .then(response => {
          // console.log(response.data);
          this.somme = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    },
    modifier(id) {
            const enseignant = {
                matricule: this.elements.matricule,
                nom: this.elements.nom,
                tauxH: this.elements.tauxH,
                nbH: this.elements.nbH,
                id: this.elements.id
            };
            axios.post(`http://localhost:8002/api/modifier/${id}`, enseignant)
                .then(response => {
                console.log(response.data);
            })
                .catch(error =>
                {
                console.error(error);
            });
        }
}
}
</script>

<template>

    <div>
        <h1>Liste des enseignant</h1>
        <hr>
        <br>
        <a class="add" href="/ajout">Ajouter</a>
    </div>

    <br>
    <br>
    <table>
        <tr>
            <th>#</th>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Taux horaire</th>
            <th>Nombre d'heure</th>
            <th>Prestation</th>
            <th>Action</th>
        </tr>


        <tbody v-for="(prof,i) in  profs" :key="i">
            <tr>
                <td>{{prof.id}}</td>
                <td>{{prof.matricule}}</td>
                <td>{{prof.nom}}</td>
                <td>{{prof.tauxH}}</td>
                <td>{{prof.nbH}}</td>
                <td>{{prof.prestation}}</td>
                <td>
                    <router-link :to="{path:'/modifier/'+prof.id}"><img :src="modif" alt=""></router-link>
                    <button @click="supprimer(prof.id)"><img :src="img" alt=""></button>
                </td>
            </tr>
        </tbody>

        <!-- <tbody v-else>
            <tr>
                <td colspan="6">Loading...</td>
            </tr>
        </tbody> -->
    </table>
    <br>
    <br>
<h1>Prestation</h1>
<hr class="lignx">
<br>
<div class="contenu">
    <br>
    <h1>Total</h1>
    <h2 class="val">{{ somme }}</h2>
</div>

<div class="contenu">
    <br>
    <h1>Minimum</h1>
    <h2 class="val">{{ minPrest }}</h2>
</div>

<div class="contenu">
    <br>
    <h1>Maximum</h1>
    <h2 class="val">{{ maxPrest }}</h2>
</div>

</template>



<style lang="css" scoped>

.lignx
{
    width: 30%;
}

.contenu
{
    width: 20%;
    height: 10vw;
    border-radius: 50%;
    background-color: rgb(24, 31, 238);
    display: inline-block;
    margin-left: 1vw;
}

.contenu h1
{
    color:  white;
}

.contenu h2
{
    color: yellow;
}

table
{
    width: 70%;
    margin-left: 20%;
}

.add{
    background-color: blue;
    color: white;
    text-decoration: none;
    padding: 5px;
}

th
{
    padding: 1vw;
    background-color: blue;
    color: white;
}

img
{
    width: 1.5vw;
    height: 2vw;
    border: 0;
    margin-right: 1vw;
}
</style>