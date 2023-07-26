<template>
<div class="nav">
<br>
<br>
<router-link to="/">Acceuil</router-link>
<br>
<router-link to="/enseignant">Liste enseignant</router-link>
<br>
<router-link to="/about">Apropos</router-link>
<br>
<router-link to="/contact">Contact</router-link>
<br>
</div>
<br>
<br>
<router-view></router-view>
</template>

<script setup>


</script>

<style lang="css" scoped>
.nav
{
    width: 15%;
    background-color: rgb(29, 101, 179);
    color: white;
    height: 55vw;
    float: left;
    text-align: center;
}

.nav a
{
    margin-bottom: 4vw;
    display: inline-block;
}

a
{
    color: white;
    text-decoration: none;
    padding: 2vw;
    width: 50%;
    padding-right: 3vw;
    padding-left: 3vw;
}

a:hover
{
    background-color: rgb(57, 142, 66);
}
</style>