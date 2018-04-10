<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Post;
use app\models\Tag;
use app\models\View;

class PostController extends Controller
{
    public $layout = 'base';

    public function actionIndex()
    {
        return $this->render('index', [
            'posts' => Post::find()->all(),
        ]);
    }

    public function actionView($id)
    {
        $user_ip = Yii::$app->request->userIP;
        $view = View::find()
            ->where(['post_id' => $id, 'user_ip' => $user_ip])
            ->one();

        if (!$view) {
            $view = new View();
            $view->post_id = $id;
            $view->user_ip = $user_ip; 
            $view->created_at = date('Y-m-d H:i:s', time());
            $view->save();
        }

        return $this->render('view', [
            'post' => Post::findOne($id),
        ]);
    }

    public function actionCreate()
    {
        return $this->render('create', [
            'tags' => Tag::find()->all(),
        ]);
    }

    public function actionStore()
    {
        $request = Yii::$app->request;
        $session = Yii::$app->session;

        $post = new Post();
        //print_r($request->post());die;
        $post->title = $request->post('title');
        $post->body = $request->post('body');
        $post->created_at = date('Y-m-d H:i:s', time());
        $post->updated_at = date('Y-m-d H:i:s', time());

        if ($post->validate()) {
            $post->save();
            if ($request->post('tags')) {
                foreach ($request->post('tags') as $tag_id) {
                    $tag = Tag::findOne($tag_id);
                    $post->link('tags', $tag);
                }
            }
            $session->setFlash('success', 'Post created.');
            return $this->redirect(['view', 'id' => $post->id]);
        } else {
            $session->setFlash('danger', $post->errors);
            return $this->redirect(['create']);
        }
    }

    public function actionEdit($id)
    {
        return $this->render('edit', [
            'post' => Post::findOne($id),
            'tags' => Tag::find()->all(),
        ]);
    }

    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $session = Yii::$app->session;

        $post = Post::findOne($id);
        $post->title = $request->post('title');
        $post->body = $request->post('body');
        $post->updated_at = date('Y-m-d H:i:s', time());

        if ($post->validate()) {
            $post->save();
            
            if ($request->post('tags')) {
                foreach ($post->tags as $tag) {
                    $post->unlink('tags', $tag, true);
                }
                foreach ($request->post('tags') as $tag_id) {
                    $tag = Tag::findOne($tag_id);
                    $post->link('tags', $tag);
                }
            }
 
            $session->setFlash('success', 'Post updated');
            return $this->redirect(['view', 'id' => $post->id]);
        } else {
            $session->setFlash('danger', $post->errors);
            return $this->redirect(['create']);
        }
    }

    public function actionDelete($id)
    {
        $post = Post::findOne($id);
        $post->delete();

        Yii::$app->session->setFlash('success', 'Post deleted.');

        return $this->redirect(['index']);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
