<?php include(ROOT . '/views/layouts/header.php'); ?>

    <div class="container">
        <form action="/admin/add" method="post" enctype="multipart/form-data">
            <p><label><b>Name:</b> <input type="text" name="name"></label>
            </p>
            <p><label><b>Categor:</b>
                    <select name="categories" id="">
                        <? foreach ($categories as $c) { ?>
                            <?php if ($c['id']!=0) { ?>
                                <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                            <? }
                        } ?>
                    </select>
                </label></p>
            <p><label><b>Price:</b> <input type="number" name="price"></label>
            </p>
            <p><label><b>Availability:</b> <input type="number" name="availability"></label>
            </p>
            <p><label><b>Brand:</b> <input type="text" name="brand"></label>
            </p>
            <p><label><b>Description:</b> <input type="text" name="description"></label>
            </p>

            <input type="file" name="image" accept="image/jpeg, image/png">
            <button name="create">Добавить</button>
        </form>
        <p style="margin: 10px 0"> <?php if (isset($_SESSION['messageAdd'])) echo $_SESSION['messageAdd'] ?></p>


    </div>

<?php include(ROOT . '/views/layouts/footer.php'); ?>