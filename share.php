
<div class="icon-bar">
  <a href="https://www.facebook.com/sharer.php?u=<?php echo share() ?>" class="facebook"><i class="bi bi-facebook"></i></a>
  <a href="https://www.twitter.com/share?url=<?php echo share()?>&text=<?php echo $post_titile ?>" class="twitter"><i class="bi bi-twitter"></i></a>
  <a href="https://api.whatsapp.com/send?text=<?php echo urlencode($post_titile)?> <?php echo share()?>" class="google"><i class="bi bi-whatsapp"></i></a>
  <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo share() ?>&title=<?php echo $post_titile ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
</div>
