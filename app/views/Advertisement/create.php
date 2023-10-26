<?php $this->layout('layout') ?>

<?php echo $flash ?>

<div class="container mt-2">
    <form method="post" action="/storeAdvertisement" id="adForm" enctype="multipart/form-data" novalidate>
        <h2>Создание нового объявления!</h2>
        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title">
            <div class="invalid-feedback">Пожалуйста, заполните это поле.</div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
            <div class="invalid-feedback">Пожалуйста, заполните это поле.</div>
        </div>
        <div class="mb-3">
            <label for="topic" class="form-label">Тема</label>
            <select id="topic" name="topic" class="form-select form-select-sm" aria-label="Small select example">
                <option value="" selected>Выберите тему</option>
                <option value="1">Укращения</option>
                <option value="2">Техника</option>
                <option value="3">Химия</option>
                <option value="4">Для животных</option>
                <option value="5">Другое</option>
            </select>
        </div>
        <div class="input-group mb-2">
            <label for="price" class="form-label mx-2">Напишите цену(в рублях):</label>
            <input type="number" class="form-control mx-2" id="price" name="price" required>
            <div class="invalid-feedback">Пожалуйста, заполните это поле.</div>
        </div>
        <div class="input-group mb-2">
            <label for="inputGroupFile04" class="form-label mx-2 mt-2">Добавьте картинку:</label>
            <input required type="file" class="form-control" id="inputGroupFile04" name="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            <div class="invalid-feedback">Пожалуйста, заполните это поле.</div>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Создать запись</button>
        </div>
    </form>
</div>
