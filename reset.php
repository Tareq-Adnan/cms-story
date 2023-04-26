<?php include("includes/header.php"); ?>

<section class="post_LatestStory">
    <div class="container login-form">

    <div class="login_title">
                <h2>পাসওয়ার্ড পুনরায় সেট করুন</h2>
            </div>
        <p class='text-center' style="color: red;">
            <?php echo resetPassowrd() ?>
        </p>
        <form action="" method="post">
            <div class="login">

                <div class="field">
                    <input type="email" name="email" placeholder="ই-মেইল..." class="">
                </div>

                <div class="submit-btn">
                    <input type="submit" name="reset" value="সাবমিট" class="">
                </div>
                <div class="reg">
                    <a href="login.php">লগিন করুন...</a>
                </div>

            </div>
        </form>
    </div>
    </div>
</section>
<?php include "includes/footer.php" ?>