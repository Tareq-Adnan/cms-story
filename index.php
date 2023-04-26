<?php include 'includes/header.php' ?>

<section class="LatestStory">
    <div class="container">

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                // query for fetching latest post from database
                $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 3";
                $run = mysqli_query($connection, $query);
                while ($data = mysqli_fetch_assoc($run)) {
                    ?>
                    <div class="content swiper-slide">
                        <div class="card-img">
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
                                <?php echo substr($data['post_content'], 0, 300); ?>
                            </p>
                            <a href="post.php?view=<?php echo $data['post_id'] ?>" class="btn btn-success b">আরও পড়ুন...</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="search-bar">
        <form action="search.php" method="post">
            <input class="hidden" name="value" type="text" placeholder="এখানে লিখুন..." />
            <button type="submit" name='search' class="btn btn-primary a"><i class="bi bi-search"></i>
                খুজুন</button>
        </form>
    </div>
    </div>
    
    </div>

    </div>
</section>

<!-- recent posts list Section-->
<section class="more">
    <div class="container">

        <div class="grid">
            <?php
            // viewing limited posts at landing page using pagination
            $page_1 = pagination();
            $query = "SELECT * FROM posts";
            $execute = mysqli_query($connection, $query);
            $num = mysqli_num_rows($execute);
            $num = ceil($num / 8);

            $query = "SELECT * FROM posts WHERE post_status='published' LIMIT $page_1,8";
            $execute = mysqli_query($connection, $query);
            while ($data = mysqli_fetch_assoc($execute)) { ?>

                <div class="card" style="width: 16.5rem;">
                    <div class="inner">
                        <img class="card-img-top img-fluid" style="height:200px;width:100%"
                            src="images/<?php echo $data['post_image'] ?>" alt="Card image cap" />
                    </div>

                    <div class="card-body">
                        <h2 class="card-title">
                            <?php if(strlen($data['post_title'])<=52){
                           echo $data['post_title'];
                            }else{
                                  echo substr($data['post_title'],0,43)."...";  
                            }?>
                        </h2>
                        <p class="card-text">
                            <?php echo substr($data['post_content'], 0, 200) ?><br>
                            
                        </p>
                        <a style="position:relative;botton:2px;" href="post.php?view=<?php echo $data['post_id'] ?>"
                                class="view btn btn-primary">সম্পূর্ণ পড়ুন...</a>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <nav class="app-pagination mt-5">
        <ul class="pagination justify-content-center">
            <!-- page number list  -->
            <?php
            for ($i = 1; $i <= $num; $i++) {
                ?>
                <li class="page-item active"><a class="page-link" href="index.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                </li>

            <?php } ?>
        </ul>
    </nav>
</section>
<?php include "includes/footer.php" ?>
<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>