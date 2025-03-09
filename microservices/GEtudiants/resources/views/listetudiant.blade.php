<!DOCTYPE html>
<html>
<head>
    <title>Liste des Étudiants</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Liste des Étudiants</h1>
        <form action="{{ isset($etudiantup) ? route('Update.Etudiant') : route('Ajout.Etudiant') }}" method="POST" class="form-inline">
            @csrf
            @if (isset($etudiantup))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $etudiantup->id }}">
            @endif
            <div class="form-group mb-2">
                <label for="nomcomplet" class="mr-2">Nom Complet</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="nomcomplet" name="nomcomplet" value="{{ $etudiantup->nomcomplet ?? '' }}" required>
                </div>
            </div>
            <div class="form-group mb-2 mx-2">
                <label for="email" class="mr-2">Email</label>
                <div class="input-group">
                    <input type="email" class="form-control" id="email" name="email" value="{{ $etudiantup->email ?? '' }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($etudiantup) ? 'Modifier' : 'Ajouter' }}</button>
        </form>

        @if (session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <br>
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom Complet</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($etudiants as $etudiant)
                    <tr>
                        <td>{{ $etudiant->id }}</td>
                        <td>{{ $etudiant->nomcomplet }}</td>
                        <td>{{ $etudiant->email }}</td>
                        <td>
                            <a href="{{ route('Edit.Etudiant', $etudiant->id) }}" class="btn btn-sm btn-success">Modifier</a>
                            <form action="{{ route('Delete.Etudiant', $etudiant->id) }}" method="POST" style="display:inline-block;">
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
