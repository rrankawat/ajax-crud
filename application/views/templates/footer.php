    </div><!-- container close -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    	$(document).ready(function(){

            // Alert box
            function alert_box($class, $msg) {
                return '<div class="alert alert-'+$class+' alert-dismissible fade show" role="alert">'+
                            $msg+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                        '</div>';
            }

    		// Load data
    		load_data();

    		function load_data() {
    			$.ajax({
    				type: 'GET',
	    			url: '<?php echo base_url('welcome/read'); ?>',
	    			cache: false,
	    			async: true,
	    			dataType: 'json',
	    			success: function(data) {
	    				var html = '';
	    				var i;
	    				if(data == null || data == ''){
	    					html += '<tr>'+
								'<td colspan="5">'+
									'<p class="text-center text-secondary">No data to display</p>'+
								'</td>'+
							'</tr>';
	    				} 
	    				else {
	    					for(i=0; i<data.length; i++) {
		    					html += '<tr>'+
								'<td>'+(i+1)+'</td>'+
								'<td>'+data[i].first_name+'</td>'+
								'<td>'+data[i].last_name+'</td>'+
								'<td>'+data[i].city+'</td>'+
								'<td>'+
									'<button data-id="'+data[i].id+'" data-first_name="'+data[i].first_name+'" data-last_name="'+data[i].last_name+'" data-city="'+data[i].city+'" class="btn btn-outline-warning edit" data-toggle="modal" data-target="#update">Edit</button> '+
									'<button data-id="'+data[i].id+'" class="btn btn-outline-danger delete" data-toggle="modal" data-target="#delete">Delete</button>'+
								'</td>'+
								'</tr>';
		    				}
	    				}
	    				
	    				$('#show_data').html(html);
	    			},
	    			error: function() {
	    				console.log('bye');
	    			}
	    		});
    		}

    		// Create data
            $("#create-data").click(function(){
                var first_name = $("#first_name").val();
                var last_name = $("#last_name").val();
                var city = $("#city").val();
                $.ajax({
                    url: '<?php echo base_url('welcome/create'); ?>',
                    method: "POST",
                    data: {
                        first_name: first_name,
                        last_name: last_name,
                        city: city
                    },
                    cache: false,
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $("#alert-message").html(alert_box(data.class, data.msg));
                        load_data();
                    },
                    error: function() {
                        console.log('bye');
                    }
                });
                // Dismis model and resetting fields
                $(this).attr("data-dismiss", "modal");
                $("#first_name").val('');
                $("#last_name").val('');
                $("#city").val('');
            });
    		
    		// Get data to update
    		$('#show_data').on('click','.edit',function(){
    			var id = $(this).data('id');
    			var first_name = $(this).data('first_name');
    			var last_name = $(this).data('last_name');
    			var city = $(this).data('city');

                $('input[name="user_id_toupdate"]').val(id);
                $('input[name="first_name"]').val(first_name);
                $('input[name="last_name"]').val(last_name);
                $('input[name="city"]').val(city);
    		});

            // Update user
            $('#update-data').click(function(){
                var id = $('input[name="user_id_toupdate"]').val();
                var first_name = $('input[name="first_name"]').val();
                var last_name = $('input[name="last_name"]').val();
                var city = $('input[name="city"]').val();

                $.ajax({
                    url: "<?php echo base_url('welcome/update'); ?>",
                    method: "POST",
                    data: {
                        id: id,
                        first_name: first_name,
                        last_name: last_name,
                        city: city
                    },
                    cache: false,
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $("#alert-message").html(alert_box(data.class, data.msg));
                        load_data();
                    },
                    error: function() {
                        console.log('bye');
                    }
                });
                $(this).attr("data-dismiss", "modal");
            });

    		// Get data to delete
    		$('#show_data').on('click','.delete',function(){
    			var id = $(this).data('id');
    			$('input[name="user_id_todelete"]').val(id);
    		});

            // Deleting data
            $('#delete-data').click(function(){
                var id = $('#user_id_todelete').val();

                $.ajax({
                    url: "<?php echo base_url('welcome/delete'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    cache: false,
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $("#alert-message").html(alert_box(data.class, data.msg));
                        load_data();
                    },
                    error: function() {
                        console.log('bye');
                    }
                });
                $(this).attr("data-dismiss", "modal");
            });

    	}); // document close
    </script>
  </body>
</html>