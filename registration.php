<?php include("includes/header.php"); 
registration();//method which catch registration form data.
?>
<section class="post_LatestStory">
    <div class="container login-form">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="login_title">
                <h2>সাইন আপ</h2>
            </div>
            <div class="login">
                <?php echo registration(); ?>
                <div class="field">
                    <input type="text" placeholder="ইউজারনেম..." name="username" required>
                </div>

                <div class="field">
                <label for="pic" class="label2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-images" viewBox="0 0 16 16">
                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                            <path
                                d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                        </svg>
                        <span id="pic-label">ছবি সংযোগ করুন</span></label>
                    <input type="file" name="image" id="pic">
                </div>
                <div class="field">
                    <input type="text" placeholder="নামের প্রথম অংশ..." name="first_name" required>
                </div>
                <div class="field">
                    <input type="text" placeholder="নামের শেষ অংশ..." name="last_name" required>
                </div>

                <div class="field">
                    <input type="password" placeholder="পাসওয়ার্ড..." name="password" class="" required>
                </div>
                <div class="field">
                    <input type="email" placeholder="ই-মেইল..." name="email" class="" required>
                </div>


                <div class="submit-btn">
                    <input type="submit" name="registration" value="সাবমিট" class="">
                </div>

            </div>
        </form>
    </div>
    </div>
</section>


<?php include "includes/footer.php" ?>
<!-- function for custom image choose -->
<script type="text/javascript">
    const picbtn = document.getElementById('pic');
    const label = document.getElementById('pic-label');

    picbtn.addEventListener('change', function () {
        if (picbtn.value) {
            label.innerHTML = picbtn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
        }
    });
</script>