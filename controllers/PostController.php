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
        return $this->render('index', [ 'posts' => Post::find()->all(), ]);
    }

    public function actionView($id)
    {
        $post = Post::findOne($id);

        $user_ip = Yii::$app->request->userIP;
        
        $view = $post->getViews()->where(['user_ip' => $user_ip])->one();

        if ($view) {
            $view->touch('updated_at');
        } else { 
            $new_view = new View();
            $new_view->post_id = $id;
            $new_view->user_ip = $user_ip; 
            $new_view->save();

            $post->updateCounters(['number_views' => 1]);
            $post->save();
        }

        return $this->render('view', ['post' => $post]);
    }

    public function actionCreate()
    {
        return $this->render('create', ['tags' => Tag::find()->all()]);
    }

    public function actionStore()
    {
        $request = Yii::$app->request;
        $session = Yii::$app->session;

        $post = new Post();

        if ($post->load($request->post(), 'post') && $post->validate()) {
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

        if ($post->load($request->post(), 'post') && $post->validate()) {
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
