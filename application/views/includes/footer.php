			 <!-- Bootstrap core JavaScript-->

<?php
          // lets get number of companionship and put into variable
          $this->db->select('companionship_id')
                ->from('pcdom_companionship');
                $count = $this->db->count_all_results();

                // variable of total number of companionship
                $total_companionship = $count;

                // lets get the number of mission goal
                $mission_goal = $count * 4;

                // lets get the standard of excellence
                $standard_of_excellence = $count * 7;

                //now lets get the number of weeks for a current month
            $number_of_weeks_in_current_month =  ceil(date( 'j', strtotime('today') ) / 7);
            // now lets get and count the regular missionaries
              $this->db->select('companionship_id')
                   ->from('pcdom_companionship')
                   ->where('assignment','regular');
                   // lets put to variable
                   $regular_missionary = $this->db->count_all_results();


          // lets sum first the statistics
          $this->db->select_sum('confirm')
               ->select_sum('ibd')
               ->select_sum('iasm')
               ->select_sum('ni')
               ->select_sum('ph')
               ->from('pcdom_statistics')
               ->where(
                array(
                  'month'   =>    date('F'),
                  'year'    =>    date('Y'),
                )
               );
               $query = $this->db->get();
               foreach($query->result() as $row):

                // lets get only the total not the average
                $total_baptism = $row->confirm;
                $total_ibd = $row->ibd;
                $total_iasm = $row->iasm;
                $total_ni = $row->ni;
                $total_ph = $row->ph;

                // let us declared the formula of each statistics
                $baptism = round($row->confirm/$total_companionship,1);
                $ibd = round($row->ibd/$total_companionship/$number_of_weeks_in_current_month,1);
                $iasm = round($row->iasm/$total_companionship/$number_of_weeks_in_current_month,1);
                $ni = round($row->ni/$total_companionship/$number_of_weeks_in_current_month,1);
                $ph = round($row->ph/$regular_missionary/$number_of_weeks_in_current_month,1);


                 // now lets declare the baptism achievement
                $achievement_baptism = round($row->confirm/$mission_goal*100,1);
                // now lets declare  the standard of excellence as percentage
                $soe = round($row->confirm/$standard_of_excellence*100,1);

               endforeach;

         ?>

  <script src="<?php echo base_url('resources/vendor/jquery/jquery.min.js'); ?>"></script>
       <!-- for select2.org -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2({
      theme: "classic",
      placeholder: "Select",
      allowClear: true 
    });
   
    });
  
