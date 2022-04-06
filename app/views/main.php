<style>
    *{
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>
<?php

foreach($data as $blog){
    echo '<p> blog id: ' . $blog['demo_id'];
    echo '<p> blog data: ' . $blog['demo_data'];
    echo '<p> blog time: ' . $blog['demo_time'];
}