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
    <?php if ($message != null): ?>
        <meta http-equiv="refresh" content="3;url=./home" />
    <?php endif; ?>
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
<?php if ($message != null): ?>
    
        <div class="message">
            <?= ($message)."
" ?>
        </div>
        <hr>
        <p class="text-center">You will be redirected in <span id="countdown">3</span> seconds.</p>
    
    <?php else: ?>
        <div class="card projectsummary">
            <div class="card-block project">
                <h1 class="card-title w-50 text-capitalize edit" contenteditable="false"><?= ($project['title']) ?></h1>
                <h6 class="card-subtitle mb-2 text-muted text-capitalize edit" contenteditable="false"><?= ($project['status']) ?></h6>
                <p class="card-text edit" contenteditable="false"><?= ($project['description']) ?></p>
                <a href="http://www.trello/<?= ($project['trello']) ?>" class="card-link edit" contenteditable="false">http://www.trello/<?= ($project['trello']) ?></a>
                <a href="#" class="card-link edit" contenteditable="false">Another link</a>
                <hr>
                <form method="POST" action="./<?= ($project['title']) ?>">
                    <input type="submit" id="delete" name="delete" class="btn btn-success btn-sm float-left"
                           value="Delete Project"/>
                </form>
                <input type="button" id="editButton" class="btn btn-success btn-sm float-right" value="Edit"/>
            </div>
        </div>
    
<?php endif; ?>

<!--scripts loaded here-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="../grph/js/edit.js"></script>
</body>
</html>