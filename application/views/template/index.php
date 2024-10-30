<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
   data-assets-path="<?= base_url('assets/'); ?>" data-template="">

<head>
   <?php $this->load->view('template/header'); ?>
   
   <style>
      .content-wrapper {
         position: relative;
         animation: main 0.55s ease forwards;
      }

      @keyframes main {
         0% {
            right: -100vw;
         }

         100% {
            right: 0px;
         }
      }
   </style>
</head>

<body>
   <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
         <?php $this->load->view('template/sidebar'); ?>
         <div class="layout-page">
            <?php $this->load->view('template/navbar'); ?>
            <div class="content-wrapper">
               <?php $this->load->view($main_content) ?>
            </div>
         </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
   </div>

   <!-- Footer -->
   <?php $this->load->view('template/footer'); ?>
</body>

</html>