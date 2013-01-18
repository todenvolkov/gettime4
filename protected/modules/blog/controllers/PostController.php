<?php
class PostController extends YFrontController
{
    public $layout='//layouts/newspage';

    public function actionShow($slug)
    {


        $post = Post::model()->with(
            'blog',
            'createUser'
        )->find('t.slug = :slug', array(':slug' => $slug));

        if(!$post)
            throw new CHttpException(404, Yii::t('blog', 'Page not found!'));

        $this->render('show', array(
            'post' => $post,
        ));
    }
}