<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérifier si un nombre est pair</title>
    <link rel="stylesheet" href="/asset/style/style.css">
    <style>
        .pair {
            color: green;
        }
        .impair {
            color: red;
        }
        .error {
            color: red;
        }
        p {
            color: salmon;
        }
    </style>
</head>

<body>
    <nav>
        <a href="/">Accueil</a>
        <a href="/random-number">Nombre Aléatoire</a>
        <a href="/even-numbers">Nombres Pairs</a>
    </nav>

    <main>
        <h1>Quiz: Devinez si le nombre sera pair ou impair!</h1>
        <form action="/even-numbers" method="POST">
            <label for="number">Entrez un nombre :</label>
            <input type="number" id="number" name="number" required>
            <button type="submit">Vérifier si pair</button>
        </form>
    </main>
</body>

</html>