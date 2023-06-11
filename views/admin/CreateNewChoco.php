<div class="Add ">
    <form action="/admin/bike/create/0" method="post" enctype="multipart/form-data">
        <svg id="canselAdd" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
             fill="currentColor" class="bi bi-arrow-up-left-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm8.096 10.803L6 6.707v2.768a.5.5 0 0 1-1 0V5.5a.5.5 0 0 1 .5-.5h3.975a.5.5 0 1 1 0 1H6.707l4.096 4.096a.5.5 0 1 1-.707.707z"/>
        </svg>
        <p><label><b>model:</b> <input type="text" name="model"></label>
        </p>
        <p><label><b>categor:</b>
                <select name="categories" id="">
                    <? foreach ($categories as $c) { ?>
                        <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                    <? } ?>
                </select>
            </label></p>
        <p><label><b>local:</b>
                <select name="local" id="">
                    <? foreach ($locals as $l) { ?>
                        <option value="<?= $l['id'] ?>"><?= $l['name'] ?></option>
                    <? } ?>
                </select>
            </label></p>
        <p><label><b>status:</b><select name="status" id="">
                    <? foreach ($status as $s) { ?>
                        <option value="<?= $s['id'] ?>"><?= $s['name'] ?></option>
                    <? } ?>
                </select>
            </label></p>
        <input type="file" name="image" accept="image/jpeg, image/png">
        <button name="create">Добавить</button>
    </form>
    <? if (isset($_SESSION['messageAdd'])) { ?>
        <div class="message text-center">
            <? if (isset($_SESSION['messageAdd']['message']))
                foreach ($_SESSION['messageAdd']['message'] as $m) { ?>
                    <p class="alert-success"><?= $m ?></p>
                <? } ?>
        </div>
        <div class="message text-center">
            <? if (isset($_SESSION['messageAdd']['errors']))
                foreach ($_SESSION['messageAdd']['errors'] as $e) { ?>
                    <p class="alert-danger"><?= $e ?></p>
                <? } ?>
        </div>
        <? $_SESSION['messageAdd'] = null;
    } ?>
</div>
<div id="add">Добавить веловипед</div>
<script>
    window.addEventListener('load', function () {
        let Add = document.getElementById('add');
        let bgAdd = document.getElementsByClassName('bgAdd')[0];
        let canselAdd = document.getElementById('canselAdd');

        Add.onclick = function () {
            bgAdd.classList.remove('hidden');
        };
        canselAdd.onclick = function () {
            bgAdd.classList.add('hidden');
        };
    });
</script>