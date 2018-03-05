<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base target="_self">
    <meta name="description" content="A Hub for Green River Projects." />
    <meta name="google" value="notranslate">
    <link rel="shortcut icon" href="/images/cp_ico.png">

    <!--stylesheets / link tags loaded here-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="styles/index.css" rel="stylesheet" />
    <title>Project Name</title>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-md navbar-dark mb-3 gray-bg">
    <div class="flex-row d-flex">
        <a class="navbar-brand" href="#" title="Green River Project Hub">
            GRPH
        </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="./">Home<span class="sr-only">Home</span></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="" data-target="#myModal" data-toggle="modal">Log Out</a>
            </li>
        </ul>
    </div>
</nav>
<div class="card projectsummary">
    <div class="card-block project">
        <h1 class="card-title"><?= ($project['title']) ?></h1>
        <h6 class="card-subtitle mb-2 text-muted"><?= ($project['status']) ?></h6>
        <p class="card-text"><?= ($project['description']) ?></p>
        <a href="http://www.trello/<?= ($project['trello']) ?>" class="card-link">http://www.trello/<?= ($project['trello']) ?></a>
        <a href="#" class="card-link">Another link</a>
    </div>
</div>


<!--
<div class="card projectsummary">
    <div class="card-block project">
        <h1 class="card-title">Project Name</h1>
        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
    </div>
</div>
-->

</body>
</html>