$(function () {
          
           $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
          });

           //Date range picker
        $('#reservation').daterangepicker();
        });