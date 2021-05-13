/*
|------------------------------------------------------
| Variaveis com funções anonimas
|------------------------------------------------------
*/
const c = (el) => document.querySelector(el);

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