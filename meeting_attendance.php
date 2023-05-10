<?php
require_once "db.php";
require_once "functions.php";

if(session_status() === PHP_SESSION_NONE)
{
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php Head("تسجيل الأعضاء"); ?>
<body dir="rtl">
    <?php Headers(); ?>
    <?php if (isset($_POST["attendance_btn"])) : ?>
        <?php Nav();
	    $attendance_users_stmt = $conn->prepare("SELECT 
    															user_id 
															FROM 
															    p39_attendance 
															WHERE 
															    meeting_id = ?");
	    $attendance_users_stmt->bind_param("i", $_POST["meeting_id"]);
	    $attendance_users_stmt->execute();
	    $attendance_users_result = $attendance_users_stmt->get_result();
	    $attendance_users = array();
	    while ($attendance_users_row = $attendance_users_result->fetch_assoc())
	    {
		    $attendance_users[] = $attendance_users_row["user_id"];
	    }
	    $attendance_users_stmt->close();

        $users_stmt = $conn->prepare("SELECT 
                                                user_id, 
                                                name
                                            FROM 
                                                p39_users 
                                            WHERE 
                                                is_admin = 0 
                                              AND 
                                                is_enabled = 1");
        $users_stmt->execute();
        $users_result = $users_stmt->get_result(); ?>
        <main class="meeting-attendance-page">
            <div class="container">
                <div class="title">
                    <h1>تسجيل الحضور</h1>
                </div>
                <form action="addition_code.php" method="post">
                    <table class="attend-table">
                        <thead>
                        <th>اسم العضو</th>
                        <th>الحضور</th>
                        </thead>
                        <tbody>
                        <?php while ($users_row = $users_result->fetch_assoc()) { ?>
                            <?php if (!in_array($users_row["user_id"], $attendance_users)) { ?>
                                <tr>
                                    <td><?= $users_row["name"] ?></td>
                                    <td>
                                        <input type="hidden" name="<?= $users_row['user_id'] ?>" value="0">
                                        <input type="checkbox" class="check"
                                               name="<?= $users_row['user_id'] ?>" value="1">
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td><?= $users_row["name"] ?></td>
                                    <td>
                                        <input type="hidden" name="<?= $users_row['user_id'] ?>" value="0">
                                        <input type="checkbox" class="check" checked
                                               name="<?= $users_row['user_id'] ?>" value="1">
                                    </td>
                                </tr>
                                <?php } ?>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>اختيار الكل</td>
                            <td><input type="checkbox" class="select-all"/></td>
                        </tr>
                        </tfoot>
                    </table>
                    <input type="hidden" value="<?=$_POST['meeting_id']?>" name="meeting_id">
                    <button type="submit" name="attendance_btn" class="btn-basic">تسجيل الحضور</button>
                </form>
            </div>
        </main>
    <?php endif; ?>
    <?php footer(); ?>

    <!-- Js Scripts and Plugins -->
    <script type="module" src="./js/main.js"></script>

    <!-- font Awesome -->
    <script src="https://kit.fontawesome.com/eb7dada2f7.js" crossorigin="anonymous"></script>
</body>

</html>