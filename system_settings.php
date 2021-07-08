<?php
include 'bungalow.php';
//$qry = $conn->query("SELECT * from system_settings limit 1");
//if($qry->num_rows > 0){
	//foreach($qry->fetch_array() as $k => $val){
		//$meta[$k] = $val;
	//}
//}
 ?>
<div class="container-fluid" >
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="card col-lg-12" >
		<div class="card-body" style="height:90%; width:90%";located="right">
			<form action="" id="manage-settings">
				<div class="form-group">
					<label for="name" class="control-label">Име </label>
					<input type="text" class="form-control" id="name" name="name" value="<?php echo isset($meta['hotel_name']) ? $meta['hotel_name'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="email" class="control-label">Емайл</label>
					<input type="email" class="form-control" id="email" name="email" value="<?php echo isset($meta['email']) ? $meta['email'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="contact" class="control-label">Категория</label>
					<input type="text" class="form-control" id="contact" name="contact" value="<?php echo isset($meta['contact']) ? $meta['contact'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="about" class="control-label">Oтносно нас</label>
					<textarea name="about" class="text-jqte"><?php echo isset($meta['about_content']) ? $meta['about_content'] : '' ?></textarea>

				</div>
				<div class="form-group">
					<label for="" class="control-label">Снимка</label>
					<input type="file" class="form-control" name="13.jpg" >
				</div>
				<div class="form-group">
					<img src="<?php echo isset($meta['cover_img']) ? '../assets/img/'.$meta['cover_img'] :'' ?>" alt="" id="cimg">
				</div>
				<center>
					<button class="btn btn-info btn-primary btn-block col-md-2">Запази</button>
				</center>
			</form>
		</div>
	</div>
	<style>
	img#cimg{
		max-height: 10vh;
		max-width: 6vw;
	}
</style>

<script>
	function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        	$('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
	$('.text-jqte').jqte();

	$('#manage-settings').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_settings',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			error:err=>{
				console.log(err)
			},
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.','success')
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})

	})
</script>
<style>
	
</style>
</div>