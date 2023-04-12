<?php include 'includes/header.php' ?>

<section class="LatestStory">

    <div class="container">

        <div class="content">
            <div class="card-img">
            <?php

            $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 1";
            $run = mysqli_query($connection, $query);
            while ($data = mysqli_fetch_assoc($run)) {
           ?>
                <img class="" src="images/<?php echo $data['post_image'] ?>" alt="" />
            </div>

            <div class="description">
                <h2 class="title">
                    <?php echo $data['post_title']; ?>
                </h2>
                <p class="author">
                    পোস্ট করেছেনঃ
                    <?php echo $data['post_author']; ?><span class="time">
                        <?php echo $data['post_date']; ?>
                    </span>
                </p>
                <p class="short">
                    <?php echo substr($data['post_content'],0,400); ?>
                </p>
                <a href="post.php?view=<?php echo $data['post_id'] ?>" class="btn btn-success b">আরও পড়ুন...</a>
            </div>
            <div class="search-bar">
                <input class="hidden" type="input" placeholder="এখানে লিখুন..." />
                <a href="" class="btn btn-primary"><i class="bi bi-search"></i> খুজুন</a>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
<section class="more">
    <div class="container">

        <div class="grid">
            <?php

            $query = "SELECT * FROM posts";
            $run = mysqli_query($connection, $query);

            while ($data = mysqli_fetch_assoc($run)) {
                ?>
                <div class="card" style="width: 18rem;">
                    <div class="inner">
                        <img class="card-img-top" style="max-height:200px;width:100%" src="images/<?php echo $data['post_image'] ?>" alt="Card image cap" />
                    </div>

                    <div class="card-body">
                        <h2 class="card-title">
                            <?php echo $data['post_title'] ?>
                        </h2>
                        <p class="card-text">
                            <?php echo substr($data['post_content'], 0, 200) ?><br>
                            <a href="post.php?view=<?php echo $data['post_id'] ?>" class="btn btn-primary">সম্পূর্ণ
                                পড়ুন...</a>
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php include "includes/footer.php" ?>