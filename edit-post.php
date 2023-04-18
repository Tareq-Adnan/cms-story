<?php include 'includes/header.php';

if (isset($_GET['edit'])) {
    $post_id = $_GET['edit'];
}
// query for fetching posts data from database
$query = "SELECT * FROM posts WHERE post_id='$post_id'";
$run = mysqli_query($connection, $query);
confirmation($run);
while ($data = mysqli_fetch_assoc($run)) {
    $title = $data['post_title'];
    $author = $data['post_author'];
    $content = $data['post_content'];
    $tag = $data['post_tags'];
    $category = $data['post_category_id'];
    $image = $data['post_image'];
}

EditPost($post_id);

?>
<section class="post_LatestStory">
    <div class="container add-post">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="story_title">
                <h2>পরিবর্তন করুন</h2>
            </div>

            <div class="add-post">
                <div class="add_post_field">
                    <input type="text" name="title" placeholder="গল্পের শিরোমাম" value="<?php echo $title ?>">
                </div>

                <div class="add_post_field">
                    <img class="img-fluid rounded my-2" style="max-width:100vh " src="images/<?php echo $image ?>"
                        alt="">
                    <label for="pic" class="label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-images" viewBox="0 0 16 16">
                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                            <path
                                d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                        </svg>
                        <span id="pic-label">ছবি সংযোগ করুন</span></label>
                    <input type="file" name="image" id="pic">
                </div>

                <div class="add_post_field">
                    <label for="category">লেখকের নাম</label><br>
                    <input type="text" readonly placeholder="লেখকের নাম" name="author"
                        value="<?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?>">
                </div>
                <div class="add_post_field">
                    <input type="text" placeholder="গল্পের ট্যাগ" name="tag" value="<?php echo $tag ?>">
                </div>
                <div class="add_post_field">
                    <label for="category">গল্পের ধর</label> <br><select class="dropdown" name="category" id="">
                        <?php selectCat() ?>
                    </select>
                </div>
                <div class="add_post_field">
                    <textarea placeholder="গল্প লিখুন..." name="content" rows="6"
                        class=""><?php echo $content ?></textarea>
                </div>
                <div class="add_post_field_btn">
                    <input type="submit" name="editPost" value="সংরক্ষণ করুন" class="">
                </div>

            </div>
        </form>
    </div>
</div>
</section>
<?php include "includes/footer.php" ?>

<!-- a javascript function for custom image chooice  -->
<script type="text/javascript">
    const picbtn = document.getElementById('pic');
    const label = document.getElementById('pic-label');

    picbtn.addEventListener('change', function () {
        if (picbtn.value) {
            label.innerHTML = picbtn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
        }
    });
</script>