function render(data){
  var html="<div class='card-body'><div class='card-header'>"+data.name+"</div><div class='card-text'>"+data.body+"</div></div>"
  $('#commentSection').append(html);
}

$(document).ready(function(){
 var comment=[
 {"name":"Alex Mihova", "body":"Great book"}
 ];
 for(var i=0; i<comment.length;i++){

   render(comment[i]);
 }

 $('#addComment').click(function(){ 
  console.log("121");
   var addObj= {
    "name": $('#name').val(),
    "body": $('#bodyComment').val()
  };
  console.log(addObj);
  comment.push(addObj);
  render(addObj);
  $('#name').val('');
  $('#bodyComment').val('');
});
});



  
function order() {
  var name=document.getElementById('inputName').value;
   alert( name+" your order is successful!");
}