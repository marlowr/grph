<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green River Project Hub</title>
    <base target="_self">
    <meta name="description" content="A Hub for Green River Projects." />
    <meta name="google" value="notranslate">
    <link rel="shortcut icon" href="/images/cp_ico.png">


    <!--stylesheets / link tags loaded here-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles/index.css?<?= (date('l jS \of F Y h:i:s A')) ?>" />

</head>
<body >
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

<div class="container-fluid" id="main">
    <h1 class="display-3">
        Green River Project Hub
    </h1>
    <p>
        A hub for all of Green River College's current software development projects.
    </p>
    <!-- Add Project Button -->
    <a class="btn btn-success btn-lg" href="" role="button" data-toggle="modal" data-target="#exampleModal">
        <span class="font-weight-normal">+ Add Project</span>
    </a>
    <!-- Add Project Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <!-- Add Project Form Tabs -->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-detail-tab" data-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="true">Details</a>
                                <a class="nav-item nav-link" id="nav-client-tab" data-toggle="tab" href="#nav-client" role="tab" aria-controls="nav-client" aria-selected="false">Client Info</a>
                                <a class="nav-item nav-link" id="nav-link-tab" data-toggle="tab" href="#nav-link" role="tab" aria-controls="nav-link" aria-selected="false">Links</a>
                                <a class="nav-item nav-link" id="nav-history-tab" data-toggle="tab" href="#nav-history" role="tab" aria-controls="nav-history" aria-selected="false">History</a>
                            </div>
                        </nav>
                        <!-- Add Project Form -->
                        <form id="addForm" action="./home" method="post">
                            <!-- Project Detail Tab Content -->
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-detail" role="tabpanel"
                                     aria-labelledby="nav-detail-tab">
                                    <br />
                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title"
                                                   name="title" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Description</label>
                                            <textarea class="form-control" id="desc"
                                                      name="description" rows="3" placeholder=""></textarea>
                                        </div>
                                        <label>Project Status</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status"  value="pending" checked>
                                            <label class="form-check-label" for="pending">
                                                Pending
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" value="active">
                                            <label class="form-check-label" for="active">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status"
                                                   value="maintenance">
                                            <label class="form-check-label" for="maintenance">
                                                Maintenance
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status"
                                                   value="retired">
                                            <label class="form-check-label" for="retired">
                                                Retired
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Client Tab Content -->
                                <div class="tab-pane fade" id="nav-client" role="tabpanel"
                                     aria-labelledby="nav-client-tab">
                                    <br />
                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="client">Client/Company Name</label>
                                            <input type="text" class="form-control" id="client"
                                                   name="client" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" class="form-control" id="location"
                                                   name="location" value="">
                                        </div>

                                        <label for="basic-url">Company URL</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">https://</span>
                                            </div>
                                            <input type="text" class="form-control" id="basic-url" name="companyurl"
                                                   aria-describedby="basic-addon1">
                                        </div>

                                        <h4>Contact Info</h4>
                                        <hr>
                                        <div class="form-group">
                                            <label for="name">Contact Name</label>
                                            <input type="text" class="form-control" id="name"
                                                   name="contactname" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" id="email"
                                                   name="contactemail" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input type="phone" class="form-control" id="phone"
                                                   name="contactphone" value="">
                                        </div>
                                    </div>
                                </div>
                                <!-- Project Links Tab Content -->
                                <div class="tab-pane fade" id="nav-link" role="tabpanel" aria-labelledby="nav-link-tab">
                                    <br>
                                    <div class="col-10">
                                        <!-- Site URL -->
                                        <label for="basic-url">Site URL</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon">https://</span>
                                            </div>
                                            <input type="text" class="form-control" id="basicurl" name="siteurl"
                                                   aria-describedby="basic-addon">
                                        </div>

                                        <!-- Trello -->
                                        <label for="trello-url">Trello</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2">https://trello.com/</span>
                                            </div>
                                            <input type="text" class="form-control" id="trello-url" name="trello"
                                                   aria-describedby="basic-addon2">
                                        </div>

                                        <!-- GitHub -->
                                        <label for="github-url">GitHub</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">https://github.com/</span>
                                            </div>
                                            <input type="text" class="form-control" id="github-url" name="github"
                                                   aria-describedby="basic-addon3">
                                        </div>

                                        <!-- Login Credentials -->
                                        <h4>Login Credentials</h4>
                                        <hr>
                                        <div class="form-group">
                                            <label for="login" class="font-weight-bold">Username</label>
                                            <input type="text" class="form-control" id="login"
                                                   name="login" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="font-weight-bold">Password</label>
                                            <input type="text" class="form-control" id="password"
                                                   name="password" value="">
                                        </div>
                                    </div>
                                </div>
                                <!-- History Tab Content -->
                                <div class="tab-pane fade" id="nav-history" role="tabpanel"
                                     aria-labelledby="nav-client-tab">
                                    <br />
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="instructor">Instructor Name</label>
                                            <input type="text" class="form-control" id="instructor"
                                                   name="instructor" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="class">IT Class</label>
                                            <select class="form-control" id="class"
                                                    name="class">
                                                <option>Choose...</option>
                                                <option>IT 128 - Full Stack Web Dev</option>
                                                <option>IT 333 - Data Structure & Algorithms</option>
                                                <option>IT 355 - Agile Dev Methods</option>
                                                <option>IT 405 - Mobile Dev Frameworks</option>
                                                <option>IT 460 - Threat Analysis</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="quarter">Quarter</label>
                                                <select class="form-control" id="quarter"
                                                        name="quarter">
                                                    <option>Choose...</option>
                                                    <option>Fall</option>
                                                    <option>Winter</option>
                                                    <option>Spring</option>
                                                    <option>Summer</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label for="year">Year</label>
                                                <select class="form-control" id="year"
                                                        name="year">
                                                    <option>Choose...</option>
                                                    <option>2015</option>
                                                    <option>2016</option>
                                                    <option>2017</option>
                                                    <option>2018</option>
                                                    <option>2019</option>
                                                    <option>2020</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br />
                                    </div>
                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="notes">Notes</label>
                                            <textarea class="form-control" id="notes"
                                                      name="description" rows="5" placeholder=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" form="addForm" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#all" role="tab">All Projects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#active" role="tab">Active</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#pending" role="tab">Pending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#maintenance" role="tab">Maintenance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#retired" role="tab">Retired</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="all" role="tabpanel">
            <div class="row">
                <?php foreach (($projects?:[]) as $project): ?>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-block project">
                                    <h4 class="card-title"><?= ($project['title']) ?></h4>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= ($project['client']) ?></h6>
                                    <p class="card-text"><?= ($project['description']) ?></p>
                                    <a class="btn btn-success" href="<?= ($BASE) ?>/<?= ($project['title']) ?>" role="button">View Project</a>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="tab-pane" id="active" role="tabpanel">
            <div class="row">
                <?php foreach (($projects?:[]) as $project): ?>
                    <?php if ($project['status'] == 'active'): ?>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-block project">
                                    <h4 class="card-title"><?= ($project['title']) ?></h4>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= ($project['client']) ?></h6>
                                    <p class="card-text"><?= ($project['description']) ?></p>
                                    <a class="btn btn-success" href="<?= ($BASE) ?>/<?= ($project['title']) ?>" role="button">View Project</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="tab-pane" id="pending" role="tabpanel">
            <div class="row">
                <?php foreach (($projects?:[]) as $project): ?>
                    <?php if ($project['status'] == 'pending'): ?>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-block project">
                                    <h4 class="card-title"><?= ($project['title']) ?></h4>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= ($project['client']) ?></h6>
                                    <p class="card-text"><?= ($project['description']) ?></p>
                                    <a class="btn btn-success" href="<?= ($BASE) ?>/<?= ($project['title']) ?>"
                                       role="button">View Project</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="tab-pane" id="maintenance" role="tabpanel">
            <div class="row">
                <?php foreach (($projects?:[]) as $project): ?>
                    <?php if ($project['status'] == 'maintenance'): ?>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-block project">
                                    <h4 class="card-title"><?= ($project['title']) ?></h4>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= ($project['client']) ?></h6>
                                    <p class="card-text"><?= ($project['description']) ?></p>
                                    <a class="btn btn-success" href="<?= ($BASE) ?>/<?= ($project['title']) ?>"
                                       role="button">View Project</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="tab-pane" id="retired" role="tabpanel">
            <div class="row">
                <?php foreach (($projects?:[]) as $project): ?>
                    <?php if ($project['status'] == 'retired'): ?>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-block project">
                                    <h4 class="card-title"><?= ($project['title']) ?></h4>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= ($project['client']) ?></h6>
                                    <p class="card-text"><?= ($project['description']) ?></p>
                                    <a class="btn btn-success" href="<?= ($BASE) ?>/<?= ($project['title']) ?>"
                                       role="button">View Project</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!--/container-->
<footer class="container-fluid">
    <p class="text-right small">©2018 Green River College</p>
</footer>

<!--scripts loaded here-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
