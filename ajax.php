<?php
include_once 'db_books.php';

$a = new db_books();
if(isset($_POST['new_genre'])&&$_POST['new_genre']!='') {
    if($a->exists('genres', 'genre_name',$_POST['new_genre'])) {
        die('genre exist');
    }
    $a->insertOneFieldTable('genres', 'genre_name', $_POST['new_genre']);
}
if(isset($_POST['new_author'])&&$_POST['new_author']!=''){
    if($a->exists('authors', 'name',$_POST['new_author'] )){
        die('author exist');
    }
    $a->insertOneFieldTable('authors', 'name', $_POST['new_author']);
}


