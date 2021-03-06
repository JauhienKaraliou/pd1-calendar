<?php
if(isset($_GET['month'])){
    $month=htmlspecialchars($_GET['month']);
}//else {
   // $month = mt_rand(1,12);
//}
if(isset($_GET['year'])){
    $year=htmlspecialchars($_GET['year']);
}//else {
   // $year = mt_rand(0,10000);
//}
function($month=null,$year=null){
    if(is_null($month)) $month=date('n');
    if(is_null($year)) $year=date('Y');
    $monthName = date('F', mktime(0, 0, 0, $month, 1, $year));
    echo "calendar for $monthName  $year <br>";

    $tableHeader = '<table><thead>Month</thead>
    <tr><td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td><td>Sun</td></tr>';
    $tableEnd = '</table>';
    $numberOfDays = date('t', mktime(0, 0, 0, $month, 1, $year));
    $dayOfWeek = date('N', mktime(0, 0, 0, $month, 1, $year));
    echo "number of days " . $numberOfDays . '<br>';
    $day = 0;
    $tableBody = "";
    while ($day < $numberOfDays) {                                                //loop to generate table rows
        $tableBody .= '<tr>';
        for ($k = 1; $k <= 7; $k++) {                                             //loop to generate table cells
            if (($k < $dayOfWeek & $day == 0) || ($day == $numberOfDays)) {       //condition for empty cells
                $tableBody .= '<td></td>';
            } else {                                                              //condition for filled-in cells
                $day++;
                $tableBody .= "<td>$day</td>";
            }
        }
        $tableBody .= '<tr>';
    }
    echo $tableHeader;
    echo $tableBody;
    echo $tableEnd;
}
