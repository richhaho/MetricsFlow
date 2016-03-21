<script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
 <script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}"></script>
<script src="/js/api.js"></script>
<script type="text/javascript">
 window.onload = function () {
       	getCurrentUser("c1a976cd4b26a4dae977087a3725faafd8385eac");

       	setInterval(function() {
            // run the function for every 10  minutes
          getCurrentUser("c1a976cd4b26a4dae977087a3725faafd8385eac")
    }, 360000);       
}

  
	
</script>
   