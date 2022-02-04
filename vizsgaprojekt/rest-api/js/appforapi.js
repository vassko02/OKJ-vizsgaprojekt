document.addEventListener('DOMContentLoaded',()=>{
    
    const backend_url = ' http://localhost/14aphp/legfrissebb/OKJ-vizsgaprojekt/vizsgaprojekt/rest-api/backend/rating/';
    

    
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
                '<td>'+(index+1)+'</td>'+
                '<td>'+item['Name']+'</td>'+
                '<td>'+item['Email']+'</td>'+
                '<td>'+item['Description']+'</td>';
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

    newItemForm.addEventListener('submit',onSubmitNewItem);
});