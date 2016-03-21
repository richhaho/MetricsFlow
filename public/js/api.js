function getCurrentUser(token){
	jQuery.ajax({
            url: "/route/" +token,
            type: "GET",

            contentType: 'application/json; charset=utf-8',
            success: function(resultData) {
               console.log(resultData);

            },
            error : function(jqXHR, textStatus, errorThrown) {
            },

            timeout: 120000,
        });
}