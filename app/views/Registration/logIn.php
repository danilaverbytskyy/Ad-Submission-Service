<?php $this->layout('layout') ?>

<?php echo $flash?>
<form class="mx-5" action="/enter" method="post">
    <h2 class="display-4 pt-5">Вход</h2>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Введите почту</label>
        <input required type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Мы не будем делится ваший почтой ни с кем.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Введите пароль</label>
        <input required type="password" class="form-control" name="password" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
</form>
