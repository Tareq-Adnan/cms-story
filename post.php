<?php include 'includes/db.php';

                    if(isset($_GET['view'])){
                        $post_id=$_GET['view'];

                        // fetching specific posts data from databae upon user request
                        $query="SELECT * FROM posts WHERE post_id='{$post_id}'";
                        $run=mysqli_query($connection,$query);
                        //confirmation($run);
                        while($data=mysqli_fetch_assoc($run)){
                            $post_titile=$data['post_title'];
                            $post_content=$data['post_content'];
                            $post_author=$data['post_author'];
                            $post_date=$data['post_date'];
                            $post_image=$data['post_image'];
                        }
                    }
                
                
                ?>
<?php include("includes/header.php");
comment();//method which get the post comment request.
?>
<section class="post_LatestStory">
    <div class="container">
        <div class="post_content">
                
            <div class="post_description">
                <h2 class="post_title"><?php echo $post_titile ?></h2>
                <p class="post_author">
                    পোস্ট করেছেনঃ <?php echo $post_author ?><span class="time"> <?php echo $post_date ?></span>
                </p>

                <pre class="view">
                    <?php echo $post_content ?>
                </pre>

            </div>
            <div class="post_card-img">
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="img" />
            </div>
        </div>
    </div>
</section>


<?php include 'share.php' ?>
<?php include 'comment.php' ?>
<?php include "includes/footer.php" ?>