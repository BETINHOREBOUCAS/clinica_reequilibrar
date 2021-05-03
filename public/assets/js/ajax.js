/*
|------------------------------------------------------
| Variaveis com funções anonimas
|------------------------------------------------------
*/
const c = (el) => document.querySelector(el);
const cs = (el) => document.querySelectorAll(el);

/*
|-----------------------------------------------------------------
| Eventos de troca de informação calendario na pagina principal
|-----------------------------------------------------------------
*/
var calendario = c('#calendar');

calendario.addEventListener('change', async ()=>{
    let url = calendario.getAttribute('url')
    let req = await fetch(url+'/?month='+calendario.value);
    let text = await req.text();
    
    let parser = new DOMParser();
    let doc = new DOMParser().parseFromString(text, "text/html");

    c('.information .calendar-day').innerHTML = doc.querySelector('.information .calendar-day').innerHTML;
    
});

/*
|--------------------------------------------------------------------------
| Eventos de escolha de data e hora na pagina: /pacientes/agendamento/22
|--------------------------------------------------------------------------
*/
var availableDate = cs('.available-date');

availableDate.forEach((item)=>{
    item.addEventListener('change', async () => {     
        let html = "";   
        let dataJson = JSON.parse(item.value);
        let option = c('#available-time-'+dataJson.idProfissional);
        
        let req = await fetch(dataJson.url+'/api/agendamentos/'+dataJson.idProfissional+'/'+dataJson.data);
        let json = await req.json();
        
        json.map((item) => {     
            if (item.available == 1) {
                html += "<option>"+item.time+"</option>";
            }
            if (item.available == null) {
                html += "<option></option>";
            }                        
        });

        option.innerHTML = html;
    });
});