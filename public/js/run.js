window.onload = function () {
       	getCurrentUser("c1a976cd4b26a4dae977087a3725faafd8385eac");

       	setInterval(function() {
            // run the function for every 10  minutes
          getCurrentUser("c1a976cd4b26a4dae977087a3725faafd8385eac")
    }, 360000);       
}
