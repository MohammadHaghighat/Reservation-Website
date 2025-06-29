<?php
require_once "model/Mlocation.php";
$user = new user();


switch ($action) {
    case "index" :
        $report = [];
        $report['product'] = 0;
        $report['income'] = 0;
        $report['comment'] = 0;
        $report['order'] = 0;

        if ($user->isAdmin($_SESSION['userId'])){
            $report['user'] = $user->usersCount();
            //$report['product'] = $pro->productsCount();
            //$report['comment'] = $comment->commentsCount();
            //$report['order'] = $order->ordersCount();
            //$report['income'] = $order->income();
        }
        else{
            $user_id = $_SESSION['userId'];
            $report['user_created_date'] = $user->getUser($user_id)['created_at'];
            //$report['comment'] = $comment->userCommentsCount($user_id);
            //$report['order'] = $order->userOrdersCount($user_id);
            //$report['income'] = $order->userIncome($user_id);
        }
        break;
}
if (file_exists("view/$controller/$action.php"))
    include "view/$controller/$action.php";

?>