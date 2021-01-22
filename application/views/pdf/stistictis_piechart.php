<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        body, p, h1, h2,h3, h4, h5,h6, a {
          margin: 0;
          font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
          font-size: 1rem;
          font-weight: 400;
          line-height: 1.5;
          color: #212529;
          text-align: left;
          background-color: #fff;
        }
        .container{
            width: 100%;
            padding-right: 10%;
            padding-left: 10%;
        }
        .margin-top{
    margin-top: 5%;
}
    </style>
</head>
<body id="printTable">

        <h2 style="text-align: center;font-size: 2em;">PHILIPPINES CAGAYAN DE ORO MISSION</h2>
        <p style="text-align: center;color:#007bff;">Kaya Yan! Cagayan!</p>
        <h4 style="text-align: center;">KEY INDICATORS AS PERCENTAGE</h4>
        <p style="text-align: center;color:#007bff;"><?php echo date('d F Y'); ?></p>

        <div class="margin-top"></div>
       <canvas id="oilChart" width="300" height="100"></canvas>



 

 
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
                            'month'     =>      date('F'),
                            'year'      =>      date('Y'),
                        )
                     );
                     $query = $this->db->get();
                     foreach($query->result() as $row):

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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script type="text/javascript">
var baptism_stats = <?php echo $baptism; ?>;
var oilCanvas = document.getElementById("oilChart");
Chart.defaults.global.defaultFontFamily = "Calibri";
Chart.defaults.global.defaultFontSize = 18;

var oilData = {
    labels: [
        "BAPTISM",
        "INVESTIGATOR WITH BAPTISMAL DATE",
        "INVESTIGATOR ATTENDING SACRAMENT MEETING",
        "PROSELYTING HOURS",
        "WORKING HOURS"
    ],
    datasets: [
        {
            data: [baptism_stats, 86.2, 52.2, 51.2, 50.2],
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
  type: 'pie',
  data: oilData
});
</script>
</body>
</html>