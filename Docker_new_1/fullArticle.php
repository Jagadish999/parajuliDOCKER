<?php
function complete($pdo, $id){
    $latestArticleQuery = "SELECT * FROM article WHERE id = $id";
    $latestArticle = $pdo->query($latestArticleQuery);

    $articleList = "";
    foreach($latestArticle as $articleData){
        
        $articleList .= '<h1>'.$articleData['title'].'</h3>';
        $articleList .= '<p>'.$articleData['content'].'</p>';
        $articleList .= '<em>'.$articleData['publishDate'].'</em>';

    }
    return $articleList;
}
echo complete($pdo, (int)$_GET['articleId']);

?>