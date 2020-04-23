<?php
session_start();
include_once 'db_books.php';

$obj = new db_books();
$book = $obj->selectOneLine('books',$_GET['id']);
?>

<?php include_once 'header.php' ?>

<div class="kadobagud" aria-hidden="true">
    <div class="angebes-koverla">
        <div class="doveacko-gangeroun">
            <h5>Заказать книги</h5>
            <a href="#" class="valokan-close closemodal" aria-hidden="true">×</a>
        </div>
        <div class="davasgu-kevanud">
            <form action="/mailer/send.php" method="post">
            <input type="text" name="title_book"  value="<?=$book[0]['title_book']?>" hidden>
            <input type="text" name="name" placeholder="Ф.И.О"/><br>
            <input type="text" name="address" placeholder="Адрес"/><br>
            <input type="number" name="quantity" placeholder="Количество книг"/>
                <input style="cursor: pointer;" type="submit">
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
   <div class="row">
    <div class="col-2"></div>
<div class="col-8">
<p style="text-align: center;"><img  class="img-fluid" src="/images/<?=$book[0]['image']?>.jpg" id="img" alt=""></p>
    <hr>
    <p style="text-align: center;"><?=$book[0]['title_book']?></p>
    <div class="form-group">
        <textarea style="resize: none;" class="form-control" id="exampleFormControlTextarea1" rows="6"><?=$book[0]['description']?></textarea>
    </div>
    <p class="butt_mail" style="margin-top: 40px; text-align: center; color: white;"><a href="#" style="text-decoration: none;color: white; " class="dakisvan valokan-big openmodal"><?=$book[0]['cost'].'$'?></a></p>
</div>
    <div class="col-2"></div>
   </div>
</div>

<script>
    $('.openmodal').click(function (e) {
        e.preventDefault();
        $('.kadobagud').addClass('midsalod');
    });
    $('.closemodal').click(function (e) {
        e.preventDefault();
        $('.kadobagud').removeClass('midsalod');
    });
</script>


<?php include_once 'footer.php' ?>
