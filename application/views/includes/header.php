
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php if($this->router->fetch_method() == "index"): ?>
  <TITLE>Philippines Cagayan de Oro Mission - Ligthouse Mission</TITLE>
  <?php endif; ?>
  <?php if($this->router->fetch_method() != "index"): ?>
  <title><?php echo strtoupper($title); ?></title>
  <?php endif; ?>
  <?php if($this->router->fetch_method() == "index"): ?>
  <META NAME="author" CONTENT="Pcdom">
  <META NAME="subject" CONTENT="Organization">
  <META NAME="Description" CONTENT="We Invite others to come unto Christ by helping them receive the restored gospel through faith in Jesus Christ and His Atonement, repentance, baptism, receiving the gift of the Holy Ghost, and enduring to the end">
  <META NAME="Classification" CONTENT="We Invite others to come unto Christ by helping them receive the restored gospel through faith in Jesus Christ and His Atonement, repentance, baptism, receiving the gift of the Holy Ghost, and enduring to the end">
  <META NAME="Keywords" CONTENT="Philippines Cagayan de Oro Mission, Missionary, Mission, Lighthouse">
  <META NAME="Geography" CONTENT="Cagayan de Oro City, Misamis Oriental, Philippines">
  <META NAME="Language" CONTENT="English">
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-STORE">
  <META NAME="Copyright" CONTENT="Philippines Cagayan de Oro Mission">
  <META NAME="Designer" CONTENT="Pcdom">
  <META NAME="Publisher" CONTENT="Pcdom">
  <META NAME="distribution" CONTENT="Global">
  <META NAME="Robots" CONTENT="noodp">
  <META NAME="zipcode" CONTENT="9000">
  <META NAME="city" CONTENT="Cagayan de Oro City">
  <META NAME="country" CONTENT="Philippines">
  <?php endif; ?>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url('resources/vendor/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('resources/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('resources/css/sb-admin.css'); ?>" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo base_url('resources/img/pcdom.png'); ?>" />

  <?php if($this->router->fetch_method() != "index"): ?>
  <!-- for Datatables Exporting files -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
  <?php endif; ?>
  <!-- for chosen select type -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <style type="text/css">
    @media (min-width: 992px) {
  .modal-lg {
    max-width: 1000px !important;
  }
}
  </style>



</head>



<?php if($this->router->fetch_method() == "index")
{ ?>
	<body class="body-background-login">
<?php 
} 
if($this->router->fetch_method() == "superadmin")
{
?>
	<body class="fixed-nav sticky-footer bg-dark" id="page-top">
		<!-- Navigation-->

<?php $this->load->view('includes/sidebar-superadmin'); ?>
 
<!-- ==============MISSION RECORDER================ -->
<?php 
}
if($this->router->fetch_method() == "mrec_home" 
	|| $this->router->fetch_method() == "create_companionshipPage"
  || $this->router->fetch_method() == "companionshipPage"
  || $this->router->fetch_method() == "zone_pages"
  || $this->router->fetch_method() == "statistics_page"
  || $this->router->fetch_method() == "create_statistics_page"
)


{
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php $this->load->view('includes/sidebar-mrec'); ?>
<?php } ?>