</script>
<?php if($this->router->fetch_method() != "index"): ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script type="text/javascript">
  var baptismstats = <?php echo $baptism;?>;
  var ibd_stats = <?php echo $ibd; ?> ;
  var iasm_stats = <?php echo $iasm; ?>;
  var ni_stats = <?php echo $ni; ?>;
  var ph_stats = <?php echo $ph; ?>;
  var ctx = document.getElementById("barChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Baptism", "IBD", "IASM", "NI", "PH"],
        datasets: [{
            label: 'Percentage of Statistics',
            data: [baptismstats, ibd_stats, iasm_stats, ni_stats, ph_stats],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
<!-- for pie chart -->
<script type="text/javascript">
  var baptismstats = <?php echo $total_baptism;?>;
  var ibd_stats = <?php echo $total_ibd; ?> ;
  var iasm_stats = <?php echo $total_iasm; ?>;
  var ni_stats = <?php echo $total_ni; ?>;
  var ph_stats = <?php echo $total_ph; ?>;

  var oilCanvas = document.getElementById("oilChart");

Chart.defaults.global.defaultFontFamily = "Calibri";
Chart.defaults.global.defaultFontSize = 18;

var oilData = {
    labels: [
        "BAPTISM",
        "INVESTIGATOR WITH BAPTISMAL DATE",
        "INVESTIGATOR ATTENDING SACRAMENT MEETING",
        "NEW INVESTIGATOR",
        "PROSELYTING HOURS"
    ],
    datasets: [
        {
            data: [baptismstats, ibd_stats, iasm_stats, ni_stats, ph_stats],
            backgroundColor: [
                "#FF6384",
                "#63FF84",
                "#84FF63",
                "#8463FF",
                "#6384FF"
            ]
        }]
};

var pieChart = new Chart(oilCanvas, {
  type: 'doughnut',
  data: oilData
});
</script>
<?php endif; ?>







<?php if($this->router->fetch_method() == "create_companionshipPage"){ ?>
  <script type="text/javascript">

    $(document).ready(function() {
    var max_fields      = 50; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"><div class="col-sm-3"><div class="form-group"><label>Missionary:</label><input type="text" name="missionaries_name[]" class="form-control" placeholder="Elder Lastname / Sister Lastname"></div></div><div class="col-sm-3"><div class="form-group"><label>Gender:</label><select name="gender[]" class="form-control"><option value="male">Male</option><option value="female">Female</option></select></div></div><a href="#" class="remove_field" style="margin-top:35px;">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
  </script>
  <?php } ?>


  <?php if($this->router->fetch_method() != "index"): ?>

<!-- =================for Adding Fields Sa zone============== -->
  <script type="text/javascript">

    $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap_zone"); //Fields wrapper
    var add_button      = $(".add_field_button_zone"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-group"><label>Zone name:</label><input type="text" name="zone_name[]" class="form-control" placeholder="Name of Zone"><a href="#" class="remove_field" required>Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
  </script>

  <!-- =======================For Adding Fields Sa District=============== -->
  <script type="text/javascript">

    $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap_district"); //Fields wrapper
    var add_button      = $(".add_field_button_district"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-group"><label>District name:</label><input type="text" name="district_name[]" class="form-control" placeholder="Name of District"><a href="#" class="remove_field" required>Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
  </script>
  <!-- ==========================For Adding Area =================== -->
<script type="text/javascript">

    $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap_area"); //Fields wrapper
    var add_button      = $(".add_field_button_area"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-group"><label>Area name:</label><input type="text" name="area_name[]" class="form-control" placeholder="Name of Area"><a href="#" class="remove_field" required>Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
  </script>

<?php endif; ?>
 

<!-- 
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script> -->



  <script src="<?php echo base_url('resources/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('resources/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
  <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('resources/js/sb-admin.min.js'); ?>"></script>
    <script type="text/javascript">
    		$(".alert").delay(2000).slideUp(200, function() {
   			 $(this).alert('close');
			});
    </script>
  

    <?php if($this->router->fetch_method() != "index"): ?>
    <!-- for datatables -->
  
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
   
  <script type="text/javascript">
    $(document).ready(function() {

        $('#missionarylist').DataTable( {
            responsive: true,
            "pageLength": 50,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
            
        } );

        $('#weekone').DataTable( {
            responsive: true,
            "pageLength": 100,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
            
        } );

        $('#weektwo').DataTable( {
            responsive: true,
            "pageLength": 100,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
            
        } );

        $('#weekthree').DataTable( {
            responsive: true,
            "pageLength": 100,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
            
        } );

        $('#weekfour').DataTable( {
            responsive: true,
            "pageLength": 100,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
            
        } );

        $('#weekfive').DataTable( {
            responsive: true,
            "pageLength": 100,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
            
        } );

        $('#monthlytotal').DataTable( {
            responsive: true,
            "pageLength": 100,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
            
        } );

        $('#basictable').DataTable( {
            responsive: true,
            "pageLength": 100
            
            
        } );

      

         new $.fn.dataTable.FixedHeader( table );

    } );
  </script>
  
<?php endif;?>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
 



    <!-- 
	
	* Website Programmer / Developer Name: Felmerald Calago Besario
	* Author: felmerald besario
	*
     -->
</body>

</html>