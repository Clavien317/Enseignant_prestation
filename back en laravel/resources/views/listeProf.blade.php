<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste enseignant</title>
    <style>
        table
        {
            width: 70%;
            margin-left: 15%;
        }


        th
        {
            padding: 1vw;
            background-color: blue;
            color: white;
        }

        body
        {
            text-align: center;
        }

        button
        {
            background-color: blue;
            color: white;
            padding: 1vw;
        }

        a{
            text-decoration: none;
        }

        .msg
        {
            background-color: rgb(12, 70, 23);
            color: white;
            padding: 3vw;
        }
    </style>
</head>
<body>
    <br>
    @if(session('status'))
    <div class="msg">
        {{session("status")}}
    </div>
    @endif
    <br>
        <a href="/ajout"><button>Ajouter enseignant</button></a>
    <br>
    <br>
    <table border="4">
        <tr>
            <th>#</th>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Taux d'heure</th>
            <th>Nombre d'heure</th>
            <th>Prestation</th>
            <th>Action</th>
        </tr>

        @foreach($profs as $data)
        <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->matricule}}</td>
            <td>{{$data->nom}}</td>
            <td>{{$data->tauxH}}</td>
            <td>{{$data->nbH}}</td>
            <td>{{$data->prestation}}</td>
            <td>
                <a href="/modifier/{{$data->id}}">Modifier</a>
                <a href="/supprimer/{{$data->id}}">Supprimer</a>
            </td>
        </tr>
        @endforeach
    </table>
    <br>
    <br>
    <h3>Prestation minimum:</h3><h1>{{$min}}</h1>
    <hr>
    <h3>Prestation maximum:</h3><h1> {{$max}}</h1>
</body>
</html>