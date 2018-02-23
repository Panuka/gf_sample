<?php

namespace app\controllers;

use app\application\roadmap\dto\CatalogsDtoAssemblerInterface;
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

    /** @var CatalogsDtoAssemblerInterface  */
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
            'model' => $this->findModel($id),
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => (string)$model->_id]);
        }

        return $this->render('update', [
            'model' => $model,
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
}
