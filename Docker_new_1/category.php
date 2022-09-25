<?php
    function categoryArticle($pdo, $id){
        $latestArticleQuery = "SELECT * FROM article WHERE categoryId = $id";
        $latestArticle = $pdo->query($latestArticleQuery);

        $articleList = "";
        foreach($latestArticle as $articleData){
            
            $articleList .= '<h3><a class="articleLink"  href = "index.php?show=complete&articleId='.$articleData['id'].'">'.$articleData['title'] . '<br>' . $articleData['publishDate'] .'</a></h3>' . '<br>';
        }
            return $articleList;
    }
    echo categoryArticle($pdo, (int)$_GET['id']);
?>