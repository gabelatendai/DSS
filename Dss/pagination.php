<?php

/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 15/4/2019
 * Time: 19:54
 */
include "header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php
            $per_page = 3;
            if (isset($_GET['page'])){


                $page =$_GET['page'];
            }
            else{

                $page="";
            }
            if ($page=="" || $page==1){
                $page_1 =0;
            }else{
                $page_1=($page * $per_page) - $per_page;
            }
$db= mysqli_connect("localhost", "root", "","football") or DIE('Connection to host is failed, perhaps the service is down!');
$post="SELECT * FROM team";
$found=mysqli_query($db,$post);
$count=mysqli_num_rows($found);

$count = ceil($count/$per_page );


$query = "SELECT * FROM team LIMIT $page_1, $per_page";
$all_teams= mysqli_query($db,$query);

while ($row=mysqli_fetch_array($all_teams)){
    $post_id = $row['id'];
    $post_title = $row['name'];

    ?>
    <div id="comments" class="comments-area">
        <h2 class="comments-title"> <span>1</span></h2>
        <ol class="comment-list">
            <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1 parent">
                    <div class="comment-body">
                        <footer class="comment-meta">
                            <div class="comment-author vcard">
                                <img alt="img" src="images/logo.jpg" width="40px" height="40px" class="avatar avatar-72 photo"/>
                                <b class="fn"><?php echo $post_title; ?></b>
                            </div>
                            <div class="comment-metadata"><a href="#">Oct 3, 2016</a></div>
                        </footer>
                    </div>
            </li>
        </ol><!-- .comment-list -->
        <!-- Comment Form -->
    </div><!-- Comment Area /- -->
<?php
}
?>


<ul class="pager">
<?php
for ($i = 1; $i<= $count; $i++) {
    if ($i ==$page){
        echo "<li><a class='active_link' href='pagination?page={$i}'>{$i}</a></li>";

    }else{
        echo "<li><a href='pagination?page={$i}'>{$i}</a></li>";

    }

}
?>
</ul>

        </div>
    </div>
</div>
<?php
include "footer.php";
?>
<style>
 .pager li .active_link{

     background: black !important;
 }

</style>
