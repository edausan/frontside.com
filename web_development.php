<?php 
    define('TITLE', 'Web Development');
    $bodyClass = 'webdev-page';
    include('header.php');

    $banner = 'banner-2';
    $title  =  'Web Development';
    include('include/banner_small.php');

    include('db/db-connect.php');
    $sql = "SELECT * FROM fs_web";
    $result = $mysqli->query($sql);
        
    if ($result->num_rows > 0) {
        // output data of each row
        $results = array();

        while ($res = $result->fetch_assoc())
        {
            $results[] = $res;
        } ?>
        <section class="fs-container">
            <article class="fs-row">
                <section class="webdev-wrapper">
                    <ul>
                        <?php foreach ($results as $result) : ?>
                            <li style="display: inline-block; vertical-align: top;">
                                <div class="thumbnail-wrapper">
                                    <a href="<?php echo $result['web_url']; ?>" target="_blank">
                                    <figure class="thumbnail-container">
                                        <img class="thumbnail" style="width: 250px;" src="<?php echo $result['web_thumbnail']; ?>" alt="">
                                        
                                        <div class="caption"><?php echo $result['web_name']; ?></div>
                                    </figure>
                                    </a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            </article>
        </section>
    
    
    <?php } else {
        echo "0 results";
    }
    $mysqli->close();
?>

<?php include('footer.php'); ?>