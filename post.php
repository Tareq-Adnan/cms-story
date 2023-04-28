<?php include 'includes/db.php';

if (isset($_GET['view'])) {
    $post_id = $_GET['view'];

    // fetching specific posts data from databae upon user request
    $query = "SELECT * FROM posts JOIN users ON post_user_id=user_id WHERE post_id='{$post_id}'";
    $run = mysqli_query($connection, $query);
    //confirmation($run);
    while ($data = mysqli_fetch_assoc($run)) {
        $post_titile = $data['post_title'];
        $post_content = $data['post_content'];
        $post_author = $data['first_name'] . " " . $data['last_name'];
        $post_date = $data['post_date'];
        $post_image = $data['post_image'];
        $post_cat=$data['post_category_id'];
    }
}


?>
<?php include("includes/header.php");
comment(); //method which get the post comment request.
?>
<section class="post_LatestStory">
    <div class="container col-8 ">
        <div class="post_content">

            <div class="post_description">
                <h2 class="post_title">
                    <?php echo $post_titile ?>
                </h2>
                <p class="post_author">
                    পোস্ট করেছেনঃ
                    <?php echo $post_author ?><span class="time">
                        <?php echo $post_date ?>
                    </span>
                </p>

                <pre class="view">
                    <?php echo "<br>".$post_content ?>
                </pre>

            </div>
            <div class="post_card-img">
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="img" />
            </div>
        </div>
    </div>
    <div class="Related-post col-3">
        <h3>
            আরও পড়ুন<i class="bi bi-caret-right-fill"></i>
        </h3>

        <?php
        // query for fetching latest post from database
        $query = "SELECT * FROM posts WHERE post_category_id= $post_cat ORDER BY post_id DESC LIMIT 3";
        $run = mysqli_query($connection, $query);
        while ($data = mysqli_fetch_assoc($run)) {
            ?>
            <a class="text-decoration-none" href="post.php?view=<?php echo $data['post_id'] ?>">
                <div class="contentp">
                    <div class="more-img">
                        <img class="" src="images/<?php echo $data['post_image'] ?>" alt="" />
                    </div>

                    <div class="description">
                        <h4 class="title">
                            <?php echo $data['post_title']; ?>
                        </h4>

                        <p class="short"  style="color:black">
                            <?php echo substr($data['post_content'], 70, 200); ?>
                        </p>

                    </div>
                </div>
            </a>
        <?php } ?>
    </div>
</section>


<?php include 'share.php' ?>
<?php include 'comment.php' ?>
<?php include "includes/footer.php" ?>