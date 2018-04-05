<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Tag;

class TagController extends Controller
{
    public $layout = 'base';

    public function actionIndex()
    {
        $tags = Tag::find()->all();

        return $this->render('index', [
            'tags' => $tags,
        ]);
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionStore()
    {
        $request = Yii::$app->request; 
        $session = Yii::$app->session;
        $tag = new Tag();

        $tag->title = $request->post('title');
        $tag->status = $request->post('status');
        
        if ($tag->validate()) {
            $tag->save();
            $session->setFlash('success', 'Tag created');
            return $this->redirect(['index']);
        } else {
            foreach ($tag->errors as $error) {
                $session->addFlash('danger', $error);
            }

            return $this->redirect(['create']);
        }
    }
}
