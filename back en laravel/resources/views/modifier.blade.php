<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier enseignant</title>
</head>
<body>
    <form action="/modifier/modifier_traitement" method="post">
        @csrf
        <input type="text" name="id" style="display: none;" value="{{$data->id}}">
        <label>Matricule</label>
        <input type="text" name="matricule" value="{{$data->matricule}}">
        <br>
        <br>
        
        <label>Nom</label>
        <input type="text" name="nom" value="{{$data->nom}}">
        <br>
        <br>

        <label>Taux horaire</label>
        <input type="text" name="tauxH" value="{{$data->tauxH}}">
        <br>
        <br>

        <label>Nombre d'heure</label>
        <input type="text" name="nbH" value="{{$data->nbH}}">
        <br>
        <br>
        <br>

        <button type="submit">Modifier</button>
    </form>
</body>
</html>