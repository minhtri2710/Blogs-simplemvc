<?php if (isset($data_sub)): ?>
    <?php foreach ($data_sub as $key => $value): ?>
        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
    <?php endforeach ?>
<?php else: ?>
    <option value="0">Danh Mục Đầu</option>
<?php endif ?>