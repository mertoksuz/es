<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Search Results</title>
</head>
<body>
<h1>Email Search Results</h1>

@if(isset($results['data']) && count($results['data']) > 0)
    <ul>
        @foreach($results['data'] as $result)
            <li>
                <strong>Provider:</strong> {{ $results['provider'] }}<br>
                <strong>Email:</strong> {{ $result }}<br>
            </li>
            <br>
        @endforeach
    </ul>
@else
    <p>No valid email found from any provider.</p>
@endif

<!-- Add more display logic as needed -->

</body>
</html>
