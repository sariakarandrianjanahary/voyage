var a=document.getElementsByClassName('error');
for (var i = 0; i < a.length; i++) {
	a[i].style.display="none";
}

function blockform(e){
	return e.preventDefault();
}
function validateMdp(mdp1,mdp2){
	if (mdp1.value!=mdp2.value) {
		a[8].innerHTML="Mots de passe saisie different";
		a[8].style.display="block";
		mdp2.focus();
		return false;
	}else{
		if (mdp1.value.length<8) {
			a[8].innerHTML="Votre mots de passe doit contenir aux moins 8 Characteres";
			a[8].style.display="block";
			mdp2.focus();
			return false
		}else{
			a[8].style.display="none";
			return true;
		}
	}
}
function validateMail(email){
	if (/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(email.value)) {
		a[6].style.display="none";
		return true;
	} else {
		a[6].innerHTML="Votre email est invalide";
		a[6].style.display="block";
		email.focus();
		return false;
	}
}
function validateNumero(num){
	if (/^[0-9]{9,12}/.test(num.value)) {
		a[2].style.display="none";
		return true;

	} else {
		a[2].innerHTML="Numéro invalide";
		a[2].style.display="block";
		num.focus();
		return false;

	}
}
function validateName(nom){
	if (nom.value.length<3) {
		a[0].innerHTML="Veuillez saisir votre nom";
		a[0].style.display="block";
		nom.focus();
		return false;
	}else{
		a[0].style.display="none";
		return true;
	}
}
function validateName(prenom){
	if (nom.value.length<3) {
		a[0].innerHTML="Veuillez saisir votre prenom";
		a[0].style.display="block";
		nom.focus();
		return false;
	}else{
		a[0].style.display="none";
		return true;
	}
}
function validateDate(date){
	if (date.value.length=='') {
		a[5].innerHTML="Vérifier la date";
		a[5].style.display="block";
		date.focus();
		return false;
	}else{
		a[5].style.display="none";
		return true;
	}
}
var form=document.getElementById('form');

form.addEventListener('submit',function(e){
	var nom=document.getElementById('name');
	var prenom=document.getElementById('firstname');
	var ville=document.getElementById('ville');
	var cp=document.getElementById('cp');
	var num=document.getElementById('num');
	var naissance=document.getElementById('naissance');
	var mail=document.getElementById('mail');
	var mdp1=document.getElementById('mdp1');
	var mdp2=document.getElementById('mdp2');


	if(!validateMdp(mdp1,mdp2)){
		blockform(e);
	}
	if(!validateMail(mail)){
		blockform(e);
	}
	if(!validateNumero(num)){
		blockform(e);
	}
	if(!validateName(nom)){
		blockform(e);
	}
	if(!validateDate(naissance)){
		blockform(e);
	}
})
