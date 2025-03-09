<!DOCTYPE html>
<html>

<head>
    <title>Liste des Emplois du Temps</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="my-4">Liste des Emplois du Temps</h1>
        <form action="{{ isset($emploiup) ? route('Update.Emploi', $emploiup->id) : route('Ajout.Emploi') }}" method="POST" class="form-inline">
            @csrf
            @if (isset($emploiup))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $emploiup->id }}">
            @endif
            <div class="form-group mb-2">
                <label for="jour" class="mr-2">Jour</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="jour" name="jour" value="{{ $emploiup->jour ?? '' }}" required>
                </div>
            </div>
            <div class="form-group mb-2 mx-2">
                <label for="heure_debut" class="mr-2">Heure Début</label>
                <div class="input-group">
                    <input type="time" class="form-control" id="heure_debut" name="heure_debut" value="{{ $emploiup->heure_debut ?? '' }}" required>
                </div>
            </div>
            <div class="form-group mb-2 mx-2">
                <label for="heure_fin" class="mr-2">Heure Fin</label>
                <div class="input-group">
                    <input type="time" class="form-control" id="heure_fin" name="heure_fin" value="{{ $emploiup->heure_fin ?? '' }}" required>
                </div>
            </div>
            <div class="form-group mb-2 mx-2">
                <label for="professeur" class="mr-2">Professeur</label>
                <select class="form-control" id="professeur" name="professeur" required>
                    @foreach ($profs as $prof)
                        <option value="{{ $prof['id'] }}" {{ isset($emploiup) && $emploiup->professeur == $prof['id'] ? 'selected' : '' }}>{{ $prof['nomcomplet'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2 mx-2">
                <label for="matiere" class="mr-2">Matière</label>
                <input type="text" class="form-control" id="matiere" name="matiere" value="{{ $emploiup->matiere ?? '' }}" required>
            </div>
            <div class="form-group mb-2 mx-2">
                <label for="classe" class="mr-2">Classe</label>
                <select class="form-control" id="classe" name="classe" required>
                    @foreach ($classes as $classe)
                        <option value="{{ $classe['id'] }}" {{ isset($emploiup) && $emploiup->classe == $classe['id'] ? 'selected' : '' }}>{{ $classe['nomclasse'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($emploiup) ? 'Modifier' : 'Planifier' }}</button>
        </form>

        @if (session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <br>
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Jour</th>
                    <th>Heure Début</th>
                    <th>Heure Fin</th>
                    <th>Professeur</th>
                    <th>Matière</th>
                    <th>Classe</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emplois as $emploi)
                    <tr>
                        <td>{{ $emploi->id }}</td>
                        <td>{{ $emploi->jour }}</td>
                        <td>{{ $emploi->heure_debut }}</td>
                        <td>{{ $emploi->heure_fin }}</td>
                        <td>{{ $emploi->professeur }}</td>
                        <td>{{ $emploi->matiere }}</td>
                        <td>{{ $emploi->classe }}</td>
                        <td>
                            <a href="{{ route('Edit.Emploi', $emploi->id) }}" class="btn btn-sm btn-success">Modifier</a>
                            <form action="{{ route('Delete.Emploi', $emploi->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
