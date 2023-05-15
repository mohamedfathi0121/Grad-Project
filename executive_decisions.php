<?php
require_once "db.php";
require_once "functions.php";

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
Head("القرارات التنفيذية");
?>

<body dir="rtl">
<?php Headers();
if (is_admin()) {
    Nav();
    $exec_decisions_stmt = $conn->prepare("SELECT
                                                        m.meeting_number as mn,
                                                        f.formation_number as fn,
                                                        m.meeting_date as md,
                                                        s.subject_number as sno,
                                                        s.subject_details as sd,
                                                        d.decision_details as dd,
                                                        s.subject_name as sn,
                                                        d.needs_action as na,
                                                        d.is_action_done as iad,
                                                        s.subject_id as sid
                                                    FROM
                                                        p39_formation AS f
                                                    JOIN p39_meeting AS m
                                                    ON
                                                        f.formation_id = m.formation_id
                                                    JOIN p39_subject AS s
                                                    ON
                                                        m.meeting_id = s.meeting_id
                                                    JOIN p39_decision AS d
                                                    ON
                                                        s.subject_id = d.subject_id 
                                                            AND 
                                                        d.needs_action = 1
                                                            AND 
                                                        d.is_action_done = 0
                                                    ORDER BY
                                                        m.meeting_date");
    $exec_decisions_stmt->execute();
    $exec_decisions_result = $exec_decisions_stmt->get_result();
    $exec_decisions_exist = $exec_decisions_result->num_rows > 0; ?>
    <main class="exec-decision-content">
        <div class="container">
            <!-- عنوان الصفحة -->
            <div class="decision-title">
                <h1>القرارات التنفيذية</h1>
            </div>
            <?php $decision_count_stmt = $conn->prepare("SELECT
            SUM(d.needs_action = 1 AND d.is_action_done = 1) AS d1,
            SUM(d.needs_action = 1 AND d.is_action_done = 0) AS d0,
            SUM(d.needs_action = 1) AS dall
            FROM
            p39_decision as d");
            $decision_count_stmt->execute();
            $decision_count_result = $decision_count_stmt->get_result();
            $decision_count_row = $decision_count_result->fetch_assoc();
            ?>
            <!-- الفلتر للصفحة -->
            <div class="decision-filter">
                <div class="row">
                    <a class="btn-basic" href="executive_decisions.php?f=all">
                        عرض جميع القرارات (<?= $decision_count_row["dall"] ?>)
                    </a>
                    <a class="btn-basic" href="executive_decisions.php?f=1">
                        عرض القرارات المنفذة فقط (<?= $decision_count_row["d1"] ?>)
                    </a>
                    <a class="btn-basic" href="executive_decisions.php?f=0">
                        عرض القرارات غير المنفذة فقط (<?= $decision_count_row["d0"] ?>)
                    </a>
                </div>
            </div>

	        <?php if (!$exec_decisions_exist && empty($_GET)) { ?>
                <main id="empty" class="empty-meeting">
                    <h4>لا يوجد قرارات غير منفذة حاليًا</h4>
                </main>
	        <?php } elseif ($exec_decisions_exist && empty($_GET)) { ?>
                <!-- القرارات الغير منفذة -->
                <div class="non-executed-dec">
                    <h3>القرارات غير المنفذة</h3>
	                <?php while ($exec_decisions_row = $exec_decisions_result->fetch_assoc()) { ?>
                        <div class="decision-box">
                            <div class="row">
                                <div class="col">
                                    <h4>
                                        مجلس رقم (<?= $exec_decisions_row["mn"] ?>)
                                        بالتشكيل رقم (<?= $exec_decisions_row["fn"] ?>)
                                         بتاريخ <?= $exec_decisions_row["md"] ?>
                                    </h4>
                                    <h4>
                                        رقم الموضوع: <?= $exec_decisions_row["sno"] == NULL
		                                    ? "لا يوجد"
		                                    : $exec_decisions_row["sno"]  ?>
                                    </h4>
                                    <h4>
                                        عنوان الموضوع: <?= $exec_decisions_row["sn"] == NULL
		                                    ? "لا يوجد"
		                                    : $exec_decisions_row["sn"] ?>
                                    </h4>
                                    <h4>
                                        صيغة القرار:
                                        <span class="decision-format">
                                            <?= $exec_decisions_row["dd"] == NULL
	                                            ? "لا يوجد"
	                                            : $exec_decisions_row["dd"] ?>
                                        </span>
                                    </h4>
                                </div>
                            </div>
                            <div class="decision-buttons">
                                <div class="row">
                                    <div class="col">
                                        <button class="btn-basic dec-details-btn">تفاصيل القرار</button>
                                    </div>
                                    <div class="col">
                                        <button class="btn-basic dec-status-btn">حالة تنفيذه</button>
                                    </div>
                                </div>
                                <div class="decision-desc deactive">
                                    <div class="table-container">
                                        <table class="subjects-table">
                                            <tbody>
                                            <tr class="subject-row">
                                                <td>الموضوع (<?= $exec_decisions_row["sno"] ?>)</td>
                                                <td>
                                                    <strong>
                                                        <?= $exec_decisions_row["sn"] == NULL
                                                            ? "لا يوجد"
	                                                        : $exec_decisions_row["sn"] ?>
                                                    </strong>
                                                    <p>
                                                        <?= $exec_decisions_row["sd"] == NULL
	                                                        ? "لا يوجد"
	                                                        : $exec_decisions_row["sd"] ?>
                                                    </p>
                                                    <img src="" alt="">
                                                </td>
                                            </tr>
                                            <tr class="decision-row">
                                                <td>القرار</td>
                                                <td>
                                                    <p>
                                                        <?= $exec_decisions_row["dd"] == NULL
                                                            ? "لا يوجد"
                                                            : $exec_decisions_row["dd"] ?>
                                                    </p>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <form action="update_code.php" class="decision-status deactive" method="post">
                                    <input type="hidden" name="subject_id" value="<?= $exec_decisions_row['sid'] ?>">
                                    <div class="row">
                                        <div class="col">
                                            <h3>تم تنفيذه</h3>
                                            <input type="radio" name="is_action_done" value="1"/>
                                        </div>
                                        <div class="col">
                                            <h3>لم يتم تنفيذه بعد</h3>
                                            <input type="radio" name="is_action_done" value="0" checked/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button class="btn-basic" name="update_decision_action_btn">تأكيد</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } elseif(!empty($_GET)) { ?>
                <?php switch ($_GET["f"]) {
                    case "0": ?>
                        <!-- القرارات الغير منفذة -->
                        <div class="non-executed-dec">
                            <h3>القرارات غير المنفذة</h3>
	                        <?php if (!$exec_decisions_exist) { ?>
                                <main id="empty" class="empty-meeting">
                                    <h4>لا يوجد قرارات غير منفذة حاليًا</h4>
                                </main>
                            <?php } else { ?>
		                        <?php while ($exec_decisions_row = $exec_decisions_result->fetch_assoc()) { ?>
                                <div class="decision-box">
                                    <div class="row">
                                        <div class="col">
                                            <h4>
                                                مجلس رقم (<?= $exec_decisions_row["mn"] ?>)
                                                بالتشكيل رقم (<?= $exec_decisions_row["fn"] ?>)
                                                بتاريخ <?= $exec_decisions_row["md"] ?>
                                            </h4>
                                            <h4>
                                                رقم الموضوع: <?= $exec_decisions_row["sno"] == NULL
								                    ? "لا يوجد"
								                    : $exec_decisions_row["sno"]  ?>
                                            </h4>
                                            <h4>
                                                عنوان الموضوع: <?= $exec_decisions_row["sn"] == NULL
								                    ? "لا يوجد"
								                    : $exec_decisions_row["sn"] ?>
                                            </h4>
                                            <h4>
                                                صيغة القرار:
                                                <span class="decision-format">
                                            <?= $exec_decisions_row["dd"] == NULL
	                                            ? "لا يوجد"
	                                            : $exec_decisions_row["dd"] ?>
                                        </span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="decision-buttons">
                                        <div class="row">
                                            <div class="col">
                                                <button class="btn-basic dec-details-btn">تفاصيل القرار</button>
                                            </div>
                                            <div class="col">
                                                <button class="btn-basic dec-status-btn">حالة تنفيذه</button>
                                            </div>
                                        </div>
                                        <div class="decision-desc deactive">
                                            <div class="table-container">
                                                <table class="subjects-table">
                                                    <tbody>
                                                    <tr class="subject-row">
                                                        <td>الموضوع (<?= $exec_decisions_row["sno"] ?>)</td>
                                                        <td>
                                                            <strong>
		                                                        <?= $exec_decisions_row["sn"] == NULL
			                                                        ? "لا يوجد"
			                                                        : $exec_decisions_row["sn"] ?>
                                                            </strong>
                                                            <p>
											                    <?= $exec_decisions_row["sd"] == NULL
												                    ? "لا يوجد"
												                    : $exec_decisions_row["sd"] ?>
                                                            </p>
                                                            <img src="" alt="">
                                                        </td>
                                                    </tr>
                                                    <tr class="decision-row">
                                                        <td>القرار</td>
                                                        <td>
                                                            <p>
											                    <?= $exec_decisions_row["dd"] == NULL
												                    ? "لا يوجد"
												                    : $exec_decisions_row["dd"] ?>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <form action="update_code.php" class="decision-status deactive" method="post">
                                            <input type="hidden" name="subject_id" value="<?= $exec_decisions_row['sid'] ?>">
                                            <div class="row">
                                                <div class="col">
                                                    <h3>تم تنفيذه</h3>
                                                    <input type="radio" name="is_action_done" value="1"/>
                                                </div>
                                                <div class="col">
                                                    <h3>لم يتم تنفيذه بعد</h3>
                                                    <input type="radio" name="is_action_done" value="0" checked/>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <button class="btn-basic" name="update_decision_action_btn">تأكيد</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
		                    <?php }
	                        } ?>
                        </div>
                        <?php break;

                    case "1":
	                    $exec_decisions_stmt_1 = $conn->prepare("SELECT
                                                        m.meeting_number as mn,
                                                        f.formation_number as fn,
                                                        m.meeting_date as md,
                                                        s.subject_number as sno,
                                                        s.subject_details as sd,
                                                        d.decision_details as dd,
                                                        s.subject_name as sn,
                                                        d.needs_action as na,
                                                        d.is_action_done as iad,
                                                        s.subject_id as sid
                                                    FROM
                                                        p39_formation AS f
                                                    JOIN p39_meeting AS m
                                                    ON
                                                        f.formation_id = m.formation_id
                                                    JOIN p39_subject AS s
                                                    ON
                                                        m.meeting_id = s.meeting_id
                                                    JOIN p39_decision AS d
                                                    ON
                                                        s.subject_id = d.subject_id 
                                                            AND 
                                                        d.needs_action = 1
                                                            AND 
                                                        d.is_action_done = 1
                                                    ORDER BY
                                                        m.meeting_date");
	                    $exec_decisions_stmt_1->execute();
	                    $exec_decisions_result_1 = $exec_decisions_stmt_1->get_result();
	                    $exec_decisions_exist_1 = $exec_decisions_result_1->num_rows > 0;?>
                        <!-- القرارات المنفذة -->
                        <div class="excecuted-dec">
                            <h3>القرارات المنفذة</h3>
	                        <?php if (!$exec_decisions_exist_1) { ?>
                                <main id="empty" class="empty-meeting">
                                    <h4>لا يوجد قرارات منفذة حاليًا</h4>
                                </main>
	                        <?php } else { ?>
		                        <?php while ($exec_decisions_row_1 = $exec_decisions_result_1->fetch_assoc()) { ?>
                                    <div class="decision-box">
                                        <div class="row">
                                            <div class="col">
                                                <h4>
                                                    مجلس رقم (<?= $exec_decisions_row_1["mn"] ?>)
                                                    بالتشكيل رقم (<?= $exec_decisions_row_1["fn"] ?>)
                                                    بتاريخ <?= $exec_decisions_row_1["md"] ?>
                                                </h4>
                                                <h4>
                                                    رقم الموضوع: <?= $exec_decisions_row_1["sno"] == NULL
								                        ? "لا يوجد"
								                        : $exec_decisions_row_1["sno"]  ?>
                                                </h4>
                                                <h4>
                                                    عنوان الموضوع: <?= $exec_decisions_row_1["sn"] == NULL
								                        ? "لا يوجد"
								                        : $exec_decisions_row_1["sn"] ?>
                                                </h4>
                                                <h4>
                                                    صيغة القرار:
                                                    <span class="decision-format">
                                            <?= $exec_decisions_row_1["dd"] == NULL
	                                            ? "لا يوجد"
	                                            : $exec_decisions_row_1["dd"] ?>
                                        </span>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="decision-buttons">
                                            <div class="row">
                                                <div class="col">
                                                    <button class="btn-basic dec-details-btn">تفاصيل القرار</button>
                                                </div>
                                                <div class="col">
                                                    <button class="btn-basic dec-status-btn">حالة تنفيذه</button>
                                                </div>
                                            </div>
                                            <div class="decision-desc deactive">
                                                <div class="table-container">
                                                    <table class="subjects-table">
                                                        <tbody>
                                                        <tr class="subject-row">
                                                            <td>الموضوع (<?= $exec_decisions_row_1["sno"] ?>)</td>
                                                            <td>
                                                                <strong>
		                                                            <?= $exec_decisions_row_1["sn"] == NULL
			                                                            ? "لا يوجد"
			                                                            : $exec_decisions_row_1["sn"] ?>
                                                                </strong>
                                                                <p>
											                        <?= $exec_decisions_row_1["sd"] == NULL
												                        ? "لا يوجد"
												                        : $exec_decisions_row_1["sd"] ?>
                                                                </p>
                                                                <img src="" alt="">
                                                            </td>
                                                        </tr>
                                                        <tr class="decision-row">
                                                            <td>القرار</td>
                                                            <td>
                                                                <p>
											                        <?= $exec_decisions_row_1["dd"] == NULL
												                        ? "لا يوجد"
												                        : $exec_decisions_row_1["dd"] ?>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <form action="update_code.php" class="decision-status deactive" method="post">
                                                <input type="hidden" name="subject_id" value="<?= $exec_decisions_row_1['sid'] ?>">
                                                <div class="row">
                                                    <div class="col">
                                                        <h3>تم تنفيذه</h3>
                                                        <input type="radio" name="is_action_done" value="1" checked/>
                                                    </div>
                                                    <div class="col">
                                                        <h3>لم يتم تنفيذه بعد</h3>
                                                        <input type="radio" name="is_action_done" value="0"/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <button class="btn-basic" name="update_decision_action_btn">تأكيد</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
		                        <?php }
	                        } ?>
                        </div>
                        <?php break;

                    case "all":
	                    $exec_decisions_stmt_all = $conn->prepare("SELECT
                                                        m.meeting_number as mn,
                                                        f.formation_number as fn,
                                                        m.meeting_date as md,
                                                        s.subject_number as sno,
                                                        s.subject_details as sd,
                                                        d.decision_details as dd,
                                                        s.subject_name as sn,
                                                        d.needs_action as na,
                                                        d.is_action_done as iad,
                                                        s.subject_id as sid
                                                    FROM
                                                        p39_formation AS f
                                                    JOIN p39_meeting AS m
                                                    ON
                                                        f.formation_id = m.formation_id
                                                    JOIN p39_subject AS s
                                                    ON
                                                        m.meeting_id = s.meeting_id
                                                    JOIN p39_decision AS d
                                                    ON
                                                        s.subject_id = d.subject_id 
                                                            AND 
                                                        d.needs_action = 1
                                                    ORDER BY
                                                        m.meeting_date");
	                    $exec_decisions_stmt_all->execute();
	                    $exec_decisions_result_all = $exec_decisions_stmt_all->get_result();
	                    $exec_decisions_exist_all = $exec_decisions_result_all->num_rows > 0;?>
                        <!-- القرارات المنفذة -->
                        <div class="excecuted-dec">
                            <h3>جميع القرارات التنفيذية</h3>
		                    <?php if (!$exec_decisions_exist_all) { ?>
                                <main id="empty" class="empty-meeting">
                                    <h4>لا يوجد قرارات تنفيذية حاليًا</h4>
                                </main>
		                    <?php } else { ?>
			                    <?php while ($exec_decisions_row_all = $exec_decisions_result_all->fetch_assoc()) { ?>
                                    <div class="decision-box">
                                        <div class="row">
                                            <div class="col">
                                                <h4>
                                                    مجلس رقم (<?= $exec_decisions_row_all["mn"] ?>)
                                                    بالتشكيل رقم (<?= $exec_decisions_row_all["fn"] ?>)
                                                    بتاريخ <?= $exec_decisions_row_all["md"] ?>
                                                </h4>
                                                <h4>
                                                    رقم الموضوع: <?= $exec_decisions_row_all["sno"] == NULL
									                    ? "لا يوجد"
									                    : $exec_decisions_row_all["sno"]  ?>
                                                </h4>
                                                <h4>
                                                    عنوان الموضوع: <?= $exec_decisions_row_all["sn"] == NULL
									                    ? "لا يوجد"
									                    : $exec_decisions_row_all["sn"] ?>
                                                </h4>
                                                <h4>
                                                    صيغة القرار:
                                                    <span class="decision-format">
                                            <?= $exec_decisions_row_all["dd"] == NULL
	                                            ? "لا يوجد"
	                                            : $exec_decisions_row_all["dd"] ?>
                                        </span>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="decision-buttons">
                                            <div class="row">
                                                <div class="col">
                                                    <button class="btn-basic dec-details-btn">تفاصيل القرار</button>
                                                </div>
                                                <div class="col">
                                                    <button class="btn-basic dec-status-btn">حالة تنفيذه</button>
                                                </div>
                                            </div>
                                            <div class="decision-desc deactive">
                                                <div class="table-container">
                                                    <table class="subjects-table">
                                                        <tbody>
                                                        <tr class="subject-row">
                                                            <td>الموضوع (<?= $exec_decisions_row_all["sno"] ?>)</td>
                                                            <td>
                                                                <strong>
		                                                            <?= $exec_decisions_row_all["sn"] == NULL
			                                                            ? "لا يوجد"
			                                                            : $exec_decisions_row_all["sn"] ?>
                                                                </strong>
                                                                <p>
												                    <?= $exec_decisions_row_all["sd"] == NULL
													                    ? "لا يوجد"
													                    : $exec_decisions_row_all["sd"] ?>
                                                                </p>
                                                                <img src="" alt="">
                                                            </td>
                                                        </tr>
                                                        <tr class="decision-row">
                                                            <td>القرار</td>
                                                            <td>
                                                                <p>
												                    <?= $exec_decisions_row_all["dd"] == NULL
													                    ? "لا يوجد"
													                    : $exec_decisions_row_all["dd"] ?>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <form action="update_code.php" class="decision-status deactive" method="post">
                                                <input type="hidden" name="subject_id" value="<?= $exec_decisions_row_all['sid'] ?>">
                                                <div class="row">
                                                    <?php switch ($exec_decisions_row_all["iad"]) {
                                                        case "0": ?>
                                                            <div class="col">
                                                                <h3>تم تنفيذه</h3>
                                                                <input type="radio" name="is_action_done" value="1"/>
                                                            </div>
                                                            <div class="col">
                                                                <h3>لم يتم تنفيذه بعد</h3>
                                                                <input type="radio" name="is_action_done" value="0" checked/>
                                                            </div>
                                                            <?php break;
                                                        case "1": ?>
                                                            <div class="col">
                                                                <h3>تم تنفيذه</h3>
                                                                <input type="radio" name="is_action_done" value="1" checked/>
                                                            </div>
                                                            <div class="col">
                                                                <h3>لم يتم تنفيذه بعد</h3>
                                                                <input type="radio" name="is_action_done" value="0"/>
                                                            </div>
                                                            <?php break;
                                                    } ?>
                                                </div>
                                                <div class="row">
                                                    <button class="btn-basic" name="update_decision_action_btn">تأكيد</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
			                    <?php }
		                    } ?>
                        </div>
	                    <?php break;
                    default: ?>
                        <main id="empty" class="empty-meeting">
                            <h4>لا يوجد قرارات تنفيذية</h4>
                        </main>
            <?php } }?>
        </div>
    </main>
<?php }
Footer(); ?>

<!-- Js Scripts and Plugins -->
<script type="module" src="./js/main.js"></script>

<!-- font Awesome -->
<script src="https://kit.fontawesome.com/eb7dada2f7.js" crossorigin="anonymous"></script>
</body>

</html>