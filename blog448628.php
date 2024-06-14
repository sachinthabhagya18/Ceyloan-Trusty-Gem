<?php
require "connection.php";
?>

<div class="row">
    <div class="col-lg-12">
        <div class="row blog-item_wrap">

            <!-- blog post start -->

            <?php
            $page = $_GET["p"];
            $offset = 9 * ($page - 1);
            $blog = Database::search("SELECT * FROM `blog` WHERE blog.status_id='1'
            ORDER BY `blogdate` DESC  LIMIT 9 OFFSET " . $offset . ";");
            $blognr = $blog->num_rows;

            for ($y = 0; $y < $blognr; $y++) {
                $blogd = $blog->fetch_assoc();

                if ($blogd != null) {
                    // 
                    $img = Database::search("SELECT * FROM `blog_img` WHERE `blog_id`='" . $blogd["id"] . "';");
                    $imgrow = $img->fetch_assoc();

            ?>
                    <div class="col-lg-4">
                        <div class="blog-item">
                            <div class="blog-img img-hover_effect">
                                <a href="<?php echo "blog-details.php?id=" . ($blogd['id']); ?>">
                                    <img src="admin/<?php echo $imgrow["img_path"]; ?>" alt="Hiraola's Blog Image">
                                </a>
                                <div class="blog-meta-2">
                                    <?php
                                    $date = $blogd["blogdate"];

                                    ?>
                                    <div class="blog-time_schedule">
                                        <span class="day"><?php echo DateTime::createFromFormat("Y-m-d", $date)->format('d'); ?></span>
                                        <span class="month"><?php echo DateTime::createFromFormat("Y-m-d", $date)->format('M'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="blog-heading">
                                    <h5>
                                        <a href="<?php echo "blog-details.php?id=" . ($blogd['id']); ?>"><?php echo $blogd["title"]; ?></a>
                                    </h5>
                                </div>
                                <div class="blog-short_desc">
                                    <p><?php echo $blogd["note"]; ?>
                                    </p>
                                </div>
                                <div class="hiraola-read-more_area">
                                    <a href="<?php echo "blog-details.php?id=" . ($blogd['id']); ?>" class="hiraola-read_more">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                    // 
                }
            }
            ?>


            <!-- blog post start  end-->

            <!-- pagination start -->
            <?php


            $resultset2 = Database::search("SELECT * FROM `blog`;");
            $n = $resultset2->num_rows;
            $t1 = $n / 9;
            $t2 = intval($t1);  //convert double to int

            if ($n % 9 != 0) {
                $t2 = $t2 + 1;
            }

            ?>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="hiraola-paginatoin-area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <ul class="hiraola-pagination-box">

                                <?php
                                if ($page != 1) {
                                ?>

                                    <li  onclick="m(<?php echo $page - 1; ?>);"><a href="javascript:void(0)"><</a></li>
                                <?php
                                }
                                ?>


                                <?php
                                for ($i = 1; $i <= $t2; $i++) {

                                    if ($i == $page) {
                                ?>

                                        <li class="active" onclick="m(<?php echo $i; ?>);"><a href="javascript:void(0)"><?php echo $i; ?></a></li>

                                    <?php
                                    } else {
                                    ?>

                                        <li onclick="m(<?php echo $i ?>);"> <a href="javascript:void(0)"><?php echo $i; ?></a></li>
                                <?php
                                    }
                                }
                                ?>

                                <?php
                                if ($page != $t2) {
                                ?>
                                    
                                    <li onclick="m(<?php echo $page + 1; ?>)"><a href="javascript:void(0)">></a></li>
                                <?php
                                }
                                ?>


                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>