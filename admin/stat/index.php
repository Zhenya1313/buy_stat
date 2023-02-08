<?require ($_SERVER["DOCUMENT_ROOT"].'/templates/header.php');
$query = "SELECT * FROM users";

$result = DB()->query($query);
while($row = $result->fetch_object()) {
    $query = DB()->query("SELECT page_name, SUM(views) as sum , date FROM page_views WHERE page_views.user_id = '$row->id' GROUP BY date, page_name");
    while($row2 = $query->fetch_object()) {
        $data[$row->username][$row2->date][$row2->page_name]= $row2->sum;
    }
    $buyCow = DB()->query("SELECT SUM(buy_count) as sum , date FROM order_cow WHERE order_cow.user_id = '$row->id' GROUP BY date");
    while($buy = $buyCow->fetch_object()) {
        $data[$row->username][$buy->date]['buyCow']= $buy->sum;
    }
    
    $data[$row->username][$row->register]['register']= 'register';
}

?>
<input type="text" id="inputName" onkeyup="searchName()" placeholder="Search by Name..">
<input type="text" id="inputDate" onkeyup="searchDate()" placeholder="Search by Date..">

<table id="myTable">
    <tr class="header">
        <th style="width:25%;">Name</th>
        <th style="width:25%;">Date</th>
        <th style="width:20%;">Page A</th>
        <th style="width:20%;">Page B</th>
        <th style="width:25%;">buyCow</th>
        <th style="width:25%;">register</th>
    </tr>

    <?foreach ($data as $key => $user){?>


        <?foreach ($user as $key2 => $date){?>
            <tr>
            <td><?=$key?></td>
            <td><?=$key2?></td>
            <td><?=$date['Page A']?:''?></td>
            <td><?=$date['Page B']?:''?></td>
            <td><?=$date['buyCow']?:''?></td>
            <td><?=$date['register']?:''?></td>
            </tr>
        <?}?>

    <?}?>
</table>
