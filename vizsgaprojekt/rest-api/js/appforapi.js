document.addEventListener('DOMContentLoaded',()=>{
    
    const backend_url = ' http://localhost/14aphp/friss/OKJ-vizsgaprojekt/vizsgaprojekt/rest-api/backend/rating/';
    

    let table = document.querySelector('.itemsdata').getElementsByTagName('tbody')[0];
    let newItemForm = document.querySelector('.newitem');
 
    
    async function getItems(){
        let response = await fetch(backend_url+'read');  // GET
        console.log(response);
        let data = await response.json();
       console.log(data);
        if (response.ok){
            return data;
        } else {
            throw Error(data.message);
        }
    }

    function refressItemList(){
        getItems()
        .then(data => {
            console.log('data:',data);
            table.innerHTML='';
            data['items'].forEach((item,index)=>{
                let row = table.insertRow(); // <tr></tr>
                row.innerHTML=
                '<div class="container" id="rates">'+
                '<div class="card row mx-auto">'+
                  '<div class="user col-sm-3 col-3">'+
                      '<img src="./pictures/userpic.png" alt="" srcset="">'+
                      '<p id="name">'+item['Name'] +'</p>'+
                      '<p id="email">'+item['Email']+'</p>'+
                  '</div>'+
                  '<div class="ratedescription col-sm-9 col-9">'+
                        '<p id="starrr">'+item['Stars']+'  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-star mb-1" viewBox="0 0 16 16"><path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/></svg></p>'+
                      '<p id="description" style="overflow-y:auto; height:65%">'+item['Description']+'</p>'+
                  '</div>'+
                '</div>'+
              '</div>';
            });            
        })
        .catch(err => {
            //console.log('error:',err.message);
        })
    }
    async function onSubmitNewItem(event){
        event.preventDefault(); // meggátolja az oldal újratöltését
        //console.log('ok');
        let item={};
        item.Name = document.querySelector('input[name="Name"]').value;
        item.Email = document.querySelector('input[name="email"]').value;
        item.Description = document.querySelector('input[name="desc"]').value;
        item.star = document.querySelector( 'input[name="stars"]:checked').value;   
        console.log(JSON.stringify(item));
        await fetch(backend_url+'create',{
            method: 'POST',
            body: JSON.stringify(item),
            headers: {"Content-Type" : "application/json; charset=UTF-8"}
        })
        .then(response => response.json())
        .then(data => console.log(data))
        .then(location.reload())
        .catch(err => console.log(err));


    }
    // főprogram
    refressItemList();
    newItemForm.addEventListener('submit',onSubmitNewItem);



});