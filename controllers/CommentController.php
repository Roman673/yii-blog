<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Comment;

class CommentController extends Controller
{
    public function actionStore($post_id)
    {
        $request = Yii::$app->request;

        $comment = new Comment();
        $comment->body = $request->post('body');
        $comment->post_id = $post_id;
        $comment->created_at = date('Y-m-d H:i:s', time());
        
        if ($comment->validate()) {
            $comment->save();
            Yii::$app->session->setFlash('success', 'Comment created.');
        }
        
        return $this->redirect(['post/view', 'id' => $post_id]);
    }
}

