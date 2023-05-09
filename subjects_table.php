<?php
require_once "db.php";
require_once "functions.php";

if (session_status() === PHP_SESSION_NONE)
{
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php Head("جدول الأعمال"); ?>
<body dir="rtl">
    <?php Headers(); ?>
    <?php if (is_logged_in()) { ?>
        <?php Nav(); ?>
        <?php
//        $subject_table_stmt = $conn->prepare("SELECT
//                                                        meeting_number,
//                                                        meeting_date,
//                                                        subject_name,
//                                                        subject_details
//                                                    FROM
//                                                        p39_subject
//                                                    JOIN p39_meeting ON p39_subject.meeting_id = p39_meeting.meeting_id
//                                                                    AND p39_meeting.is_current = 1
//                                                    ORDER BY
//                                                        - p39_subject.order_id
//                                                    DESC");
        $meeting_stmt = $conn->prepare("SELECT 
                                                    meeting_id,
                                                    meeting_number, 
                                                    meeting_date 
                                                FROM 
                                                    p39_meeting 
                                                WHERE 
                                                    is_current = 1");
        $meeting_stmt->execute();
        $meeting_result = $meeting_stmt->get_result();
        $meeting_row = $meeting_result->fetch_assoc();
        $meeting_id = $meeting_row["meeting_id"];
        $n = 1;
        ?>
        <main class="subjects-table-page">
            <div class="container">
                <div class="title">
                    <h1> جدول الأعمال </h1>
                    <h3>جدول أعمال لجنة إدارة البرامج الجديدة بالكلية مرحلتي البكالريوس والدراسات العليا</h3>
                    <h3>جلسة رقم
                        <span><?= $meeting_row["meeting_number"] ?></span>
                        بتاريخ <span><?= $meeting_row["meeting_date"] ?></span></h3>
                </div>
                <div class="table-container">
                    <table class="subjects-table">
                        <tbody>
                        <?php
                        $subject_table_stmt = $conn->prepare("SELECT 
                                                                        subject_name, 
                                                                        subject_details 
                                                                    FROM 
                                                                        p39_subject 
                                                                    WHERE meeting_id = ?");
                        $subject_table_stmt->bind_param("i", $meeting_id);
                        $subject_table_stmt->execute();
                        $subject_table_result = $subject_table_stmt->get_result();
                        ?>
                        <?php while ($subject_table_row = $subject_table_result->fetch_assoc()) { ?>
                            <tr class="subject-row">
                                <td>الموضوع <?= $n ?></td>
                                <td>
                                    <strong><?= $subject_table_row["subject_name"] ?></strong>
                                    <p><?= $subject_table_row["subject_details"] ?></p>
                                    <img src="" alt="">
                                </td>
                            </tr>
                            <tr class="decision-row">
                                <td>القرار</td>
                                <td>
                                    <p></p>
                                </td>
                            </tr>
                            <?php $n++ ?>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="print-container">
                    <button class="btn-basic" onclick="window.print()">طباعة</button>
                </div>

            </div>
        </main>
    <?php } ?>
    <?php footer(); ?>

    <!-- Js Scripts and Plugins -->
    <script type="module" src="./js/main.js"></script>

    <!-- font Awesome -->
    <script src="https://kit.fontawesome.com/eb7dada2f7.js" crossorigin="anonymous"></script>
</body>

</html>