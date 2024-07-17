<!DOCTYPE html>
<html>
<head>
    <title>Add Alternatives</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('navbar')
    <div class="container mt-4">
        <h1>Add Alternative</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('alternatives.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="alternative_name" class="form-label">Alternative Name</label>
                <input type="text" class="form-control" id="alternative_name" name="alternative_name" required>
            </div>

            <h3>Criteria Weights</h3>
            <div id="criteria-container">
                <div class="row mb-3 criteria-row">
                    <div class="col-md-6">
                        <label for="criteria1_entry" class="form-label">Criterion</label>
                        <select class="form-select" name="criteria[0][entry_id]" required>
                            @foreach($entries as $entry)
                                <option value="{{ $entry->id }}">{{ $entry->criteria1_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="criteria1_weight" class="form-label">Weight</label>
                        <input type="number" step="0.01" class="form-control" name="criteria[0][weight]" required>
                    </div>
                    <div class="col-md-2 remove-btn">
                        <button type="button" class="btn btn-danger remove-criteria">Remove</button>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-secondary mb-3" id="add-criteria">Add Criteria</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById('add-criteria').addEventListener('click', function () {
            let container = document.getElementById('criteria-container');
            let index = container.getElementsByClassName('criteria-row').length;
            let row = document.createElement('div');
            row.className = 'row mb-3 criteria-row';
            row.innerHTML = `
                <div class="col-md-6">
                    <label for="criteria${index}_entry" class="form-label">Criterion</label>
                    <select class="form-select" name="criteria[${index}][entry_id]" required>
                        @foreach($entries as $entry)
                            <option value="{{ $entry->id }}">{{ $entry->criteria1_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="criteria${index}_weight" class="form-label">Weight</label>
                    <input type="number" step="0.01" class="form-control" name="criteria[${index}][weight]" required>
                </div>
                <div class="col-md-2 remove-btn">
                    <button type="button" class="btn btn-danger remove-criteria">Remove</button>
                </div>
            `=;
            container.appendChild(row);

            attachRemoveHandlers();
        });

        function attachRemoveHandlers() {
            let removeButtons = document.getElementsByClassName('remove-criteria');
            for (let i = 0; i < removeButtons.length; i++) {
                removeButtons[i].addEventListener('click', function () {
                    this.parentElement.parentElement.remove();
                });
            }
        }

        attachRemoveHandlers();
    </script>
</body>
</html>
