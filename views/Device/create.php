use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'افزودن دستگاه';
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'ip_address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'device_type')->dropDownList([
                'Router' => 'Router',
                'Switch' => 'Switch',
                'Firewall' => 'Firewall',
            ]) ?>

            <?= $form->field($model, 'status')->dropDownList([
                'Online' => 'Online',
                'Offline' => 'Offline',
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('ذخیره', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
