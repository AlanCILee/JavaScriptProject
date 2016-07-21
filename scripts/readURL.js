function readURL(input) 
{
	if (input.files && input.files[0])
	{
		var reader = new FileReader();
		document.getElementById("myImg").innerHTML = "<img id=image src=# alt=your image />";
		reader.onload = function (e) {
			$('#image')
			.attr('src', e.target.result)
			.width(270)
			.height(330);
		};
		/*$.post("salesForm.php",{filePath: $("#file").val()}); //post file path to php*/
		reader.readAsDataURL(input.files[0]);
	}
}