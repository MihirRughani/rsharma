<!--  here is Feature List post custom meta   -->
<?php
//global $post;
global $wpdb;
$table = $wpdb->prefix . "mp_feature_set";
$table2 = $wpdb->prefix . "mp_feature_set_meta";
$nonce = wp_create_nonce("wpmp_featurelist_nonce");

$data1 = get_post_meta($post->ID, "_wpmp_featureset", true);
$data = unserialize($data1);
//echo "<pre>"; print_r($data); echo "</pre>";

if (!empty($data)) {
    $abc = array_keys($data);
    //print_r($abc);
    $newid = $abc[0];
    echo "<input type='hidden' name='featureSetId' value='$newid'>";
    $feature_name = $wpdb->get_var("select feature_name from $table where id='$newid'");
    //echo $feature_name;
}




$query = "SELECT * from `{$table}` where del='0' and enabled='1'";
$results = $wpdb->get_results($query, ARRAY_A);
//$results2 = $wpdb->get_results("select * from `{$table}`",ARRAY_A);
$wpdb->flush();




?>
<div style="padding: 20px 0px;">
<lable for="featurelist_select">Select Feature Set</label>
<select name="featurelist_select" id="featurelist_select">
    <option value="">Select Feature List</option>
    <?php    foreach ($results as $key => $row):  
                $count = $wpdb->get_var( "SELECT COUNT(*) FROM $table2 where fid='".$row['id']."' and enabled='1' and del='0'" );
                echo $wpdb->last_query ; 
                if($count>0):
                    if($row['feature_name']==$feature_name) $selected = "selected='selected'";
                    else $selected = "";
                    echo '<option value="' . $row['id'] . '" '.$selected.'>'. ucfirst($row['feature_name']) . "</option>";
                endif;
            endforeach;
    ?>
</select>
<!-- <input type="submit" value="Add Feature Set" class="button-primary" id="add_featureset" /> -->
</div>

<ul id='featureset_data'>
    
    <?php 
    
       if(isset($data) && is_array($data) && !empty($data)):
           foreach($data as $id => $arr){
       $results2 = $wpdb->get_row("select * from $table where id='$id'",ARRAY_A);
            
    ?>
        <li style="width: 48%; float: left; margin-right:1%;">
        <div class="postbox" style="width: 100%;float: right;">
        <h3><?php echo $results2['feature_name']; ?></h3>
        <table width="100%" style="margin: 10px;">
        <?php   
        
            foreach($arr as $key => $value):
                //$value1 = array_values($value);
                $row = $wpdb->get_row("select * from $table2 where id='$key'",ARRAY_A);
        ?>
             <tr>
                 <td><?php echo $row['option_name'];  ?></td>
                 <?php
                    $option_value = unserialize($row['option_value']);
                    $opt_value = explode("\r\n", $option_value[0]);
                if($row['field_type']=="radio" || $row['field_type']=='checkbox'){
                    echo "<td><table class=''>";
                    
                    foreach($opt_value as $a => $b):
                        
                        if(in_array($b, $value)){
                            $checked = "checked='checked'";
                        }
                        else {
                            $checked = "";
                        }
                        echo "<tr><td><input type='".$row['field_type']."' name='wpmp_featureset[$id][$key][]' value='$b' $checked > $b </td></tr>"; 
                    endforeach; 
                    echo "</table></td>";
                }
                else if($row['field_type']=="dropdown"){
                    echo "<td><select name='wpmp_featureset[$id][$key][]'>";
                     foreach($opt_value as $a => $b):
                        if(in_array($b, $value)){
                            $selected = "selected='selected'";
                        }
                        else {
                            $selected = "";
                        }
                        echo "<option value='$b' $selected>$b</option>"; 
                    endforeach;
                    echo "</select></td>";
                }
                else if($row['field_type']=='text'){
                    //$data = str_replace("<br>", "\n", $value[0]);
                    $data = $value[0];
                    echo "<td><textarea name='wpmp_featureset[$id][$key][]' rows='5' cols='50'>$data</textarea></td>";
                    
                }
             echo "</tr>";
         endforeach;
                 ?>
             
        </table>
        </div>
        </li>
             
    <?php
            
        }
    
    endif;
    ?>
</ul>    

  <div style="clear: both;"></div>
  
<script type="text/javascript">
    jQuery(document).ready(function($){
        $('#featurelist_select').live("change",function(){
            //var id = $("#featurelist_select").val();
            var id = $(this).val();
            var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ) ?>";
            var nonce = "<?php echo $nonce; ?>";
            if(id != ""){
                
                 jQuery.ajax({
                    type : "post",
                    dataType : "json",
                    url : ajaxurl,
                    data : {action: "wpmp_featurelist_generate", id : id, nonce: nonce},
                    success: function(response) {
                       if(response.type == "success") {
                          //console.log(response);
                          //alert(response);
var str = '<li style="width: 48%; float: left; margin-right:1%;">';
str += '<div class="postbox" style="width: 100%;float: right;">';
str += '<h3>'+response.feature_name+'</h3>';
str += '<table  width="100%" style="margin: 10px;">'; 
            $.each(response.data, function(key,value){
                str += '<tr><td>'+value.name+ '</td>';
                str += "<input type='hidden' name='featureSetId' value='"+value.id+"'>"; 
                if(value.field_type=="radio" || value.field_type=="checkbox"){
                    str+= "<td><table>";                
                    $.each(value.data,function(a,b){
                        str += '<tr><td>';
                        str += '<input type="'+value.field_type+'" name="wpmp_featureset['+id+']['+value.id+'][]" value="'+b+'"/> ';
                        str += b+'</td></tr>';
                    });
                    str += '</table></td>';
               }
               else if(value.field_type=="dropdown"){
                    str += '<td><select name="wpmp_featureset['+id+']['+value.id+'][]">';
                    $.each(value.data,function(a,b){
                        str += '<option value="'+b+'">'+b+'</option>';
                    });
                    str += "</select></td>";
               }
               
               else if(value.field_type=="text"){
                   str += '<td><textarea name="wpmp_featureset['+id+']['+value.id+'][]" rows="5" cols="50">';
                   $.each(value.data,function(a,b){
                       str += "<p>" + b +'<p>\n';
                   });
                   str += "</textarea></td>";
                   
                   
               }
               str += "</tr>";
            });
              
str += '</table></div></li>';
//alert(str);
                          
                          $('#featureset_data').html(str);
                       }
                       else {
                          alert("no info found")
                       }
                    }
                 });   
                
                
            }
            return false;
        });
        
           
        
        
    });
    
</script>
  