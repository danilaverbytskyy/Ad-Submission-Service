<?php $this->layout('layout') ?>

<section id="banner">
    <div class="container-fluid bg-success bg-gradient h-auto" style="padding-left: 9%;">
        <h1 class="display-4 pt-5">Awito - Лучший Сервис Для Ваших Объявлений!</h1>
        <p class="lead pb-5">Настроение и вдохновение в каждом товаре.</p>
    </div>
</section>


<section id="advertisments">
    <div class="container">
        <div class="row">
            <?php if (isset($username) && $username !== null): ?>
                <div class="alert alert-dark" role="alert">
                    <?php echo $username ?>, прямо сейчас вы можете
                    <a href="/create" type="button" class="btn bg-success opacity-75 mt-2 mx-1">
                        <i class="fa-sharp fa-light fa-wand-magic-sparkles fa-bounce"></i> Создать Объявление
                    </a>
                </div>
            <?php else: ?>
                <div class="alert alert-primary" role="alert">
                    Для публикации объявлений вы должны быть сначала <a href="/signup">Зарегистрированы</a>, а затем <a
                            href="/login">Авторизированы</a>
                </div>
            <?php endif; ?>
            <?php if (isset($advertisments)): ?>
                <?php foreach ($advertisments as $advertisment): ?>
                    <div class="col-sm-3 mb-3 mb-sm-3">
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $advertisment['title'] ?></h5>
                                <p class="card-text"><?php echo $advertisment['description'] ?></p>
                                <p class="card-text"><?php echo $advertisment['date'] ?></p>
                                <p class="card-text">
                                    <i class="fa-solid fa-book-open-reader"
                                       style="color: #169914;"></i> <?php echo $authors[$advertisment["id"]] ?>
                                </p>
                                <a href="#" class="btn btn-primary">Смотреть</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    </div>
</section>