<?php
require_once "db.php";

function Headers()
{
    // Get Website header information
    $header_stmt = $conn->prepare("SELECT app_name, 
                                            Uni_name, 
                                            Faculty_name, 
                                            Program_name, 
                                            Faculty-Uni_logo, 
                                            Program_logo 
                                    FROM application_data");
    $header_stmt->execute();
    $header_result = $header_stmt->get_result();
    $header_row = $header_result->fetch_assoc();
    ?>
    <header>
        <img class="logo" src="./images/<?=$header_row['Faculty-Uni_logo']?>" alt="" />
        <div class="header-title">
            <h3 class="univ-name"><?=$header_row["Uni_name"]?></h3>
            <h4 class="facu-name"><?=$header_row["Faculty_name"]?></h4>
            <h4 class="prog-name"><?=$header_row["Program_name"]?></h4>
            <h1 class="project-title">
                <?=$header_row["app_name"]?>
            </h1>
        </div>
        <img class="logo" src="./images/<?=$header_row['Program_logo']?>" alt="" />
    </header>
    <?php
}