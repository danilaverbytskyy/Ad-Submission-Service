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
                    <a class="nav-link active" aria-current="page" href="/">Главная</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Категории
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Украшения</a></li>
                        <li><a class="dropdown-item" href="#">Квартиры</a></li>
                        <li><a class="dropdown-item" href="#">Животные</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Души Дьявола</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <button type="button" class="btn bg-info opacity-75 mt-2 mx-1">&#129500; Войти</button>
                <button type="button" class="btn btn-primary opacity-75 mt-2 mx-1">&#128214; Зарегистрироваться</button>
            </form>
        </div>
    </div>
</nav>

<?=$this->section('content')?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>