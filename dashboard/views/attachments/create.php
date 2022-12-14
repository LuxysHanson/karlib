<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Attachment */
/* @var $form yii\bootstrap4\ActiveForm */

$this->title = Yii::t('app', 'Новое вложение');
?>

<div class="attachments-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin() ?>

    <?php if ($model->type == \common\enums\AttachmentsEnum::TYPE_IMAGE): ?>

    <?= $form->field($model, 'source')->hiddenInput(['data-attr' => 'source']) ?>

    <?= $form->field($model, 'image')->widget(\kartik\file\FileInput::class, [
            'pluginOptions' => [
                'theme' => 'fa',
                'uploadUrl' => '/attachments/upload',
                'deleteUrl' => '/attachments/remove',
            ],
            'pluginEvents' => [
                'fileuploaded' => 'function (e, data) {$('."'".'[data-attr="source"]'."'".').val(data.response.path); console.log(e); console.log(data)}',
            ],
            'options' => ['accept' => 'image/*']
        ])->label(false) ?>

    <?php elseif ($model->type == \common\enums\AttachmentsEnum::TYPE_VIDEO): ?>

    <?= $form->field($model, 'source')->textInput(['type' => 'url']) ?>

    <?php endif; ?>

    <?= $form->field($model, 'published')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
    </div>

    <?php $form::end() ?>
</div>
