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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-grid"></i> Категории
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gem"></i> Украшения</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-building"></i> Квартиры</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-piggy-bank"></i> Животные</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-vinyl"></i> Души Дьявола</a></li>
                    </ul>
                </li>
            </ul>
            <?php if(isset($isLoggedIn) === false):?>
            <form class="d-flex">
                <a href="/login" type="button" class="btn bg-info opacity-75 mt-2 mx-1">
                    <i class="bi bi-box-arrow-in-right"></i> Войти
                </a>
                <a href="/signup" type="button" class="btn btn-primary opacity-75 mt-2 mx-1">
                    <i class="bi bi-pencil"></i> Зарегистрироваться
                </a>
            </form>
            <?php else:?>
            <form class="d-flex">
                <button type="button" class="btn bg-info opacity-75 mt-2 mx-1">
                    <i class="bi bi-box-arrow-in-right"></i> Войти
                </button>
                <button type="button" class="btn btn-warning opacity-75 mt-2 mx-1">
                    <i class="bi bi-pencil"></i> Зарегистрироваться
                </button>
            </form>
            <?php endif;?>
        </div>
    </div>
</nav>


<?=$this->section('content')?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/ea30508f49.js" crossorigin="anonymous"></script>
</body>
</html>