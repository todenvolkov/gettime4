<?php
    $this->breadcrumbs = array(
        'Регистрация',
    );
?>

<h1>Регистрация нового пользователя1</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>