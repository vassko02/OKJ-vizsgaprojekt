let deleteButton = document.querySelectorAll('.delete'); // az összes .delete class-al ellátott gombot berakja egy tömbbe

//console.log(deleteButton);

deleteButton.forEach(oneButton => {
    oneButton.addEventListener('click',()=>{
        //console.log(oneButton);
        let buttonYes = document.querySelector('#btnYes'); // modal ablak Yes linkje
        //console.log(oneButton.href);
        buttonYes.href=oneButton.href; // delete gomb data-href lesz a Yes gomb linke
    });
});