/*
|------------------------------------------------------
| Variaveis com funções anonimas
|------------------------------------------------------
*/
const c = (el) => document.querySelector(el);
const cs = (el) => document.querySelectorAll(el);


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