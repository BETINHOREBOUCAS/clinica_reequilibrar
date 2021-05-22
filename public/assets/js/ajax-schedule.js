/*
|------------------------------------------------------
| Variaveis com funções anonimas
|------------------------------------------------------
*/
const cs = (el) => document.querySelectorAll(el);
var valor;
/*
|-----------------------------------------------------------------
| Eventos de exclusão de agendamento
|-----------------------------------------------------------------
*/
var schedule = cs('.cancel');

schedule.forEach((item) => {
    item.addEventListener('click', async (e) => {
        e.preventDefault();
        valor = item.closest("tr");
        let resp = prompt('Qual motivo o angendamento será cancelado?');
        if (resp) {

            var formData = new FormData()
            formData.append('motivo', resp);

            let req = await fetch(item.href, {
                method: 'POST',
                body: formData
            });
            let json = await req.json();
            if (json.status) {
                valor.parentNode.removeChild(valor);
                alert("Agendamento excluido com sucesso!");
            }            
        }

    })
});