<!DOCTYPE html>
<html>
<head>
    <title>Calculate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('navbar')
    <div class="container">
        <h1>Calculation Result</h1>
        <p>Name: {{ $entry->name }}</p>
        <p>Result: {{ $result }}</p>
        <!-- Display more details if necessary -->
    </div>
</body>
</html>
