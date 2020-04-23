<?php
error_reporting(E_ALL);
include_once 'db_books.php';

$a = new db_books();

$genres = $a->selectAllFrom('genres');
$authors = $a->selectAllFrom('authors');
if(isset($_GET['genre_id'])) $books = $a->belongsToMany('books','book_genre','book_id', 'genre_id',$_GET['genre_id']);

if(isset($_GET['author_id'])) $books = $a->belongsToMany('books','book_author','book_id','author_id',$_GET['author_id']);

if(!isset($_GET['genre_id']) && !isset($_GET['author_id'])) $books =$a->selectAllFrom('books');

?>
<?php include_once 'header.php'?>


<div class="container-fluid" id="content" style="margin-bottom:500px; ">
    <div class="row">
        <div class="col-2" >
            <div class="genres">
                <div><h3 style="text-align: center; color: white;">Ganres</h3></div>
                <?php for ($i=0;$i<count($genres);$i++){?>
                <a href="?genre_id=<?=$genres[$i]['id'];?>" style=" margin-left: 0; margin-right: 0;"><div class="criterion" style=" margin: 2px;"><?=$genres[$i]['genre_name'];?></div></a>
            <?php } ?>
            </div>
            </div>

        <div class="col-8" >

            <div class="row">
                <?php
                for ($i=0;$i<count($books); $i++){?>
                <div class=" col-sm-12 col-md-4 col-lg-3" style="text-align: center;">
                   <a href="/book.php/?id=<?=$books[$i]['id']?>">
                        <img class="image" src="/images/<?=$books[$i]['image']?>.jpg" style="width: 135px; height: 175px;margin: 5px; display: table-cell;
            vertical-align: bottom;" alt="<?=$books[$i]['title_book']?>">
                        <p style="text-align: center; text-decoration: none; color: black; width: 100px; "><?=$books[$i]['title_book']?></p>
                    </a>
                </div>
                    <?php  }?>
                </div>
            </div>
        <div class="col-2">
            <div style="width: 180px;border: 1px solid #4A4B4D; border-radius: 5px;">
            <div style="margin: 0;"><h3 style="text-align: center;">Authors</h3></div>
            <?php for ($i=0;$i<count($authors);$i++){?>
                <a href="?author_id=<?=$authors[$i]['id'];?>" style="text-decoration: none; margin-left: 0; margin-right: 0;"><div class="criterion-authors" style="margin: 2px;"><?=$authors[$i]['name'];?></div></a>
            <?php }
            ?>
            </div>
        </div>

        </div>
    </div>


<?php include_once 'footer.php';?>
