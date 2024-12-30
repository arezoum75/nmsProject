use yii\helpers\Html;

$this->title = 'لیست دستگاه‌ها';
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1><?= Html::encode($this->title) ?></h1>
            <?= Html::a('افزودن دستگاه', ['create'], ['class' => 'btn btn-success mb-3']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>نام</th>
                        <th>آی‌پی</th>
                        <th>نوع</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($devices as $device): ?>
                        <tr>
                            <td><?= Html::encode($device->name) ?></td>
                            <td><?= Html::encode($device->ip_address) ?></td>
                            <td><?= Html::encode($device->device_type) ?></td>
                            <td>
                                <?php if ($device->status === 'Online'): ?>
                                    <span class="badge badge-success">آنلاین</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">آفلاین</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?= Html::a('ویرایش', ['update', 'id' => $device->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= Html::a('حذف', ['delete', 'id' => $device->id], [
                                    'class' => 'btn btn-danger btn-sm',
                                    'data' => [
                                        'confirm' => 'آیا از حذف این دستگاه مطمئن هستید؟',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
