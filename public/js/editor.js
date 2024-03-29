var select = false;
var idSelect;
var numberOfElements = 0;

function selected(id) {
 if (select) {
   if (id == idSelect) {
     select = false;
     $('#'+idSelect).css('background-color','white');
     $('#' + idSelect + ' > p:first').css('color','#3CB46D');
     idSelect = '';
   } else {
     $('#'+id).css('background-color','#3CB46D');
     $('#' + id + ' > p:first').css('color','white');
     $('#'+idSelect).css('background-color','white');
     $('#' + idSelect + ' > p:first').css('color','#3CB46D');
     idSelect = id;
   }
 } else {
   select = true;
   $('#'+id).css('background-color','#3CB46D');
   $('#' + id + ' > p:first').css('color','white');
   idSelect = id;
 }
 console.log(select);
}

function createDiv() {
    if (select){
      numberOfElements++;

      var heightClass = $(".height").html();

      var addClass = '';
      switch (idSelect) {
        case 1:
            addClass = "<div>"+
            "<textarea name='text" + numberOfElements + "' class='form-control designPage' placeholder='Typ your text here...'></textarea>"+
            "</div><hr />";
            $("#totalDivs").val($("#totalDivs").val()+',text'+numberOfElements);
            break;
        case 2:
            addClass = "<div>"+
            "<input type='text' name='title" + numberOfElements + "' class='form-control designPage' placeholder='Typ your title here...'>"+
            "</div><hr />";
            $("#totalDivs").val($("#totalDivs").val()+',title'+numberOfElements);
            break;
        case 3:
            addClass = "<div class='custom-file'>"+
            "<input type='file' class='custom-file-input designPage' id='customFile' name='file" + numberOfElements + "'" + numberOfElements + ">"+
            "<label class='custom-file-label' for='customFile'>Choose file</label>"+
            "</div><hr />";
            $("#totalDivs").val($("#totalDivs").val()+',file'+numberOfElements);
            break;
      }

        $('#exampleModal').modal('hide');
        select = false;
        idSelect = false;
        $('.selectors').css('background-color','white');
        $('.elementText').css('color','#3CB46D');
        $("#createDivs").append(addClass);
    }
}
