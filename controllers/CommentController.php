<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Comment;
use app\models\Post;

class CommentController extends Controller
{
    public function actionStore($post_id)
    {
        $session = Yii::$app->session;
        $post = Post::findOne($post_id);
        $comment = new Comment();
        
        if ($comment->load(Yii::$app->request->post(), 'Comment') && $comment->validate()) {
            $comment->link('post', $post);
            $comment->save();

            $post->updateCounters(['number_comments' => 1]);
            $post->save();

            $session->setFlash('success', 'Comment created.');
        } else {
            $session->setFlash('danger', $comment->errors);
            $errors = $comment->errors;
        }
        
        return $this->redirect(['post/view', 'id' => $post_id]);
    }
}

