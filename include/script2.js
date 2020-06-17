$(document).ready(function() {

                $("#searchBox").keyup(function () {


                    var query = $("#searchBox").val();
                    console.log(query);



                    if (query.length > 0) {
                        $.ajax(
                            {
                                url: '../include/research2.php',
                                method: 'GET',
                                data: {
                                    search: 1,
                                    q: query

                            },
                                success: function (data) 
                                {
                                    $("#response").html(data);
                                    
                                },
                                dataType: 'text'
                            }
                        );
                    }
                });

                $(document).on('click', 'li', function () {
                    var client = $(this).text();
                    $("#searchBox").val(client);
                    $("#response").html("");
                });

});
        