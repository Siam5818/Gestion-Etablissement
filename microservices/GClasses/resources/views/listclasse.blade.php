<!DOCTYPE html>
<html>

<head>
    <title>Liste des Classes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="my-4">Liste des Classes</h1>
        <form action="{{ isset($classe) ? route('Update.Classe') : route('Ajout.Classe') }}" method="POST" class="form-inline">
            @csrf
            @if (isset($classe))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $classe->id }}">
            @endif
            <div class="form-group mb-2">
                <label for="nomclasse" class="mr-2">Nom de la Classe</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="nomclasse" name="nomclasse" value="{{ $classe->nomclasse ?? '' }}" required>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">{{ isset($classe) ? 'Modifier' : 'Ajouter' }}</button>
                    </div>
                </div>
            </div>
        </form>

        @if (session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <br>
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom de la Classe</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $classe)
                    <tr>
                        <td>{{ $classe->id }}</td>
                        <td>{{ $classe->nomclasse }}</td>
                        <td>
                            <a href="{{ route('Edit.Classe', $classe->id) }}" class="btn btn-sm btn-success">Modifier</a>
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
