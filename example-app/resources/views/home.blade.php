<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .remove-btn {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    @include('navbar')
    <div class="container mt-4">
        <h1>Input Data</h1>
        <form action="{{ route('submit') }}" method="POST">
            @csrf
            
            <h3>Criteria and Weights</h3>

            <div id="criteria-container">
                <div class="row mb-3 criteria-row">
                    <div class="col-md-4">
                        <label for="criteria1_name" class="form-label">Criterion 1 Name</label>
                        <input type="text" class="form-control" name="criteria[0][name]" required>
                    </div>
                    <div class="col-md-4">
                        <label for="criteria1_weight" class="form-label">Criterion 1 Weight</label>
                        <input type="number" step="0.01" class="form-control" name="criteria[0][weight]" required>
                    </div>
                    <div class="col-md-3">
                        <label for="criteria1_utility" class="form-label">Criterion 1 Utility</label>
                        <select class="form-select" name="criteria[0][utility]" required>
                            <option value="cost">Cost</option>
                            <option value="benefit">Benefit</option>
                        </select>
                    </div>
                    <div class="col-md-1 remove-btn">
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
                <div class="col-md-4">
                    <label for="criteria${index}_name" class="form-label">Criterion ${index + 1} Name</label>
                    <input type="text" class="form-control" name="criteria[${index}][name]" required>
                </div>
                <div class="col-md-4">
                    <label for="criteria${index}_weight" class="form-label">Criterion ${index + 1} Weight</label>
                    <input type="number" step="0.01" class="form-control" name="criteria[${index}][weight]" required>
                </div>
                <div class="col-md-3">
                    <label for="criteria${index}_utility" class="form-label">Criterion ${index + 1} Utility</label>
                    <select class="form-select" name="criteria[${index}][utility]" required>
                        <option value="cost">Cost</option>
                        <option value="benefit">Benefit</option>
                    </select>
                </div>
                <div class="col-md-1 remove-btn">
                    <button type="button" class="btn btn-danger remove-criteria">Remove</button>
                </div>
            `;
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
