<?php
function get_schedule_time( $slected = 0 ){
    $schedule_event = array(
        array(
            'name' => 'hourly',
            'title' => 'Hourly',
            'interval' => 3600
        ),
        array(
            'name' => 'twicedaily',
            'title' => 'Twice Daily',
            'interval' => 43200
        ),
        array(
            'name' => 'daily',
            'title' => 'Daily',
            'interval' => 86400
        ),
        array(
            'name' => 'weekly',
            'title' => 'Weekly',
            'interval' => 604800
        ),
    );
    $schedule_event = apply_filters( 'izw_import_export_schedule_time', $schedule_event );
    $option = '';
    foreach( $schedule_event as $row ){
        $option .= '<option value="'.$row['name']."|".$row['interval'].'" '.selected( $row['name']."|".$row['interval'], $slected ).'>'.$row['title'].'</option>';
    }
    return $option;
}