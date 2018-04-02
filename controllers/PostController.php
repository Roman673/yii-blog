<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Post;

class PostController extends Controller
{
    public $layout = 'base';

    public function actionIndex()
    {
        $posts = Post::find()->all();

        return $this->render('index', [
            'posts' => $posts,
        ]);
    }

    public function actionView($id)
    {
        $post = Post::findOne($id);

        return $this->render('view', [
            'post' => $post,
        ]);
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionStore()
    {
        $request = Yii::$app->request;

        $post = new Post();

        $post->title = $request->post('title');
        $post->body = $request->post('body');

        if ($post->validate()) {
            $post->save();
            return $this->redirect(['view', 'id' => $post->id]);
        } else {
            $errors = $post->errors;
            return $this->redirect(['create']);
        }
    }

    public function actionEdit($id)
    {
        $post = Post::findOne($id);

        return $this->render('edit', [
            'post' => $post,
        ]);
    }

    public function actionUpdate($id)
    {
        $request = Yii::$app->request;

        $post = Post::findOne($id);

        $post->title = $request->post('title');
        $post->body = $request->post('body');

        $post->save();

        return $this->redirect(['view', 'id' => $post->id]);
    }

    public function actionDestroy($id)
    {
        $post = Post::findOne($id);
        
        $post->delete();

        return $this->redirect(['index']);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
