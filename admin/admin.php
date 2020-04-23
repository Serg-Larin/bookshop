<?php
session_start();
include_once '../db_books.php';
$obj = new db_books();
$update_book = $obj->selectAllFrom('books');
$update_genre = $obj->selectAllFrom('genres');
$update_author = $obj->selectAllFrom('authors');


$error = '';
if ($_REQUEST['add']) {
    if(($_POST['author1']!=''&&($_POST['author2']!=''||$_POST['author3']!=''))&&$_POST['author3']===$_POST['author1']||
        $_POST['author3']===$_POST['author2']||$_POST['author2']===$_POST['author1']){

        echo 'Fields authors must be different';
         }else if(($_POST['genre1']!=''&&($_POST['genre2']!=''||$_POST['genre3']!=''))&&$_POST['genre3']===$_POST['genre1']||
        $_POST['genre3']===$_POST['genre2']||$_POST['genre2']===$_POST['genre1']){
        echo 'Fields genres must be different';
         }
        else if (isset($_REQUEST['author1'],$_REQUEST['genre1'],$_REQUEST['description'],$_REQUEST['cost'])
        &&$_REQUEST['author1'] != '' && $_REQUEST['genre1'] != '' && $_REQUEST['description'] != '' && $_REQUEST['cost'] != '') {
        $obj->insertNewBook([$_REQUEST['author1'],$_REQUEST['author2'],$_REQUEST['author3']],
            [$_REQUEST['genre1'], $_REQUEST['genre2'], $_REQUEST['genre3']],
            $_REQUEST['book_name'], $_REQUEST['description'], $_REQUEST['cost']);
    } else { echo 'Fields with a star(*) must be filled';
        /*проверка количества отправленых авторов есть в методе insert*/
    }
}

if (isset($_REQUEST['book_name'])) {
    if(isset($_REQUEST['book_name'],$_REQUEST['cost'],$_REQUEST['descrip'])&&
        $_REQUEST['book_name']!=''&&$_REQUEST['cost']!=0&&$_REQUEST['descrip']!=''){

//     echo '<pre>';
//        print_r($_REQUEST);
//        echo '<pre>';
//
        $obj->update($_REQUEST['book_name'],$_REQUEST['descrip'],$_REQUEST['cost'],$_REQUEST['image'],$_REQUEST['id']);

   }else {
        echo 'Fields with a star(*) must be filled';
    }

}

?>


<?php include_once '../header.php';

echo $error;
?>

<h1 style="text-align: center;">
    <a class="add_update" href="?update=true">update book</a>
    <a class="add_update" href="?add=true">add book</a>
    <a class="add_update" href="?genres=true">redact genres</a>
    <a class="add_update" href="?author=true">redact authors</a>
</h1>
<hr>

