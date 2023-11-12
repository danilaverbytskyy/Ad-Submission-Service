<style>
    <?php include "../../public/css/style.css" ?>
</style>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>


<div class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-gradient">
    <div class="container-fluid mx-5">
        <a class="navbar-brand" href="/">Awito</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/"><i class="bi bi-house"></i> Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about"><i class="bi bi-info-circle"></i> О нас</a>
                </li>
            </ul>
            <?php if($isLoggedIn === false):?>
                <form class="d-flex">
                    <a href="/login" type="button" class="btn bg-info opacity-75 mt-2 mx-1">
                        <i class="fa-solid fa-door-closed fa-beat-fade"></i> Войти
                    </a>
                    <a href="/signup" type="button" class="btn btn-primary opacity-75 mt-2 mx-1">
                        <i class="bi bi-pencil"></i> Зарегистрироваться
                    </a>
                </form>
            <?php else:?>
                <form class="d-flex mb-4">
                    <p class="mx-2">Добро пожаловать, <?php echo htmlspecialchars($nickname) ?>!</p>
                    <a href="/logout" class="btn btn-warning opacity-75 mx-1"><i class="fa-solid fa-door-closed fa-bounce"></i> Выйти</a>
                </form>
            <?php endif;?>
        </div>
    </div>
</nav>


    <main class="flex-grow-1">
        <?=$this->section('content')?>
    </main>

    <footer class="footer bg-light py-3 mt-auto">
        <div class="container text-center">
            <hr>
            <span class="text-muted">©Awito, Inc. 2023</span>
        </div>
    </footer>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/ea30508f49.js" crossorigin="anonymous"></script>
</body>
</html>