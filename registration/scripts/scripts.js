  $('#frmInput').submit(function(e){

            e.preventDefault();

            var doc = new jsPDF('p', 'mm', [345, 742]);
            var img = new Image();
			
			
            doc.addImage(imgData, 'JPEG', 0, 0, 345, 742);

            var earno = $('#earno').val();
            var exhibitor = $('#exhibitor').val();
            var phonenumber = $('#phonenumber').val();
            var city = $('#city').val();
            var breed = $('#breed').val();
            var variety = $('#variety').val();
            var kelas = $('#kelas').val();
            var buck = $('#buck').val();          
            var prejr = $('#prejr').val();

            doc.setFontSize(35); 
			doc.setFont('arial');
            doc.setTextColor(0, 0, 0);

            doc.text(70, 52, earno); //width. height
            doc.text(70, 70, exhibitor);
            doc.text(200, 70, phonenumber);
            doc.text(70, 88, city);
            doc.text(70, 105, breed);
            doc.text(235, 105, variety); 

			 
	        doc.text(120, 122, buck);
         
        
            doc.text(235, 122, prejr);

            var blob = doc.output('blob');

            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                base64data = reader.result;
                console.log(base64data);

                $('#pdf').val(base64data);
                $('#earno_post').val($('#earno').val()); 
				$('#breed_post').val($('#breed').val());
				$('#exhibitor_post').val($('#exhibitor').val());
				$('#phonenumber_post').val($('#phonenumber').val());
				$('#city_post').val($('#city').val());
				$('#prejr_post').val($('#prejr').val());
				$('#buck_post').val($('#buck').val());
				$('#variety_post').val($('#variety').val());
				
                $('#frm').submit();
            }

        });