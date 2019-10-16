<h1>Lang</h1>
<?php print_r($this->languages);exit;?>
<select name="lang" id="lang">
    <option value="<?= $this->language['code'] ?>"><?= $this->language['title'] ?></option>
    <?php foreach ($this->languages as $key => $val): ?>
        <?php if ($this->language['code'] != $key): ?>
            <option value="<?= $key ?>"><?= $val['title'] ?></option>
            <?php endif ?>
    <?php endforeach ?>
</select>