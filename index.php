<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Føk Live</title>
    <script src="https://unpkg.com/htmx.org@2.0.2"
        integrity="sha384-Y7hw+L/jvKeWIRRkqWYfPcvVxHzVzn5REgzbawhxAuQGwX1XWe70vji+VSeHOThJ"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h1>Dr. Føk Live</h1>

    <div class="dialogue-box" id="dialogue-box">

        <div class="indicator">Afventer svar ...</div>

    </div>

    <form hx-post="api_call.php" hx-trigger="submit" hx-target="#dialogue-box" hx-swap="beforeend"
        hx-indicator=".indicator">
        <textarea id="query" placeholder="Skriv dit spørgsmål til Dr. Føk" name="query"></textarea>

        <button type="submit">
            Indsend
        </button>
    </form>

</body>

</html>