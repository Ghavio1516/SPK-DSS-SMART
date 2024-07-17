<!DOCTYPE html>
<html>
<head>
    <title>History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('navbar')
    <div class="container">
        <h1>History</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Criterion 1</th>
                    <th>Criterion 2</th>
                    <th>Criterion 3</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entries as $entry)
                    <tr>
                        <td>{{ $entry->name }}</td>
                        <td>{{ $entry->criterion1 }}</td>
                        <td>{{ $entry->criterion2 }}</td>
                        <td>{{ $entry->criterion3 }}</td>
                        <td>
                            <a href="{{ route('calculate', $entry->id) }}" class="btn btn-primary">Calculate</a>
                            <form action="{{ route('history.delete', $entry->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
