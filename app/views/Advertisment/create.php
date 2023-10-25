<?php $this->layout('layout') ?>

<?php echo $flash ?>

<div class="container mt-2">
    <form method="post" action="/storeAdvertisment" id="adForm" novalidate>
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
            <label for="price" class="form-label mx-2">Выберите цену:</label>
            <input type="number" class="form-control mx-2" id="price" name="price" required>
            <div class="invalid-feedback">Пожалуйста, заполните это поле.</div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" checked>
                <label class="form-check-label" for="inlineRadio1">руб.</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                <label class="form-check-label" for="inlineRadio2">руб./ч.</label>
            </div>
        </div>
        <div class="input-group mb-2">
            <label for="inputGroupFile04" class="form-label mx-2 mt-2">Добавьте картинку:</label>
            <input type="file" class="form-control" id="inputGroupFile04" name="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            <div class="invalid-feedback">Пожалуйста, заполните это поле.</div>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Создать запись</button>
        </div>
    </form>
</div>

<script>
    let adForm = document.getElementById('adForm');
    adForm.addEventListener('submit', function(event){
        event.preventDefault();

        let title = document.getElementById('title');
        let description = document.getElementById('description');
        let price = document.getElementById('price');
        let image = document.getElementById('inputGroupFile04');
        let selection = document.getElementById('topic');
        let radio1 = document.querySelector('#inlineRadio1');
        let radio2 = document.querySelector('#inlineRadio2');

        let fields = [title, description, price, image, selection];

        // simple validation
        let isFormValid = true;

        fields.forEach(field => {
            if(field.value.trim() === ""){
                field.classList.add('is-invalid');
                isFormValid = false;
            } else {
                field.classList.remove('is-invalid');
            }
        });

        if(!radio1.checked && !radio2.checked){
            radio1.classList.add('is-invalid');
            radio2.classList.add('is-invalid');
            isFormValid = false;
        } else {
            radio1.classList.remove('is-invalid');
            radio2.classList.remove('is-invalid');
        }

        if (isFormValid) {
            adForm.submit();
        }

    });
</script>

