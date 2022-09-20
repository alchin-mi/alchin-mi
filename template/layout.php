<?global $uri;?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title><?= $title ?></title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="container">
                <div class="d-flex flex-column flex-shrink-0 p-3">
                    <a href="/"
                       class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                        <h3>Задачник</h3>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link <?= $uri === '/' ? 'active' : 'link-dark' ?>" aria-current="page">
                                Главная
                            </a>
                        </li>
                        <li>
                            <a href="/add" class="nav-link <?= $uri === '/add' ? 'active' : 'link-dark' ?>">
                                Создать задачу
                            </a>
                        </li>
                        <li>
                            <a href="/auth" class="nav-link <?= $uri === '/auth' ? 'active' : 'link-dark' ?>">
                                Авторизация
                            </a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-sm-9 p-3">
            <div class="container">
                <h4><?= $title ?></h4>
                <?= $content ?>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>