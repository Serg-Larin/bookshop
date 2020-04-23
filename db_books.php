<?php


class db_books
{
    public $config;
    public $connect;

    public function __construct()
    {
        $this->config  = include 'Config.php';
        $this->connect = new PDO('mysql:host=localhost;dbname=bookshop','root','Temp123');
    }

    public function selectAllFrom($table){
        $result = $this->connect->query("SELECT * FROM $table");
        $result = $result->fetchAll();
        return $result;
        }

    public function selectOneLine($table,$id){
        $result = $this->connect->query("SELECT * FROM $table WHERE id = $id");
        $result = $result->fetchAll();
        return $result;
    }
    public function deleteOneField($table,$id){
        $this->connect->query("DELETE FROM $table WHERE id = $id");
    }
    public function updateOneField($table,$field,$value,$id){
        $this->connect->query("UPDATE $table SET `$field` = '$value' WHERE `id` = $id");
    }

    public function belongsToMany($table1,$table2,$table2_simple,$simple_id,$var1){
        $result = $this->connect->query("SELECT * FROM $table1 b JOIN $table2 bg ON b.id=bg.$table2_simple WHERE $simple_id = $var1");
        $result = $result->fetchAll();
        return $result;
    }
    public function exists($table,$field,$value){
        $result = $this->connect->query("SELECT * FROM $table WHERE `$field` = '$value'");
        $result = $result->fetchAll();
        print_r($result);
        return $result[0][$field]!=''? true : false;
    }
    public function getResults($sql){
        $result = $this->connect->query($sql);
        $result = $result->fetchAll();
        return isset($result) ? $result : [];
    }
    public function insertOneFieldTable($table,$field,$value){
        $this->connect->query("INSERT INTO $table ($field) VALUE('$value');");
    }


    public function insertNewBook($author_id,$genre_id,$title_book,$description,$cost,$image=''){
        $sql2 = 'SELECT id FROM books WHERE `title_book` = \''.$title_book.'\'';
        $result_query_book  = $this->getResults($sql2);

        if(!isset($result_query_book[0]['id'])){
            $sql4 = "INSERT INTO books (title_book,description,cost,image) VALUES ('$title_book','$description','$cost','$image')";
            $this->connect->query($sql4);
            $sql4 = "SELECT id FROM books WHERE id = LAST_INSERT_ID()";
            $result_query_book = $this->getResults($sql4);
            $result_query_book = $result_query_book[0]['id'];
        }else $result_query_book = $result_query_book[0]['id'];

        for($i=0;$i<count($author_id); $i++) {
            if($author_id[$i]==0) continue;
            $sql = "INSERT INTO book_author (`book_id`,`author_id`) VALUES ($result_query_book, $author_id[$i])";
            $this->connect->query($sql);
        }
        for($i=0;$i<count($genre_id); $i++) {
            if($genre_id[$i]==0) continue;
            $sql = "INSERT INTO book_genre (`book_id`,`genre_id`) VALUES ($result_query_book,$genre_id[$i])";
            $this->connect->query($sql);
        }

        }

        public function joins($tableFindField1,$tableFindField2='',$tableFrom,$tableJoin,$compare1,$compare2,$conformity1,$conformity2){
            $sql = "SELECT $tableFindField1,$tableFindField2 
                    FROM $tableFrom g JOIN $tableJoin gb ON g.$compare1 = gb.$compare2 
                    WHERE gb.$conformity1 = $conformity2";
            $result = $this->connect->query($sql);
            $result = $result->fetchAll();
            return $result;
        }

        public function update($value1,$value2,$value3,$value4,$id){
        $value2 = str_replace('\'',"\\'",$value2);
        $sql = "UPDATE books SET `title_book` = '$value1' , `description` = '$value2' , `cost` = '$value3' , `image` = '$value4' WHERE `id` = '$id'";
        echo $sql;
            $this->connect->query($sql);
    }


    }





