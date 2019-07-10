<?php

namespace app\modules\admin\controllers;

use app\models\Category;
use app\models\ProductSearch;
use app\modules\admin\models\Product;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        $allCategories = Category::getAll();
        $categories = null;
        foreach ($allCategories as $category)
            $categories[$category['id']] = $category['name'];

        if ($model->load(Yii::$app->request->post())) {

            if ($image = UploadedFile::getInstance($model, 'img')) {
                $imgName = Yii::$app->security->generateRandomString();
                $model->img = $imgName . ".{$image->extension}";
                $image->saveAs(\Yii::$app->basePath . "/web/product/{$imgName}.{$image->extension}");
            }
            if ($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImg = $model->img;

        $allCategories = Category::getAll();
        $categories = null;
        foreach ($allCategories as $category)
            $categories[$category['id']] = $category['name'];

        if ($model->load(Yii::$app->request->post())) {
            /** if isset instance save new image*/
            if ($image = UploadedFile::getInstance($model, 'img')) {
                $imgName = Yii::$app->security->generateRandomString();
                $model->img = $imgName . ".{$image->extension}";

                unlink(\Yii::$app->basePath . "/web/product/{$oldImg}");
                $image->saveAs(\Yii::$app->basePath . "/web/product/{$imgName}.{$image->extension}");
            } else $model->img = $oldImg;

            if ($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (isset($model->img))
            unlink(\Yii::$app->basePath . "/web/product/{$model->img}");
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
