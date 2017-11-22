<?php
$footercolumn=get_theme_mod( 'main_footer_columns' ) ? get_theme_mod( 'main_footer_columns' ) :'4';
if($footercolumn == '5') { $footerclass="one_fifth"; }  
if($footercolumn == '4') {$footerclass="one_fourth";}
if($footercolumn == '3') { $footerclass="one_third"; }
if($footercolumn == '2') {$footerclass="one_half"; }
if($footercolumn == '1') { $footerclass="fullwidth"; }
// two third column
if($footercolumn=="twothird")
{
	echo '<div class="two_third">';
		echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(1);
	   	echo '</div>';
	echo '</div>';
	echo '<div class="one_third last">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(2);
	   	echo '</div>';
	echo '</div>';
}
// one third column
if($footercolumn=="onethird")
{
	echo '<div class="one_third">';
	   echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(1);
	   	echo '</div>';
	echo '</div>';
	echo '<div class="two_third last">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(2);
	   	echo '</div>';
	echo '</div>';
}
// three fourth column
if($footercolumn=="threefourth")
{
	echo '<div class="three_fourth">';
	   	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(1);
	   	echo '</div>';
	echo '</div>';
	echo '<div class="one_fourth last">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(2);
	   	echo '</div>';
	echo '</div>';
}
// one fourth column
if($footercolumn=="onefourth")
{
	echo '<div class="one_fourth">';
	   	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(1);
	   	echo '</div>';
	echo '</div>';
	echo '<div class="three_fourth last">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(2);
	   	echo '</div>';
	echo '</div>';
}
// half fourth column
if($footercolumn=="halffourth")
{
	echo '<div class="two_fourth">';
	   	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(1);
	   	echo '</div>';
	echo '</div>';
	echo '<div class="one_fourth">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(2);
	   	echo '</div>';
	echo '</div>';
	echo '<div class="one_fourth last">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(3);
	   	echo '</div>';
	echo '</div>';
}
// two fourth column
if($footercolumn=="twofourth")
{
	echo '<div class="one_fourth">';
	   	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(1);
	   	echo '</div>';
	echo '</div>';
	echo '<div class="one_fourth">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(2);
	   	echo '</div>';
	echo '</div>';
	echo '<div class="two_fourth last">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(3);
	   	echo '</div>';
	echo '</div>';
}

// fifth_fifth  three_fifth column
if($footercolumn=="fifth_fifth")
{
	echo '<div class="one_fifth">';
	   echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(1);
	   	echo '</div>';
	echo '</div>';
	echo '<div class="one_fifth">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(2);
	   	echo '</div>';
	echo '</div>';
	echo '<div class="three_fifth last">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(3);
	   	echo '</div>';
	echo '</div>';
}


// three_fifth fifth fifth column
if($footercolumn=="three_fifth")
{
	echo '<div class="three_fifth">';
	  echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(1);
	   	echo '</div>';
	echo '</div>';
	echo '<div class="one_fifth">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(2);
	   	echo '</div>';
	echo '</div>';
	echo '<div class="one_fifth last">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(3);
	   	echo '</div>';
	echo '</div>';
}

// fifth_fifth_fifth  two_fifth column
if($footercolumn=="fifth_fifth_fifth")
{
	echo '<div class="one_fifth">';
	   	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(1);
	   	echo '</div>';
	echo '</div>';
	echo '<div class="one_fifth">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(2);
	   	echo '</div>';
	echo '</div>';	
	echo '<div class="one_fifth">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(3);
	   	echo '</div>';
	echo '</div>';
	
	echo '<div class="two_fifth last">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(4);
	   	echo '</div>';
	echo '</div>';
}



// two_fifth  fifth_fifth_fifth  column
if($footercolumn=="two_fifth")
{
	echo '<div class="two_fifth">';
	   	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(1);
	   	echo '</div>';
	echo '</div>';
	echo '<div class="one_fifth">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(2);
	   	echo '</div>';
	echo '</div>';
	echo '<div class="one_fifth">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(3);
	   	echo '</div>';
	echo '</div>';
	echo '<div class="one_fifth last">';
	 	echo '<div class="footer_widget_container_wrapper">';
	   		kaya_footercolumn(4);
	   	echo '</div>';
	echo '</div>';

}


// footer column1,column2,column3,column4,column5
 for($fc=1; $fc<=$footercolumn; $fc++)
 { 
 // footer column
	 $last = ($fc == $footercolumn and $footercolumn != 1) ? '_last' : '';
	 ?>
	<div class="<?php echo esc_attr( $footerclass ).esc_attr( $last ); ?> ">
		<div class="footer_widget_container_wrapper">	
			<?php kaya_footercolumn($fc); ?>
		</div>
	 </div>
	<?php
 }
?>