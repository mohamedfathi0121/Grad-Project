<?php
require_once "db.php";
require_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
Head("عرض التصويت");
?>

<body dir="rtl">
    <?php Headers(); ?>

    <?php Nav(); ?>
    <?php 
    $x=2;
    $y=3;
    $z=1;
    ?>
    <main class="add-formation-member-page ">
        <div class="container">
            <div class="title">
                <h1>عرض تصويت الاعضاء علي موضوع رقم :1</h1>
            </div>
            <div class="piechart">
                <div id="piechart"></div>
            </div>
            <div class="vote-table">
                <table>
                    <thead>
                        <th>اسم العضو</th>
                        <th>الاختيار</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                محمد عبدالسلام
                            </td>
                            <td>
                                موافق
                            </td>
                        </tr>
                        <tr>
                            <td>
                                محمد عبدالسلام
                            </td>
                            <td>
                                موافق
                            </td>
                        </tr>
                    </tbody>

                </table>

            </div>
            <div class="current-formation deactive">
                <main id="empty" class="empty-formation">
                    <h4>لا يوجد أعضاء مسجلين</h4>
                </main>
            </div>

        </div>
    </main>


    <?php
    footer();
    ?>

    <!-- Js Scripts and Plugins -->
    <script type="module" src="./js/main.js"></script>
    <script src="./js/select_all_button.js"></script>

    <!-- font Awesome -->
    <script src="https://kit.fontawesome.com/eb7dada2f7.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        const x = <?php echo($x)?>;
        const y = <?php echo($y)?>;
        const z = <?php echo($z)?>;
        var data = google.visualization.arrayToDataTable([
            ['نوع', 'النسبة'],
            ['الموافقة', x],
            ['الرفض', y],
            ['الامتناع', z]
        ]);

        var options = {
            title: 'تصويت الاعضاء',
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
    </script>
</body>

</html>