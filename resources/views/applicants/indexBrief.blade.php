<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show All Applicants</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <?php
    $counter = 0;
    foreach ($time_slots as $time_slot) {
        $counter += count($time_slot->applicants);
    }
    $counterDay = [0, 0, 0, 0, 0, 0];
    for($i = 0; $i < 6; $i++) {
        for($j = 0; $j < 10; $j++) {
            $counterDay[$i] += count($time_slots[$i * 10 + $j]->applicants);
        }
    }
    $days = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday"];
    ?>
    <div class="container mt-4">
        <h1>All Applicants {{ $counter }}</h1>
    </div>
    <div class="container-fluid">
        <?php 
        for($i = 0; $i < 6; $i++) {
            echo '<table class="table table-striped table-dark">';
            echo "<h2>Day " . $days[$i] . ":  " . $counterDay[$i] . "</h2>";
            echo '<thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">First Pref.</th>
                <th scope="col">Second Pref.</th>
                <th scope="col">Time Slot</th>
            </tr>
            </thead><tbody>';
            $counter_day = 1;
            for($j = 0; $j < 10; $j++) {
                $time_slots_day = $time_slots[$i * 10 + $j];
                foreach ($time_slots_day->applicants as $key => $applicant) {
                    echo "<tr>
                    <th scope='col'>" . $counter_day . "</th>
                    <th scope='col'>" . $applicant->first_name . ' ' . $applicant->last_name . "</th>
                    <th scope='col'>" . $applicant->email . "</th>
                    <th scope='col'>" . $applicant->phone_number . "</th>
                    <th scope='col'>" . $applicant->firstPreference->name . "</th>
                    <th scope='col'>" . $applicant->secondPreference->name . "</th>
                    <th scope='col'>" . $applicant->availableNumber->timeSlot->date . "</th>
                    </tr>";
                    $counter_day++;
                }
            }
            echo "</tbody></table><br>";
        }
        ?>
    </div>
</body>
</html>

