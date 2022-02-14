document.addEventListener('DOMContentLoaded',()=>{
    
    const backend_url = ' http://localhost/14aphp/legfrissebb/OKJ-vizsgaprojekt/vizsgaprojekt/rest-api/backend/rating/';
    

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
                  '<div class="user col-sm-3">'+
                      '<img src="./pictures/userpic.png" alt="" srcset="">'+
                      '<p id="name">'+item['Name'] +'</p>'+
                      '<p id="email">'+item['Email']+'</p>'+
                  '</div>'+
                  '<div class="ratedescription col-sm-9">'+
                      '<p id="description">'+item['Description']+'</p>'+
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
        console.log(JSON.stringify(item));
        await fetch(backend_url+'create',{
            method: 'POST',
            body: JSON.stringify(item),
            headers: {"Content-Type" : "application/json; charset=UTF-8"}
        })
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(err => console.log(err));

    }
    // főprogram
    refressItemList();
    newItemForm.addEventListener('submit',onSubmitNewItem);



});