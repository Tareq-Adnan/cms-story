
<!-- this page is used to show category wise stories -->

<?php include 'includes/header.php';
if (isset($_GET['cat_id'])) {
    $id = $_GET['cat_id'];
    $name = $_GET['name'];
}
?>
<section>
   
    <div class="container">

        <h1 class="text-center my-2"><?php echo $name ?></h1>

        <div class="grid">
            <?php
            $query = "SELECT * FROM posts WHERE post_category_id=$id";
            $run = mysqli_query($connection, $query);

            while ($data = mysqli_fetch_assoc($run)) {?>
                <div class="card" style="width: 18rem;">
                    <div class="inner">
                        <img class="card-img-top img-fluid"
                            src="images/<?php echo $data['post_image'] ?>" alt="Card image cap" />
                    </div>

                    <div class="card-body">
                        <h2 class="card-title">
                            <?php echo $data['post_title'] ?>
                        </h2>
                        <p class="card-text">
                            <?php echo substr($data['post_content'], 0, 200) ?><br>
                            <a style="position:relative;botton:2px;" href="post.php?view=<?php echo $data['post_id'] ?>"
                                class="btn btn-primary">সম্পূর্ণ
                                পড়ুন...</a>
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php include "includes/footer.php" ?>