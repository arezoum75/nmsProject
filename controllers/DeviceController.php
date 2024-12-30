namespace app\controllers;

use Yii;
use app\models\Device;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DeviceController extends Controller
{
    public function actionIndex()
    {
        $devices = Device::find()->all();
        return $this->render('index', ['devices' => $devices]);
    }

    public function actionCreate()
    {
        $model = new Device();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Device::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested device does not exist.');
    }
}