<?php if ($_REQUEST['add'] == true) {
    ?>
    <div class="container">
        <form method="post">

            <div class="form-group">
                <div class="col-8 mx-auto">
                    <input class="form-control" type="text" placeholder="Title your book *" name="book_name">
                </div>
            </div>


            <div class="form-group">
                <div class="col-8 mx-auto">
        <textarea class="form-control"  name="description" rows="5" cols="50">
        </textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-8 mx-auto">
                    <input class="form-control" type="text" placeholder="cost *" name="cost">
                </div>
            </div>

            <div class="form-group">
                <div class="col-5 mx-auto">
                    <select class="form-control form-control-sm" name="author1" id="author1"> <label for="author1">author</label>
                        <option value="" selected>author</option>
                        <?php for($i=0;$i<count($update_author);$i++){?>
                        <option value="<?=$update_author[$i]['id']?>"><?=$update_author[$i]['name']?></option>
                        <?php }?>
                    </select>
                </div>
            </div>


    <div class="form-group">
        <div class="col-5 mx-auto">
            <select class="form-control form-control-sm" name="author2" id="author2" hidden="true">
                <option value="" selected>author</option>
                <?php for($i=0;$i<count($update_author);$i++){?>
                    <option value="<?=$update_author[$i]['id']?>"><?=$update_author[$i]['name']?></option>
                <?php }?>
            </select>
    </div>
    </div>

    <div class="form-group">
        <div class="col-5 mx-auto">
            <select class="form-control form-control-sm" name="author3" id="author3" hidden="true">
                <option value="false" selected>author</option>
                <?php for($i=0;$i<count($update_author);$i++){?>
                    <option value="<?=$update_author[$i]['id']?>"><?=$update_author[$i]['name']?></option>
                <?php }?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-8 mx-auto" style="text-align: center;">
            <span id="add_author" class="btn btn-dark">add author</span>

        </div>
    </div>

    <div class="form-group">
        <div class="margin col-5 mx-auto">
            <select class="form-control form-control-sm" name="genre1" id="genre1" >
                <option value="" selected>genre</option>
                <?php for($i=0;$i<count($update_genre);$i++){?>
                    <option value="<?=$update_genre[$i]['id']?>"><?=$update_genre[$i]['genre_name']?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="form-group"">
    <div class="margin col-5 mx-auto">
        <select class="form-control form-control-sm" name="genre2" id="genre2" hidden="true">
            <option value="" selected>genre</option>
            <?php for($i=0;$i<count($update_genre);$i++){?>
                <option value="<?=$update_genre[$i]['id']?>"><?=$update_genre[$i]['genre_name']?></option>
            <?php }?>
        </select>
    </div>
    </div>

    <div class="form-group"">
    <div class="margin col-5 mx-auto">
        <select class="form-control form-control-sm" name="genre3" id="genre3" hidden="true">
            <option value="false" selected>genre</option>
            <?php for($i=0;$i<count($update_genre);$i++){?>
                <option value="<?=$update_genre[$i]['id']?>"><?=$update_genre[$i]['genre_name']?></option>
            <?php }?>
        </select>
    </div>
    </div>

    <div class="form-group">
        <div class="margin col-8 mx-auto" style="text-align: center;">
            <span id="add_genre" class="btn btn-dark">add genre</span>

        </div>
        <div/>
    </div>

    <div class="form-group"">
    <div class="col-8 mx-auto" style="text-align: center;">
        <input type="submit" style="margin-top: 10px;" value="add book" id="add_button" name="add_button">
    </div>
    </div>
    </form>
    </div>

    <script>
        let count1 = 0;
        let count2 = 0;
        $('#add_author').click(function () {
            $('#author2').removeAttr('hidden');

            count1++;

            if (count1 == 2) {
                $('#author3').removeAttr('hidden');
            }
        });

        $('#author1').val('nihua');
        $('#add_genre').click(function () {
            $('#genre2').removeAttr('hidden');
            count2++;

            if (count2 == 2) {
                $('#genre3').removeAttr('hidden');
            }
        });

    </script>


<?php }
?>
<h5 id="book">
    <?php
    if (isset($_REQUEST['update']) && $_REQUEST['update'] == true) {

        for ($i = 0; $i < count($update_book); $i++) {
            ?>
            <div class="col-12" style="text-align: center;"><a class="books_update"
                                                               href="?select=true&id=<?=$update_book[$i]['id'] ?>"><?= $update_book[$i]['title_book'] ?></a>
            </div>

            <?php

        }
    }

    if (isset($_REQUEST['genres']) && $_REQUEST['genres'] == true) {

        for ($i = 0; $i < count($update_genre); $i++) {
            ?>
            <div class="col-12" style="text-align: center;"><a class="books_update"
                                                               href="?select_genre=true&id=<?=$update_genre[$i]['id']?>"><?= $update_genre[$i]['genre_name'] ?></a>
            </div>

            <?php
        }?>
        <div style="text-align: center; margin-top: 10px;"><input type="text" id="genre" hidden="true">
            <button id="add_genre" hidden="true">+</button>
            <button id="add_new_genre">+</button>

        </div>
        <script>
            let count = 0;
            $('#add_new_genre').on('click',function () {
                count++;
                if(count%2==0){
                    $('#genre').attr('hidden',true);
                    $('#add_genre').attr('hidden',true);
                    $(this).html('+');
                }else {
                    $('#genre').removeAttr('hidden');
                    $('#add_genre').removeAttr('hidden');
                    $(this).html('X');
                }
                $('#add_genre').click(function () {
                    console.log($('#genre').val());
                    $.post("/ajax.php",
                        {
                            new_genre: $('#genre').val()
                        }
                    );

                });
            })
        </script>
        <?php



    }

    if (isset($_REQUEST['author']) && $_REQUEST['author'] == true) {
        for ($i = 0; $i < count($update_author); $i++) {
            ?>
            <div class="col-12" style="text-align: center;"><a class="books_update"
                                                               href="?select_author=true&id=<?= $update_author[$i]['id'] ?>"><?= $update_author[$i]['name'] ?></a>
            </div>

            <?php

        }?>
    <div style="text-align: center; margin-top: 10px;"><input type="text" id="author" hidden="true">
        <button id="add_author" hidden="true">+</button>
        <button id="add_new_author">+</button>
        <script>
            let count1 = 0;
            $('#add_new_author').on('click',function () {
                count1++;
                if(count1%2==0){
                    $('#author').attr('hidden',true);
                    $('#add_author').attr('hidden',true);
                    $(this).html('+');
                }else {
                    $('#author').removeAttr('hidden');
                    $('#add_author').removeAttr('hidden');
                    $(this).html('X');
                }
                $('#add_author').click(function () {
                    console.log($('#author').val());
                    $.post("/ajax.php",
                        {
                            new_author: $('#author').val()
                        }
                    );

                });
            })
        </script>
    <?php
    } ?>


</h5>
<?php
if (isset($_REQUEST['select']) && $_REQUEST['select'] == true && isset($_REQUEST['id'])) {
    $update_book=$obj->selectOneLine('books',$_REQUEST['id']);

    ?>


    <div class="container">

        <!--    <form>-->

        <form action="" >
            <div class="form-group row">

                <div class="col-8 mx-auto">
                    <label for="titlebook">title book *</label>
                    <input type="text" name="book_name" class="form-control" id="titlebook" placeholder="title book"
                           value="<?=$update_book[0]['title_book'] ?>">

                </div>
            </div>
            <div class="form-group row">
                <div class="col-8 mx-auto">
                    <label for="cost">cost *</label>
                    <input type="text" class="form-control" name="cost" id="cost" placeholder="cost"
                           value="<?=$update_book[0]['cost'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-8 mx-auto">
                    <label for="exampleFormControlTextarea1">description *</label>
                    <textarea class="form-control justify-content-center" name="descrip"
                              id="exampleFormControlTextarea1"
                              rows="6" ><?=$update_book[0]['description']?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-8 mx-auto">
                    <label for="cost">image</label>
                    <input type="text" class="form-control" name="image" id="cost" placeholder="image"
                           value="<?=$update_book[0]['image']?>">
                </div>
            </div>
            <input type="text" class="form-control" name="id" id="cost"
                   value="<?=$update_book[0]['id'] ?>" hidden>
            <div class="form-group row">
                <div class="col-1 mx-auto" style="margin-top: 20px;">
                    <input type="submit" class="btn btn-dark" value="update" name="btn_update">
                </div>
            </div>
        </form>
        <!--    </form>-->

    </div>

    <?php
}
if(isset($_REQUEST['select_author'])&&isset($_REQUEST['id'])){
    $author = $obj->selectOneLine('authors',$_REQUEST['id']);
    ?>
    <div style="text-align: center;">
        <form method="post" >
        <input type="text" name="author_name" value="<?=$author[0]['name']?>">
        <input type="text" name="id" value="<?=$author[0]['id']?>" hidden>
            <input type="submit" name="action" value="update">
            <input type="submit" name="action" value="remove">
        </form>
    </div>
    <?php
}
if(isset($_POST['action'])&&isset($_POST['author_name'])&&$_POST['author_name']!=''){
    $obj->updateOneField('authors','name',$_POST['author_name'],$_POST['id']);
}
if(isset($_POST['author_name'])&&$_POST['author_name']!=''&&$_POST['action']=='remove'){
    $obj->deleteOneField('authors',$_POST['id']);
}



if(isset($_REQUEST['select_genre'])&&isset($_REQUEST['id'])){
    $genre = $obj->selectOneLine('genres',$_REQUEST['id']);
    ?>
    <div style="text-align: center;">
        <form method="post" >
            <input type="text" name="genre_name" value="<?=$genre[0]['genre_name']?>">
            <input type="text" name="id" value="<?=$genre[0]['id']?>" hidden>
            <input type="submit" name="action" value="update">
            <input type="submit" name="action" value="remove">
        </form>
    </div>
        <?php
}

        $check = isset($_POST['action']) && isset($_POST['genre_name']) && $_POST['genre_name'] != '';
        if ($check && $_POST['action'] == 'update') {
            $obj->updateOneField('genres', 'genre_name', $_POST['genre_name'], $_POST['id']);
        }
        if ($check && $_POST['action'] == 'remove') {
            $obj->deleteOneField('genres', $_POST['id']);
        }
if(isset($_POST['action'])&&($_POST['genre_name']==''||$_POST['author_name']=='')) {
        echo 'Fields must be filled';
    }
?>
<?php include_once '../footer.php'; ?>
