<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Post;
use app\models\View;

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

        $view = View::find()
            ->where(['post_id' => $post->id])
            ->one();

        if (!$view) {
            $view = new View();
            $view->post_id = $post->id;
            $view->user_ip = Yii::$app->request->userIP;
            $view->created_at = date('Y-m-d H:i:s', time());
            $view->save();
        }

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
        $session = Yii::$app->session;
        $post = new Post();

        $post->title = $request->post('title');
        $post->body = $request->post('body');
        $post->created_at = date('Y-m-d H:i:s', time());
        $post->updated_at = date('Y-m-d H:i:s', time());

        if ($post->validate()) {
            $post->save();
            $session->setFlash('success', 'Post created.');
            return $this->redirect(['view', 'id' => $post->id]);
        } else {
            $session->setFlash('danger', $post->errors);
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
        $post->updated_at = date('Y-m-d H:i:s', time());

        $post->save();

        Yii::$app->session->setFlash('success', 'Post updated');

        return $this->redirect(['view', 'id' => $post->id]);
    }

    public function actionDelete($id)
    {
        $post = Post::findOne($id);

        $views = View::find()
            ->where(['post_id' => $post->id])
            ->all();

        if ($views) {
            foreach ($views as $view) {
                $view->delete();
            }
        } 

        Yii::$app->session->setFlash('success', 'Post deleted.');

        $post->delete();

        return $this->redirect(['index']);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
