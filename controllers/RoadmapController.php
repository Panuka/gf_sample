<?php

namespace app\controllers;

use app\application\roadmap\dto\CatalogsDtoAssemblerInterface;
use app\domain\roadmap\Operation;
use app\domain\roadmap\Taxonomy;
use app\models\gf\Step;
use MongoDB\BSON\ObjectId;
use Yii;
use app\models\gf\ActiveRecord\Roadmap;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * RoadmapController implements the CRUD actions for Roadmap model.
 */
class RoadmapController extends Controller
{

    /** @var CatalogsDtoAssemblerInterface */
    private $catalogsDtoAssembler;

    public function __construct($id, $module, array $config = [], CatalogsDtoAssemblerInterface $catalogsDtoAssembler)
    {
        $this->catalogsDtoAssembler = $catalogsDtoAssembler;
        parent::__construct($id, $module, $config);
    }

    /**
     * Lists all Roadmap models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Roadmap::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Roadmap model.
     * @param integer $_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => Roadmap::findOne($id),
        ]);
    }

    /**
     * Creates a new Roadmap model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Roadmap();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => (string)$model->_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'catalogsDto' => $this->catalogsDtoAssembler->build(),
        ]);
    }

    /**
     * Updates an existing Roadmap model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = Roadmap::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => (string)$model->_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'catalogsDto' => $this->catalogsDtoAssembler->build(),
        ]);
    }

    /**
     * Deletes an existing Roadmap model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        Roadmap::findOne($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Метод генерирует демо тех. карту
     */
    private function generateEnity()
    {
        $model = new Roadmap();
        $steps = [];

        $potato = new Taxonomy(new ObjectId('5a9077172375716e8e077fd0'));
        $potato->count = 2;
        $cutting1 = new Operation('5a8fd9e02375716e8e077fa2');
        $cutting1->comment = 'Порезать по быстрому';
        $cutting1->time = 120;
        $cutting2 = new Operation('5a90867f2375716e8e077ff8');
        $cutting2->comment = 'Ух!';
        $cutting2->time = 180;
        $salt = new Taxonomy(new ObjectId('5a9086fe2375716e8e077fff'));
        $salt->count = 5;
        $step = new Step($potato, [$cutting1, $cutting2], [$salt]);
        $steps[] = $step->toArray();

        $ll = new Taxonomy(new ObjectId('5a9086c12375716e8e077ffc'));
        $ll->count = 4;
        $cutting = new Operation('5a90868b2375716e8e077ff9');
        $cutting->comment = 'В труху';
        $cutting->time = 60;
        $step = new Step($ll, [$cutting], []);
        $steps[] = $step->toArray();

        $cutting = new Operation('5a9086992375716e8e077ffa');
        $cutting->comment = 'Тщательно';
        $cutting->time = 300;
        $step = new Step(null, [$cutting], []);
        $steps[] = $step->toArray();


        $model->steps = json_encode($steps);
        $model->title = 'Вареный картофель с луком';
        $model->outVolume = '400';
        $model->uid = md5($model->title);
        $model->save();
    }

}
