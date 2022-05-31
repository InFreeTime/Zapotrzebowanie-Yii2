<?php

namespace app\controllers;
use Yii;

use app\models\Raporty;
use app\models\RaportySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Opiniujacy;

/**
 * RaportyController implements the CRUD actions for Raporty model.
 */
class RaportyController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Raporty models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RaportySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Raporty model.
     * @param int $id ID
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
     * Creates a new Raporty model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
  
    
    public function actionCreate()
    {
        $model = new Raporty();
          //   $model->kto_opiniuje = implode(",",$_POST['Company']['categories']);

       // $opiniujacy = Opiniujacy::find()->all();
       // $listaOpiniujacy= ArrayHelper::map($opiniujacy, 'id', 'nazwa');

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) ) {
                
                if ($model->kto_opiniuje) {
                    $model->kto_opiniuje = implode(",", $model->kto_opiniuje);
                }
                        $model->save();

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }
               
        //$model->save();

        return $this->render('create', [
            'model' => $model,
           // 'listaOpiniujacy'=> $listaOpiniujacy,
        ]);
    }

    /**
     * Updates an existing Raporty model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
     public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load($this->request->post())) {

            if ($model->kto_opiniuje) {
                $model->kto_opiniuje = implode(",", $model->kto_opiniuje);
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            $model->kto_opiniuje = explode(",", $model->kto_opiniuje);

            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Raporty model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Raporty model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Raporty the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Raporty::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionSendrecommendation($id)
    {   
        $model = $this->findModel($id);
        
        $przedmiot = $model->przedmiot;
        
        $opis = $model->opis;
        
            $message = Yii::$app->mailer->compose()
                    ->setFrom('Aplikacja.Zapotrzebowanie@sw.gov.pl')
                    ->setTo(array('dawid.kordowski@sw.gov.pl'))
                    //->setCc(array('krzysztof.witkowski@sw.gov.pl'))
                    //->setCc(array('arkadiusz.kilichowski@sw.gov.pl'))
                    //->addTo('dawid.kordowski@sw.gov.pl', 'dawid.kordowski@sw.gov.pl')
                    ->setSubject(" Wpłyneło nowe zgłoszenie dotyczące zapotrzebowania na przedmiot - " . $przedmiot )
                    ->setHtmlBody("Proszę o zalogowanie się do aplikacji celem dodania rekomendacji. Poniżej treść zgłoszenia:</br></br>" . "\"<i>" . $opis ."\"</i>")
                    ->send();
                
            return $model = $this->actionIndex();

    }
    public function actionSendaccept($id)
    {   
        $model = $this->findModel($id);
        
        $przedmiot = $model->przedmiot;
        
        $opis = $model->opis;
        
            $message = Yii::$app->mailer->compose()
                    ->setFrom('Aplikacja.Zapotrzebowanie@sw.gov.pl')
                    ->setTo(array('dawid.kordowski@sw.gov.pl'))
                    //->setCc(array('krzysztof.witkowski@sw.gov.pl'))
                    //->setCc(array('arkadiusz.kilichowski@sw.gov.pl'))
                    //->addTo('dawid.kordowski@sw.gov.pl', 'dawid.kordowski@sw.gov.pl')
                    ->setSubject(" Wpłyneło nowe zgłoszenie dotyczące zapotrzebowania na przedmiot - " . $przedmiot )
                    ->setHtmlBody("Proszę o zalogowanie się do aplikacji celem wydania akceptacji/odmowy. Poniżej treść zgłoszenia:</br></br>" . "\"<i>" . $opis ."\"</i>")
                    ->send();
                
            return $model = $this->actionIndex();

    }
    
    
    
}
