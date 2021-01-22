<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<META http-equiv="X-UA-Compatible" content="IE=8">
<TITLE>SUMMARY REPORT</TITLE>
<META name="generator" content="BCL easyConverter SDK 5.0.08">
<STYLE type="text/css">

body {margin-top: 0px;margin-left: 0px;}

#page_1 {position:relative; overflow: hidden;margin: 23px 0px 887px 37px;padding: 0px;border: none;width: 735px;}

#page_1 #p1dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:735px;height:146px;}
#page_1 #p1dimg1 #p1img1 {width:735px;height:146px;}


.dclr {clear:both;float:none;height:1px;margin:0px;padding:0px;overflow:hidden;}
.ft0{font: 22px 'Calibri';color: #ffffff;line-height: 27px;}
.ft1{font: 20px 'Calibri';color: #ffffff;line-height: 24px;}
.ft2{font: 1px 'Calibri';line-height: 16px;}
.ft3{font: 22px 'Calibri';line-height: 27px;}
.ft4{font: 1px 'Calibri';line-height: 1px;}
.ft5{font: 1px 'Calibri';line-height: 18px;}
.p0{text-align: left;padding-left: 66px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p1{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p2{text-align: left;padding-left: 10px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p3{text-align: left;padding-left: 47px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p4{text-align: left;padding-left: 9px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p5{text-align: right;padding-right: 47px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p6{text-align: right;padding-right: 49px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p7{text-align: left;padding-left: 46px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.td0{padding: 0px;margin: 0px;width: 282px;vertical-align: bottom;background: #203764;}
.td1{border-right: #203764 1px solid;padding: 0px;margin: 0px;width: 248px;vertical-align: bottom;background: #203764;}
.td2{padding: 0px;margin: 0px;width: 101px;vertical-align: bottom;background: #203764;}
.td3{padding: 0px;margin: 0px;width: 103px;vertical-align: bottom;background: #203764;}
.td4{padding: 0px;margin: 0px;width: 282px;vertical-align: bottom;background: #b4c6e7;}
.td5{border-right: #e8b4bd 1px solid;padding: 0px;margin: 0px;width: 248px;vertical-align: bottom;background: #b4c6e7;}
.td6{padding: 0px;margin: 0px;width: 101px;vertical-align: bottom;background: #e8b4bd;}
.td7{padding: 0px;margin: 0px;width: 103px;vertical-align: bottom;background: #e8b4bd;}
.td8{padding: 0px;margin: 0px;width: 282px;vertical-align: bottom;background: #8497b0;}
.td9{border-right: #8497b0 1px solid;padding: 0px;margin: 0px;width: 248px;vertical-align: bottom;background: #8497b0;}
.td10{padding: 0px;margin: 0px;width: 101px;vertical-align: bottom;background: #8497b0;}
.td11{padding: 0px;margin: 0px;width: 103px;vertical-align: bottom;background: #8497b0;}
.tr0{height: 39px;}
.tr1{height: 16px;}
.tr2{height: 29px;}
.tr3{height: 42px;}
.tr4{height: 18px;}
.t0{width: 735px;margin-top: 2px;font: 22px 'Calibri';}

</STYLE>
</HEAD>

<BODY>
	<h1 style="text-align: center;font-weight: bold;">PHILIPPINES CAGAYAN DE ORO MISSION</h1>
	<p style="text-align: center;">Kaya Yan! Cagayan!</p>
	<p style="text-align: center;font-weight: bold;">
		<?php $this->db->select('week_date')
					->from('pcdom_statistics') 
					->where(array(
		         	'month'		=>		date('F'),
		         	'year'		=>		date('Y'),
		         	'week_number'	=>	4,
		         	
		         ))->limit(1);
					$query =$this->db->get();
					foreach($query->result() as $row){
						echo strtoupper(ucwords($row->week_date));
					}
		          ?></p>
	<h2 style="text-align: center;font-weight: bold;">SUMMARY REPORT</h2>
	<p style="text-align: center;font-weight: bold;">MISSIONARIES WHO BAPTIZED THIS WEEK</p>
	<br/>
<DIV id="page_1">



<DIV class="dclr"></DIV>

<TABLE cellpadding=0 cellspacing=0 class="t0">
<TR>
	<TD class="tr0 td0" style="text-align: center;"><P class="p0 ft0" style="font-size: 12px;">AREA</P></TD>
	<TD class="tr0 td1" style="text-align: center;"><P class="p1 ft0" style="font-size: 12px;">COMPANIONSHIP</P></TD>
	<TD class="tr0 td2" style="text-align: center;"><P class="p2 ft0" style="font-size: 12px;">BAPTIZED</P></TD>
	<TD class="tr0 td3" style="text-align: center;"><P class="p1 ft1" style="font-size: 12px;">CONFIRMED</P></TD>
</TR>
<TR>
	<TD class="tr1 td0"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr1 td1"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr1 td2"><P class="p1 ft2">&nbsp;</P></TD>
	<TD class="tr1 td3"><P class="p1 ft2">&nbsp;</P></TD>
</TR>
<?php 

	$this->db->select('week_number, month, year, area_name,week_date, area_name,pcdom_m1.missionaries_name AS m1_missionary, pcdom_m1.missionary_id AS m1_misssionary_id, pcdom_m2.missionaries_name AS m2_missionary, pcdom_m2.missionary_id AS m2_misssionary_id, pcdom_m3.missionaries_name AS m3_missionary, pcdom_m3.missionary_id AS m3_misssionary_id')
				 ->select_sum('baptism')
				 ->select_sum('confirm')
				 ->from('pcdom_statistics')
				 ->join('pcdom_area','pcdom_area.area_id = pcdom_statistics.area_id','left')
				 ->join('pcdom_companionship','pcdom_companionship.companionship_id = pcdom_statistics.companionship_id','left')	
				 ->join('pcdom_missionaries as pcdom_m1','pcdom_m1.missionary_id = pcdom_companionship.missionary_one_id','left')
		         ->join('pcdom_missionaries as pcdom_m2','pcdom_m2.missionary_id = pcdom_companionship.missionary_two_id','left')
		         ->join('pcdom_missionaries as pcdom_m3','pcdom_m3.missionary_id = pcdom_companionship.missionary_three_id','left')
		         ->group_by('pcdom_statistics.companionship_id')
		         ->where(array(
		         	'month'		=>		date('F'),
		         	'year'		=>		date('Y'),
		         	'week_number'	=>	4,
		         	'baptism !='	=>	0,
		         	'confirm !='	=>	0,
		         ));
		         $query = $this->db->get();
		         foreach($query->result() as $row):
		         	$weekdate = $row->week_date;
		         	?>


<TR>
	<TD class="tr2 td4" style="text-align: center;"><P class="p3 ft3" style="font-size: 12px;"><?php echo strtoupper($row->area_name); ?></P></TD>
	<TD class="tr2 td5" style="text-align: center;"><P class="p4 ft3" style="font-size: 12px;">
		<?php 
                      echo !empty($row->missionary_three_id)? $row->m1_missionary.' - '.$row->m2_missionary.' - '.$row->m3_missionary : $row->m1_missionary.' - '.$row->m2_missionary;
                    ?>
	</P></TD>
	<TD class="tr2 td6" style="text-align: center;"><P class="p5 ft3" style="font-size: 12px;"><?php echo $row->baptism; ?></P></TD>
	<TD class="tr2 td7" style="text-align: center;"><P class="p6 ft3" style="font-size: 12px;"><?php echo $row->confirm; ?></P></TD>
</TR>
<?php endforeach; ?>
<TR>
	<TD class="tr3 td8" style="text-align: center;"><P class="p1 ft4">&nbsp;</P></TD>
	<TD class="tr3 td9" style="text-align: center;"><P class="p7 ft3" style="font-size: 12px;">TOTAL</P></TD>
	<TD class="tr3 td10" style="text-align: center;"><P class="p5 ft3" style="font-size: 12px;">
		
		<?php

			$this->db->select_sum('baptism')
                ->from('pcdom_statistics')
                 ->where(array(
		         	'month'		=>		date('F'),
		         	'year'		=>		date('Y'),
		         	'week_number'	=>	4,
		         ));
		         $query=$this->db->get();
		         foreach($query->result() as $row){
		         	echo $row->baptism;
		         }
               

		 ?>


	</P></TD>
	<TD class="tr3 td11" style="text-align: center;"><P class="p6 ft3" style="font-size: 12px;">
		<?php

			$this->db->select_sum('confirm')
                ->from('pcdom_statistics')
                 ->where(array(
		         	'month'		=>		date('F'),
		         	'year'		=>		date('Y'),
		         	'week_number'	=>	4,
		         ));
		         $query=$this->db->get();
		         foreach($query->result() as $row){
		         	echo $row->confirm;
		         }
               

		 ?>
	</P></TD>
</TR>
<TR>
	<TD class="tr4 td8"><P class="p1 ft5">&nbsp;</P></TD>
	<TD class="tr4 td9"><P class="p1 ft5">&nbsp;</P></TD>
	<TD class="tr4 td10"><P class="p1 ft5">&nbsp;</P></TD>
	<TD class="tr4 td11"><P class="p1 ft5">&nbsp;</P></TD>
</TR>
</TABLE>
</DIV>

<br/>
<p style="text-align: center;font-weight: bold; font-family: 'Calibri';">The Running Baptism of Philppines Cagayan de Oro Mission as of <?php echo ucfirst(date('F d Y')); ?> is 
	<strong style="color: #dc3545;font-weight: bold;font-family: 'Calibri';">
			<?php
		$this->db->select_sum('confirm')
				 ->from('pcdom_statistics')
				 ->where(array(
				 	'month'		=>		date('F'),
				 	'year'		=>		date('Y')
				 ));

				 $query = $this->db->get();
				 foreach($query->result() as $row):
				 	echo $row->confirm;
				 endforeach;
	 ?>
	</strong>
</p>

</BODY>
</HTML>
