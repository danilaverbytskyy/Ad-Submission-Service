<?php $this->layout('layout') ?>

<form class="mx-5" action="/register" method="POST">
    <h2 class="display-4 pt-5">Регистрация</h2>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Введите никнейм</label>
        <input required type="text" class="form-control" name="nickname" id="nickname" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Введите почту</label>
        <input required type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Мы не будем делится ваший почтой ни с кем.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Введите пароль</label>
        <input required type="password" class="form-control" name="password" id="password">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
        <label class="form-check-label" for="exampleCheck1">Я согласен(а) с <a href="#">пользовательским соглашением</a></label>
    </div>
    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</form>

