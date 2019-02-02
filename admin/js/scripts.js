$(document).ready(function(){
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
        // Add code below this
});
$(document).ready(function(){
   $('#selectAllBoxes').click(function(event){
       if (this.checked) {
           $('.checkBoxes').each(function(){
               this.checked = true;
           });
       } else{
            $('.checkBoxes').each(function(){
                this.checked = false;
            });
       }
   });
});