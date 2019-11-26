<?php

    require('database/db_connect.php');
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>API TEST</title>
	<link rel="stylesheet" type="text/css" href="styles/gallery.css"> 

</head>
<body>
 <?php include("components/navTemp.php"); ?> 
<h1>helloWorld!</h1>

</body>
</html>

<script type="text/javascript">
  
var KEY = '14410826-7532b5d8d499c0fef03ce0a75';


var totalImages = 10; 
var imageAvailable = 10; 
function randomBetta(randomNumber){
 fetch(' https://pixabay.com/api/?key=14410826-7532b5d8d499c0fef03ce0a75&q=Betta')
 	.then(response => response.json())
 	.then(data => {
	    let item = document.createElement('div');
	    item.classList.add('item');
	    item.innerHTML = `<img class="bettaFish" src="${data.hits[Math.floor(Math.random() * imageAvailable)  ].largeImageURL}" alt="BettaFish" height="360" width="340"/>`     
	     document.body.appendChild(item);
	 });
}
for(let i=0;i<totalImages;i++){
  let randomImage= Math.floor(Math.random() * imageAvailable);
  randomBetta(randomImage);
}


//function bettaFish(){ 
 // fetch(' https://pixabay.com/api/?key=14410826-7532b5d8d499c0fef03ce0a75&q=betta+fish&image_type=photo')
 // 	.then(response => response.json())
 // 	.then(data => {
	//     let item = document.createElement('div');
	//     item.classList.add('item');
	//     item.innerHTML = `<img class="bettaFish" src="${data.hits[0].largeImageURL}" alt="BettaFish" height="360" width="340"/>`     
	//      document.body.appendChild(item);
	//  });
//}

/// upsplash
  // fetch(`https://source.unsplash.com/1600x900/?betta,bettafish`).then((response) => {   
  //   let item = document.createElement('div');
  //   item.classList.add('item');
  //   item.innerHTML = `<img class="betta" src="${response.url}" alt="betta"height="300" width="600"/>`     
  //   document.body.appendChild(item);
  // }) ;


  // fetch(`https://source.unsplash.com/1600x900/?betta`).then((response) => {   
  //   let item = document.createElement('div');
  //   item.classList.add('item');
  //   item.innerHTML = `<img class="betta" src="${response.url}" alt="betta" height="300" width="600"/>`     
  //   document.body.appendChild(item);
  // }) ;

  // fetch(`https://source.unsplash.com/1600x900/?betta+Fish`).then((response) => {   
  //   let item = document.createElement('div');
  //   item.classList.add('item');
  //   item.innerHTML = `<img class="betta" src="${response.url}" alt="betta" height="300" width="600"/>`     
  //   document.body.appendChild(item);
  // }) ;

  //   fetch(`https://source.unsplash.com/1600x900/?betta+Fish,betta`).then((response) => {   
  //   let item = document.createElement('div');
  //   item.classList.add('item');
  //   item.innerHTML = `<img class="betta" src="${response.url}" alt="betta"height="300" width="600"/>`     
  //   document.body.appendChild(item);
  // }) ;


  //https://dev.to/desi/using-the-unsplash-api-to-display-random-images-15co


</script>