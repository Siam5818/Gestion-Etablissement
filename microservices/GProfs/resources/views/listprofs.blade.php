<!DOCTYPE html>
<html>
<head>
    <title>Liste des Professeurs</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Liste des Professeurs</h1>
        <form action="{{ isset($profup) ? route('Update.Prof') : route('Ajout.Prof') }}" method="POST" class="form-inline">
            @csrf
            @if (isset($profup))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $profup->id }}">
            @endif
            <div class="form-group mb-2">
                <label for="nomcomplet" class="mr-2">Nom Complet</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="nomcomplet" name="nomcomplet" value="{{ $profup->nomcomplet ?? '' }}" required>
                </div>
            </div>
            <div class="form-group mb-2 mx-2">
                <label for="email" class="mr-2">Email</label>
                <div class="input-group">
                    <input type="email" class="form-control" id="email" name="email" value="{{ $profup->email ?? '' }}" required>
                </div>
            </div>
            <div class="form-group mb-2 mx-2">
                <label for="specialite" class="mr-2">Spécialité</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="specialite" name="specialite" value="{{ $profup->specialite ?? '' }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($profup) ? 'Modifier' : 'Ajouter' }}</button>
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
                    <th>Spécialité</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profs as $prof)
                    <tr>
                        <td>{{ $prof->id }}</td>
                        <td>{{ $prof->nomcomplet }}</td>
                        <td>{{ $prof->email }}</td>
                        <td>{{ $prof->specialite }}</td>
                        <td>
                            <a href="{{ route('Edit.Prof', $prof->id) }}" class="btn btn-sm btn-success">Modifier</a>
                            <form action="{{ route('Delete.Prof', $prof->id) }}" method="POST" style="display:inline-block;">
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
