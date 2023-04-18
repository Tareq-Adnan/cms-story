<?php include 'includes/header.php';
 if (isset($_POST['search'])) {
    $key = trim($_POST['value']);
}else{
    $key="";
}
?>

<section>

    <div class="container">

        <div class="content">

            <div class="search-bar">
                <form action="" method="post">
                    <input class="hidden" name="value" type="text" placeholder="এখানে লিখুন..." />
                    <button type="submit" name='search' class="btn btn-primary a"><i class="bi bi-search"></i>
                        খুজুন</button>
                </form>
            </div>

        </div>
</section>

<section class="mt-5">
    <div class="container">

        <div class="grid">
            <?php
            // viewing limited posts at search page using pagination and fetching data from databse based on keyword.
            $page_1 = pagination();
            $matchedPostData = "SELECT * FROM posts WHERE post_status='published' AND WHERE post_tags LIKE '%$key%' OR post_title LIKE '%$key%'";
            $executeQuery = mysqli_query($connection, $matchedPostData);
            $rowCount = mysqli_num_rows($executeQuery);
            $rowCount = ceil($rowCount / 8);


            $query = "SELECT * FROM posts WHERE post_tags LIKE '%$key%' OR post_title LIKE '%$key%' LIMIT $page_1,8";
            $execute = mysqli_query($connection, $query);

            while ($data = mysqli_fetch_assoc($execute)) {
                ?>
                <div class="card" style="width: 18rem;">
                    <div class="inner">
                        <img class="card-img-top img-fluid" style="height:200px;width:100%"
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
    <nav class="app-pagination mt-5">
        <ul class="pagination justify-content-center">

            <?php //Showing the total page number using loop.
            for ($i = 1; $i <= $rowCount; $i++) {
                ?>
                <li class="page-item active"><a class="page-link" href="search.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                </li>

            <?php } ?>
        </ul>
    </nav>
</section>
<?php include "includes/footer.php" ?>