<?php
    require('../wp-blog-header.php');
    $lines = file('data5.csv');
    foreach($lines as $line){
        // This loop is set for counter == 0 for test purpose
        $data = explode(",",$line);
        $SSID = "None";
        $KYOTEN = $data[3];
        echo $KYOTEN;
        $ADRESS = $data[2];
        $LAT = $data[5];
        $ALT = $data[6];
        //post at each iteration
        echo "Process";
        $post_value = array(
                            'post_title' => $KYOTEN,
                            'post_content' => '[cft format=0]',
                            );
        $insert_id = wp_insert_post($post_value);
        if( $insert_id != 0 ){
            update_post_meta($insert_id, 'SSID',$SSID);
            update_post_meta($insert_id, 'KYOTEN',$KYOTEN);
            update_post_meta($insert_id, 'ADRESS',$ADRESS);
            update_post_meta($insert_id, 'LAT',$LAT);
            update_post_meta($insert_id, 'ALT',$ALT);
            $post_value['ID'] = $insert_id; 
            $post_value['post_status'] = 'publish'; 
            $insert_id2 = wp_insert_post($post_value);
        }
        else{
            var_dump('Error. Insert Id was Zero.');
        }
        }
?>
