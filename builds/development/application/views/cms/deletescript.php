<script>

var deleteButtons = document.querySelectorAll('.del'),
	delModal = document.querySelector("#popup"),
	delCancel = document.querySelector("#cancelDel"),
	delRecord = document.querySelector("#deleteMe"),
	deleteName = document.querySelector("#deleteNot span"),
	recordId,
	returnCont;
	
	delModal.style.display = "block";

function throwDelete(evt){
	evt.preventDefault();
	delModal.classList.add("modalup");
	recordId = evt.target.dataset.record;
	returnCont = evt.target.dataset.controller;
	deleteName.innerHTML = evt.target.dataset.title;
	delRecord.href="<?php echo base_url(); ?>index.php/" + returnCont + "/delete_record/" + returnCont + "/" + recordId;
	//console.log(evt.target.parentNode);
}

delCancel.addEventListener("click", function(e){
	e.preventDefault();
	delModal.classList.remove("modalup");
}, false);

(function(){

	for(i=0 ; i < deleteButtons.length ; i++){
		deleteButtons[i].addEventListener("click", throwDelete, false);
	}

})();


</script>