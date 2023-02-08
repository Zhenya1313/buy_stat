<?require ($_SERVER["DOCUMENT_ROOT"].'/templates/header.php');
$pageA = json_encode(Main::reportsPage("SELECT * FROM page_views WHERE page_name = 'Page A' ORDER BY date ASC"));
$pageB = json_encode(Main::reportsPage("SELECT * FROM page_views WHERE page_name = 'Page B' ORDER BY date ASC"));
$buyCow = json_encode(Main::reportsPage("SELECT * FROM order_cow  ORDER BY date ASC"));
$download = json_encode(Main::reportsPage("SELECT * FROM download  ORDER BY date ASC")); ?>
<?$countPageA = "SELECT SUM(views) FROM page_views WHERE page_name = 'Page A'";
$countPageA = mysqli_fetch_assoc(DB()->query($countPageA))['SUM(views)'];
$countPageB = "SELECT SUM(views) FROM page_views WHERE page_name = 'Page B'";
$countPageB = mysqli_fetch_assoc(DB()->query($countPageB))['SUM(views)'];
$countBuy = "SELECT SUM(buy_count) FROM order_cow";
$countBuy = mysqli_fetch_assoc(DB()->query($countBuy))['SUM(buy_count)'];
$countDownload = "SELECT SUM(download_count) FROM download";
$countDownload = mysqli_fetch_assoc(DB()->query($countDownload))['SUM(download_count)'];
?>
<table class="table mt-3">
    <thead>
    <tr>
        <th scope="col">View cout Page A</th>
        <th scope="col">View cout Page B</th>
        <th scope="col">Number of Purchases</th>
        <th scope="col">Number of Downloads</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?=$countPageA?></td>
        <td><?=$countPageB?></td>
        <td><?=$countBuy?></td>
        <td><?=$countDownload?></td>
    </tr>
    </tbody>
</table>
<div>
    <canvas id="chartPageA"></canvas>
</div>
<div>
    <canvas id="chartPageB"></canvas>
</div>
<div>
    <canvas id="chartBuyCoe"></canvas>
</div>
<div>
    <canvas id="chartDownload"></canvas>
</div>
<?require ($_SERVER["DOCUMENT_ROOT"].'/templates/footer.php');?>


<script>
    const pageA = document.getElementById('chartPageA');
    var dataA = JSON.parse('<?php echo $pageA; ?>');
    new Chart(pageA, {
        type: 'line',
        data: {
            labels: dataA.date,
            datasets: [{
                label: 'views Page A',
                data: dataA.views,
                borderWidth: 1
            }]
        },
        options: {}
    });
    const pageB = document.getElementById('chartPageB');
    var dataB = JSON.parse('<?php echo $pageB; ?>');
    new Chart(pageB, {
        type: 'line',
        data: {
            labels: dataB.date,
            datasets: [{
                label: 'views Page B',
                data: dataB.views,
                borderWidth: 1
            }]
        },
        options: {}
    });
    const pageCow = document.getElementById('chartBuyCoe');
    var dataCow = JSON.parse('<?php echo $buyCow; ?>');
    new Chart(pageCow, {
        type: 'line',
        data: {
            labels: dataCow.date,
            datasets: [{
                label: 'count Buy Cow',
                data: dataCow.views,
                borderWidth: 1
            }]
        },
        options: {}
    });
    const pageDownload = document.getElementById('chartDownload');
    var dataDownload = JSON.parse('<?php echo $download; ?>');
    new Chart(pageDownload, {
        type: 'line',
        data: {
            labels: dataDownload.date,
            datasets: [{
                label: 'Download File',
                data: dataDownload.views,
                borderWidth: 1
            }]
        },
        options: {}
    });
</script>