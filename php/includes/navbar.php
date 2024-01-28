<?php
if (!isset($_SESSION)) {
    session_start();

}

if (!isset($_SESSION['aksesi'])) {
    $_SESSION['aksesi'] = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/navbar.css" />
</head>

<body>
    
            <nav class="navbar">
                <p>African Wildlife</p>
            <ul class="nav-links">
                <?php
                if ($_SESSION['aksesi'] != 0) {
                    echo '

                    <li><a href="../admin/dashboard.php"> ADMIN </a></li>

                    ';
                    
                } else {
                    echo '
                    
                     <li><a href="../faqet/wht.php"> WHAT WE DO </a></li>
                     <li><a href="../faqet/news.php"> NEWS </a></li>
                     <li><a href="../faqet/contact-us.php"> CONTACT US </a></li><li class="nav-item">
                     
                    ';
                }

                
                if (isset($_SESSION['emri'])) {
                    if ($_SESSION['aksesi'] != 0) {
                        echo
                            '
                            <li><a href="../faqet/wht.php"> WHAT WE DO </a></li>
                            <li><a href="../faqet/news.php"> NEWS </a></li>
                            <li><a href="../faqet/contact-us.php"> CONTACT US </a></li><li class="nav-item">
                            <a href="../funksione/logout.php">LOG OUT</a>
                        </li>';
                    } else {
                        echo '    
                        
                        <li><a href="../funksione/logout.php">LOG OUT</a></li>';
                    }
                } else {
                    echo
                        '
                        <li><a href="login.php"> <i class="fa-solid fa-user"></i> </a></li>
                        ';
                }
                ?>
                 

            </ul>
            

            
        </nav>
</body>

</html>