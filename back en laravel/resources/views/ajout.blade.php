<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter enseignant</title>
</head>
<body>
    <form action="/ajout/ajout_traitement" method="post">
        @csrf
        <label>Matricule</label>
        <input type="text" name="matricule">
        <br>
        <br>

        <label>Nom</label>
        <input type="text" name="nom">
        <br>
        <br>

        <label>Taux horaire</label>
        <input type="text" name="tauxH">
        <br>
        <br>

        <label>Nombre d'heure</label>
        <input type="text" name="nbH">
        <br>
        <br>
        <br>

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>