<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 05.07.2019
 * Time: 11:28
 */

namespace app\controllers;

use yii\web\Controller;
use Yii;
use yii\helpers\Url;

class AppController extends Controller
{
    public function init(){
        $city = Yii::$app->request->get('city');
        $session = Yii::$app->session;
        $session->open();
        $subdomain = $session['city'];
        $session->close();
        if($subdomain !=null and $subdomain != idn_to_utf8($city)){
           // return $this->redirect(Url::to('http://' . $subdomain . '.' . DOMAIN));
        }
    }

    protected function setMeta($title=null, $keywords=null, $description=null){
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }
}