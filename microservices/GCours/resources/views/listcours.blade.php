<!DOCTYPE html>
<html>
<head>
    <title>Liste des Cours</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Liste des Cours</h1>
        <form action="{{ isset($courup) ? route('Update.Cours') : route('Ajout.Cours') }}" method="POST" class="form-inline">
            @csrf
            @if (isset($courup))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $courup->id }}">
            @endif
            <div class="form-group mb-2">
                <label for="nom" class="mr-2">Nom du Cours</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $courup->nom ?? '' }}" required>
                </div>
            </div>
            <div class="form-group mb-2 mx-2">
                <label for="description" class="mr-2">Description</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="description" name="description" value="{{ $courup->description ?? '' }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($courup) ? 'Modifier' : 'Ajouter' }}</button>
        </form>

        @if (session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <br>
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom du Cours</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cours as $crs)
                    <tr>
                        <td>{{ $crs->id }}</td>
                        <td>{{ $crs->nom }}</td>
                        <td>{{ $crs->description }}</td>
                        <td>
                            <a href="{{ route('Edit.Cours', $crs->id) }}" class="btn btn-sm btn-success">Modifier</a>
                            <form action="{{ route('Delete.Cours', $crs->id) }}" method="POST" style="display:inline-block;">
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
