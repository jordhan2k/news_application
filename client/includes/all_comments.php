<?php
$article_id = $_GET['article_id'];
$cmtUrl = "http://localhost:8080/news_application/web_service/api/comment/get_comments_by_article.php?article_id=".$article_id;

$cmt = curl_init($cmtUrl);
curl_setopt($cmt, CURLOPT_RETURNTRANSFER, true);
$cmtResponse = curl_exec($cmt);

$cmtResult = json_decode($cmtResponse, true);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<div class="comments-area">
<h4>All Comments</h4>

    <?php
    if ($cmtResult['message'] ?? NULL) {
        echo $cmtResult['message'];
    } else {
          foreach ($cmtResult as $cmtkey => $cmtValue) :
    ?>
            <div class="comment-list">
                <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                        <div class="thumb">
                            <img src="img/blog/c1.png" alt="">
                        </div>
                        <div class="desc">
                            <p class="comment">
                                Multiply sea night grass fourth day sea lesser rule open subdue female fill which them Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                            </p>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <h5>
                                        <a href="#"><?php echo $cmtValue['email'] ?></a>
                                    </h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                </div>

                                <div class="reply-btn">
                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    <?php
        endforeach;
    } ?>
</div>